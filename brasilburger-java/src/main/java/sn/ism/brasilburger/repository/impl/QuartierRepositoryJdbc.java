package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.model.Quartier;
import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.repository.IQuartierRepository;

public class QuartierRepositoryJdbc implements IQuartierRepository{

    @Override
    public List<Quartier> findAll() {
        String sql = """
                SELECT q.id_quartier, q.libelle AS lib_q,
                       z.id_zone, z.libelle AS lib_z, z.prix_livraison
                FROM QUARTIER q
                JOIN ZONE z ON z.id_zone = q.id_zone
                ORDER BY z.libelle, q.libelle
                """;
        List<Quartier> list = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                Zone zone = new Zone(
                        rs.getInt("id_zone"),
                        rs.getString("lib_z"),
                        rs.getBigDecimal("prix_livraison")
                );
                Quartier q = new Quartier(
                        rs.getInt("id_quartier"),
                        rs.getString("lib_q"),
                        zone
                );
                list.add(q);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des quartiers", e);
        }

        return list;

    }

    @Override
    public List<Quartier> findByZone(Zone zone) {
        String sql = """
                SELECT q.id_quartier, q.libelle AS lib_q,
                       z.id_zone, z.libelle AS lib_z, z.prix_livraison
                FROM QUARTIER q
                JOIN ZONE z ON z.id_zone = q.id_zone
                WHERE z.id_zone = ?
                ORDER BY q.libelle
                """;
        List<Quartier> list = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, zone.getId());

            try (ResultSet rs = ps.executeQuery()) {
                while (rs.next()) {
                    Zone z = new Zone(
                            rs.getInt("id_zone"),
                            rs.getString("lib_z"),
                            rs.getBigDecimal("prix_livraison")
                    );
                    Quartier q = new Quartier(
                            rs.getInt("id_quartier"),
                            rs.getString("lib_q"),
                            z
                    );
                    list.add(q);
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des quartiers de la zone " + zone.getId(), e);
        }

        return list;

    }

    @Override
    public Optional<Quartier> findById(int id) {
        String sql = """
                SELECT q.id_quartier, q.libelle AS lib_q,
                       z.id_zone, z.libelle AS lib_z, z.prix_livraison
                FROM QUARTIER q
                JOIN ZONE z ON z.id_zone = q.id_zone
                WHERE q.id_quartier = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, id);

            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    Zone z = new Zone(
                            rs.getInt("id_zone"),
                            rs.getString("lib_z"),
                            rs.getBigDecimal("prix_livraison")
                    );
                    Quartier q = new Quartier(
                            rs.getInt("id_quartier"),
                            rs.getString("lib_q"),
                            z
                    );
                    return Optional.of(q);
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la recherche du quartier " + id, e);
        }

        return Optional.empty();

    }

    @Override
    public Quartier save(Quartier quartier) {
        throw new UnsupportedOperationException("Unimplemented method 'save'");
    }
    
}
