package sn.ism.brasilburger.repository.impl;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import sn.ism.brasilburger.config.DbConfig;
import sn.ism.brasilburger.model.Complement;
import sn.ism.brasilburger.model.TypeComplement;
import sn.ism.brasilburger.repository.IComplementRepository;

public class ComplementRepositoryJdbc implements IComplementRepository{

    @Override
    public List<Complement> findAllActive() {
        String sql = """
                SELECT id_complement, nom, type_complement, prix, image, is_archived
                FROM COMPLEMENT
                WHERE is_archived = FALSE
                ORDER BY nom
                """;
        List<Complement> list = new ArrayList<>();

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql);
             ResultSet rs = ps.executeQuery()) {

            while (rs.next()) {
                Complement c = new Complement();
                c.setId(rs.getInt("id_complement"));
                c.setNom(rs.getString("nom"));
                c.setType(TypeComplement.valueOf(rs.getString("type_complement")));
                c.setPrix(rs.getBigDecimal("prix"));
                c.setImage(rs.getString("image"));
                c.setArchived(rs.getBoolean("is_archived"));
                list.add(c);
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors du chargement des compléments", e);
        }

        return list;       
    }

    @Override
    public Optional<Complement> findById(int id) {
        String sql = """
                SELECT id_complement, nom, type_complement, prix, image, is_archived
                FROM COMPLEMENT
                WHERE id_complement = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, id);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    Complement c = new Complement();
                    c.setId(rs.getInt("id_complement"));
                    c.setNom(rs.getString("nom"));
                    c.setType(TypeComplement.valueOf(rs.getString("type_complement")));
                    c.setPrix(rs.getBigDecimal("prix"));
                    c.setImage(rs.getString("image"));
                    c.setArchived(rs.getBoolean("is_archived"));
                    return Optional.of(c);
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la recherche du complément " + id, e);
        }

        return Optional.empty();
    }

    private Complement insert(Complement complement) {
        String sql = """
                INSERT INTO COMPLEMENT(nom, type_complement, prix, image, is_archived)
                VALUES (?, ?, ?, ?, FALSE)
                RETURNING id_complement
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, complement.getNom());
            ps.setString(2, complement.getType().name());
            ps.setBigDecimal(3, complement.getPrix());
            ps.setString(4, complement.getImage());

            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    complement.setId(rs.getInt(1));
                }
            }
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de l'insertion du complément", e);
        }

        return complement;
    }

    private Complement update(Complement complement) {
        String sql = """
                UPDATE COMPLEMENT
                SET nom = ?, type_complement = ?, prix = ?, image = ?, is_archived = ?
                WHERE id_complement = ?
                """;

        try (Connection conn = DbConfig.getConnection();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setString(1, complement.getNom());
            ps.setString(2, complement.getType().name());
            ps.setBigDecimal(3, complement.getPrix());
            ps.setString(4, complement.getImage());
            ps.setBoolean(5, complement.isArchived());
            ps.setInt(6, complement.getId());

            ps.executeUpdate();
        } catch (SQLException e) {
            throw new RuntimeException("Erreur lors de la mise à jour du complément", e);
        }

        return complement;
    }

    @Override
    public Complement save(Complement complement) {
        throw new UnsupportedOperationException("Unimplemented method 'save'");
    }

    @Override
    public void archive(int id) {
        throw new UnsupportedOperationException("Unimplemented method 'archive'");
    }

    
}
