package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.repository.IZoneRepository;

public class ZoneRepositoryJdbc implements IZoneRepository{

    @Override
    public List<Zone> findAll() {
        String sql = """
                SELECT id_zone, libelle, prix_livraison
                FROM ZONE
                ORDER BY libelle
                """;
        List<Zone> list = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                Zone z = new Zone();
                z.setId(rs.getInt("id_zone"));
                z.setLibelle(rs.getString("libelle"));
                z.setPrixLivraison(rs.getBigDecimal("prix_livraison"));
                list.add(z);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des zones", e);
        }

        return list;
    }

    @Override
    public Optional<Zone> findById(int id) {
        throw new UnsupportedOperationException("Unimplemented method 'findById'");
    }

    @Override
    public Zone save(Zone zone) {
        throw new UnsupportedOperationException("Unimplemented method 'save'");
    }
    
}
