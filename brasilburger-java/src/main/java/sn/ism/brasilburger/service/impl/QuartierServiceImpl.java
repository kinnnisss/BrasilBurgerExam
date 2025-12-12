package sn.ism.brasilburger.service.impl;

import java.util.List;
import java.util.Objects;

import sn.ism.brasilburger.model.Quartier;
import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.repository.IQuartierRepository;
import sn.ism.brasilburger.repository.IZoneRepository;
import sn.ism.brasilburger.service.IQuartierService;

public class QuartierServiceImpl implements IQuartierService {
    private final IQuartierRepository quartierRepository;
    private final IZoneRepository zoneRepository;

    public QuartierServiceImpl(IQuartierRepository quartierRepository,
                               IZoneRepository zoneRepository) {
        this.quartierRepository = Objects.requireNonNull(quartierRepository);
        this.zoneRepository = Objects.requireNonNull(zoneRepository);
    }


    @Override
    public List<Quartier> lister() {
        return quartierRepository.findAll();
    }

    @Override
    public List<Quartier> listerParZone(Zone zone) {
        throw new UnsupportedOperationException("Unimplemented method 'listerParZone'");
    }

    @Override
    public Quartier creer(String libelle, Zone zone) {
        throw new UnsupportedOperationException("Unimplemented method 'creer'");
    }
    
}
