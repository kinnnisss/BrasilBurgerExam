package sn.ism.brasilburger.repository;

import sn.ism.brasilburger.model.Zone;

import java.util.List;
import java.util.Optional;

public interface IZoneRepository {
    List<Zone> findAll();
    Optional<Zone> findById(int id);
    Zone save(Zone zone);
}
