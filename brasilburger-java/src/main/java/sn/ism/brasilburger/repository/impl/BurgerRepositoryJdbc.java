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
        return Optional.empty();
    }

    @Override
    public Burger save(Burger burger) {
       return burger;
    }

   

    @Override
    public void archive(int id) {
        
    }
}
