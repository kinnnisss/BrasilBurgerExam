package sn.ism.brasilburger.service.impl;

import java.math.BigDecimal;
import java.util.List;
import java.util.Objects;

import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.repository.IZoneRepository;
import sn.ism.brasilburger.service.IZoneService;

public class ZoneServiceImpl implements IZoneService{

    private final IZoneRepository zoneRepository;
    public ZoneServiceImpl(IZoneRepository zoneRepository) {
        this.zoneRepository = Objects.requireNonNull(zoneRepository);
    }

    @Override
    public List<Zone> lister() {
        return zoneRepository.findAll();
    }

    @Override
    public Zone creer(String libelle, BigDecimal prixLivraison) {
        throw new UnsupportedOperationException("Unimplemented method 'creer'");
    }
    
}
