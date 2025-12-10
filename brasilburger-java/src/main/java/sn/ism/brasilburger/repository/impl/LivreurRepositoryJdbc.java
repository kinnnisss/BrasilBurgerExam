package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.model.Livreur;
import sn.ism.brasilburger.repository.ILivreurRepository;

public class LivreurRepositoryJdbc implements ILivreurRepository{

    @Override
    public List<Livreur> findAll() {
        String sql = """
                SELECT id_livreur, nom, prenom, telephone
                FROM LIVREUR
                ORDER BY nom, prenom
                """;
        List<Livreur> list = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                Livreur l = new Livreur();
                l.setId(rs.getInt("id_livreur"));
                l.setNom(rs.getString("nom"));
                l.setPrenom(rs.getString("prenom"));
                l.setTelephone(rs.getString("telephone"));
                list.add(l);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des livreurs", e);
        }

        return list;
    }

    @Override
    public Optional<Livreur> findById(int id) {
        throw new UnsupportedOperationException("Unimplemented method 'findById'");
    }

    @Override
    public Livreur save(Livreur livreur) {
        throw new UnsupportedOperationException("Unimplemented method 'save'");
    }
    
}
