package sn.ism.brasilburger.service.impl;

import java.util.List;
import java.util.Objects;

import sn.ism.brasilburger.model.Livreur;
import sn.ism.brasilburger.repository.ILivreurRepository;
import sn.ism.brasilburger.service.ILivreurService;

public class LivreurServiceImpl implements ILivreurService {

    private final ILivreurRepository livreurRepository;
    public LivreurServiceImpl(ILivreurRepository livreurRepository) {
        this.livreurRepository = Objects.requireNonNull(livreurRepository);
    }
    @Override
    public List<Livreur> lister() {
        return livreurRepository.findAll();
    }

    @Override
    public Livreur creer(String nom, String prenom, String telephone) {
        if (nom == null || nom.isBlank()) {
            throw new IllegalArgumentException("Le nom du livreur est obligatoire");
        }
        if (prenom == null || prenom.isBlank()) {
            throw new IllegalArgumentException("Le prénom du livreur est obligatoire");
        }
        if (telephone == null || telephone.isBlank()) {
            throw new IllegalArgumentException("Le téléphone du livreur est obligatoire");
        }

        Livreur livreur = new Livreur(nom, prenom, telephone);
        return livreurRepository.save(livreur);    }
    
}
