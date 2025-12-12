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
        throw new UnsupportedOperationException("Unimplemented method 'creer'");
    }
    
}
