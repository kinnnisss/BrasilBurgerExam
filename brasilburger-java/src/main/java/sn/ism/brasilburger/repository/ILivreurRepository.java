package sn.ism.brasilburger.repository;

import sn.ism.brasilburger.model.Livreur;

import java.util.List;
import java.util.Optional;

public interface ILivreurRepository {
    List<Livreur> findAll();
    Optional<Livreur> findById(int id);
    Livreur save(Livreur livreur);
}
