package sn.ism.brasilburger.service;

import sn.ism.brasilburger.model.Quartier;
import sn.ism.brasilburger.model.Zone;

import java.util.List;

public interface IQuartierService {
    List<Quartier> lister();
    List<Quartier> listerParZone(Zone zone);
    Quartier creer(String libelle, Zone zone);
}
