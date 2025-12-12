package sn.ism.brasilburger.service.impl;

import java.math.BigDecimal;
import java.util.List;
import java.util.Objects;

import sn.ism.brasilburger.model.Complement;
import sn.ism.brasilburger.model.TypeComplement;
import sn.ism.brasilburger.repository.IComplementRepository;
import sn.ism.brasilburger.service.IComplementService;
import sn.ism.brasilburger.service.IImageService;

public class ComplementServiceImpl implements IComplementService{
    
    private final IComplementRepository complementRepository;
    private final IImageService imageService;

    public ComplementServiceImpl(IComplementRepository complementRepository,
                                 IImageService imageService) {
        this.complementRepository = Objects.requireNonNull(complementRepository);
        this.imageService = Objects.requireNonNull(imageService);
    }

    @Override
    public List<Complement> lister() {
        return complementRepository.findAllActive();
    }

    @Override
    public Complement creer(String nom, TypeComplement type, BigDecimal prix, String image) {
        throw new UnsupportedOperationException("Unimplemented method 'creer'");
    }

    @Override
    public void archiver(int idComplement) {
        throw new UnsupportedOperationException("Unimplemented method 'archiver'");
    }

}
