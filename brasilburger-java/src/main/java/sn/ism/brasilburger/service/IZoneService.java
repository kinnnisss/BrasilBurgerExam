package sn.ism.brasilburger.service;

import sn.ism.brasilburger.model.Zone;

import java.math.BigDecimal;
import java.util.List;

public interface IZoneService {
    List<Zone> lister();
    Zone creer(String libelle, BigDecimal prixLivraison);
}
