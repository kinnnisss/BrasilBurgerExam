package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.repository.IMenuComplementRepository;

public class MenuComplementRepositoryJdbc implements IMenuComplementRepository {

    @Override
    public void addComplementToMenu(int idMenu, int idComplement) {
        String sql = "INSERT INTO MENU_COMPLEMENT(id_menu, id_complement) VALUES (?, ?)";

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, idMenu);
            ps.setInt(2, idComplement);
            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de l'ajout du complément au menu", e);
        }    }
    
}
