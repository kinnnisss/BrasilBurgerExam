package sn.ism.brasilburger.service;

import sn.ism.brasilburger.model.Livreur;

import java.util.List;

public interface ILivreurService {
    List<Livreur> lister();
    Livreur creer(String nom, String prenom, String telephone);
}
