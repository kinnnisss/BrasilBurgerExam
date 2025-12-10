package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.model.Menu;
import sn.ism.brasilburger.repository.IMenuRepository;

public class MenuRepositoryJdbc implements IMenuRepository {

    @Override
    public List<Menu> findAllActive() {
        String sql = """
                SELECT id_menu, nom, image, prix, is_archived
                FROM MENU
                WHERE is_archived = FALSE
                ORDER BY nom
                """;
        List<Menu> list = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                Menu m = new Menu();
                m.setId(rs.getInt("id_menu"));
                m.setNom(rs.getString("nom"));
                m.setImage(rs.getString("image"));
                m.setPrix(rs.getBigDecimal("prix"));
                m.setArchived(rs.getBoolean("is_archived"));
                list.add(m);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des menus", e);
        }

        return list;
    }

    @Override
    public Optional<Menu> findById(int id) {
        String sql = """
                SELECT id_menu, nom, image, prix, is_archived
                FROM MENU
                WHERE id_menu = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    Menu m = new Menu();
                    m.setId(rs.getInt("id_menu"));
                    m.setNom(rs.getString("nom"));
                    m.setImage(rs.getString("image"));
                    m.setPrix(rs.getBigDecimal("prix"));
                    m.setArchived(rs.getBoolean("is_archived"));
                    return Optional.of(m);
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la recherche du menu " + id, e);
        }

        return Optional.empty();
        }

    private Menu insert(Menu menu) {
        String sql = """
                INSERT INTO MENU(nom, image, prix, is_archived)
                VALUES (?, ?, ?, FALSE)
                RETURNING id_menu
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, menu.getNom());
            ps.setString(2, menu.getImage());
            ps.setBigDecimal(3, menu.getPrix());

            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    menu.setId(rs.getInt(1));
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de l'insertion du menu", e);
        }

        return menu;
    }

    private Menu update(Menu menu) {
        String sql = """
                UPDATE MENU
                SET nom = ?, image = ?, prix = ?, is_archived = ?
                WHERE id_menu = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, menu.getNom());
            ps.setString(2, menu.getImage());
            ps.setBigDecimal(3, menu.getPrix());
            ps.setBoolean(4, menu.isArchived());
            ps.setInt(5, menu.getId());

            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la mise à jour du menu", e);
        }

        return menu;
    }
    @Override
    public Menu save(Menu menu) {
        if (menu.getId() == 0) {
            return insert(menu);
        }
        return update(menu);    }

    @Override
    public void archive(int id) {
        String sql = "UPDATE MENU SET is_archived = TRUE WHERE id_menu = ?";

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, id);
            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de l'archivage du menu " + id, e);
        }
    }

    @Override
    public void updatePrix(int idMenu) {
        throw new UnsupportedOperationException("Unimplemented method 'updatePrix'");
    }
    
}
