package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.model.Burger;
import sn.ism.brasilburger.repository.IBurgerRepository;

public class BurgerRepositoryJdbc implements IBurgerRepository {
    @Override
    public List<Burger> findAllActive() {
        String sql = """
                SELECT id_burger, nom, prix, image, is_archived
                FROM BURGER
                WHERE is_archived = FALSE
                ORDER BY nom
                """;
        List<Burger> burgers = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                Burger b = new Burger();
                b.setId(rs.getInt("id_burger"));
                b.setNom(rs.getString("nom"));
                b.setPrix(rs.getBigDecimal("prix"));
                b.setImage(rs.getString("image"));
                b.setArchived(rs.getBoolean("is_archived"));
                burgers.add(b);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des burgers", e);
        }

        return burgers;
    }
    @Override
    public Optional<Burger> findById(int id) {
            String sql = """
                SELECT id_burger, nom, prix, image, is_archived
                FROM BURGER
                WHERE id_burger = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    Burger b = new Burger();
                    b.setId(rs.getInt("id_burger"));
                    b.setNom(rs.getString("nom"));
                    b.setPrix(rs.getBigDecimal("prix"));
                    b.setImage(rs.getString("image"));
                    b.setArchived(rs.getBoolean("is_archived"));
                    return Optional.of(b);
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la recherche du burger " + id, e);
        }
        return Optional.empty();
    }

        private Burger insert(Burger burger) {
        String sql = """
                INSERT INTO BURGER(nom, prix, image, is_archived)
                VALUES (?, ?, ?, FALSE)
                RETURNING id_burger
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, burger.getNom());
            ps.setBigDecimal(2, burger.getPrix());
            ps.setString(3, burger.getImage());

            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    burger.setId(rs.getInt(1));
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de l'insertion du burger", e);
        }
        return burger;
    }

    private Burger update(Burger burger) {
        String sql = """
                UPDATE BURGER
                SET nom = ?, prix = ?, image = ?, is_archived = ?
                WHERE id_burger = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, burger.getNom());
            ps.setBigDecimal(2, burger.getPrix());
            ps.setString(3, burger.getImage());
            ps.setBoolean(4, burger.isArchived());
            ps.setInt(5, burger.getId());

            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la mise à jour du burger", e);
        }

        return burger;
    }


    @Override
    public Burger save(Burger burger) {
       return burger;
    }

   

    @Override
    public void archive(int id) {
        
    }
}
