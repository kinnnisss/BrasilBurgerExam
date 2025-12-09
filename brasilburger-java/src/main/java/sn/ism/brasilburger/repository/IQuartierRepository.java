package sn.ism.brasilburger.repository;

import sn.ism.brasilburger.model.Quartier;
import sn.ism.brasilburger.model.Zone;

import java.util.List;
import java.util.Optional;

public interface IQuartierRepository {
    List<Quartier> findAll();
    List<Quartier> findByZone(Zone zone);
    Optional<Quartier> findById(int id);
    Quartier save(Quartier quartier);
}
