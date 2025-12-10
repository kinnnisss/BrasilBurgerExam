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
        throw new UnsupportedOperationException("Unimplemented method 'findById'");
    }

    @Override
    public Menu save(Menu menu) {
        throw new UnsupportedOperationException("Unimplemented method 'save'");
    }

    @Override
    public void archive(int id) {
        throw new UnsupportedOperationException("Unimplemented method 'archive'");
    }

    @Override
    public void updatePrix(int idMenu) {
        throw new UnsupportedOperationException("Unimplemented method 'updatePrix'");
    }
    
}
