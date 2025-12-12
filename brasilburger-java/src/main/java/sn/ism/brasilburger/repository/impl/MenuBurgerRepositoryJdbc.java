package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.repository.IMenuBurgerRepository;

public class MenuBurgerRepositoryJdbc implements IMenuBurgerRepository {

    @Override
    public void addBurgerToMenu(int idMenu, int idBurger) {
        String sql = "INSERT INTO MENU_BURGER(id_menu, id_burger) VALUES (?, ?)";

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, idMenu);
            ps.setInt(2, idBurger);
            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de l'ajout du burger au menu", e);
        }    }
    
}
