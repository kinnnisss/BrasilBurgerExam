package sn.ism.brasilburger.service.impl;

import java.math.BigDecimal;
import java.util.List;
import java.util.Objects;

import sn.ism.brasilburger.model.Burger;
import sn.ism.brasilburger.repository.IBurgerRepository;
import sn.ism.brasilburger.service.IBurgerService;
import sn.ism.brasilburger.service.IImageService;

public class BurgerServiceImpl implements IBurgerService {

    private final IBurgerRepository burgerRepository;
    private final IImageService imageService;

    public BurgerServiceImpl(IBurgerRepository burgerRepository,
                             IImageService imageService) {
        this.burgerRepository = Objects.requireNonNull(burgerRepository);
        this.imageService = Objects.requireNonNull(imageService);
    }

    @Override
    public List<Burger> lister() {
        return burgerRepository.findAllActive();
    }

    @Override
    public Burger creer(String nom, BigDecimal prix, String image) {
        throw new UnsupportedOperationException("Unimplemented method 'creer'");
    }

    @Override
    public void archiver(int idBurger) {
        throw new UnsupportedOperationException("Unimplemented method 'archiver'");
    }
    
}
