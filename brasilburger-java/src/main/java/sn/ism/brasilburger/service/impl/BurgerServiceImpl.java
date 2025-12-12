package sn.ism.brasilburger.service.impl;

import java.io.File;
import java.io.IOException;
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
    public Burger creer(String nom, BigDecimal prix, String imagePath) {
        if (nom == null || nom.isBlank()) {
            throw new IllegalArgumentException("Le nom du burger est obligatoire");
        }
        if (prix == null || prix.signum() <= 0) {
            throw new IllegalArgumentException("Le prix du burger doit être > 0");
        }

        String finalImageValue = null;

        if (imagePath != null && !imagePath.isBlank()) {
            File file = new File(imagePath);
            if (!file.exists() || !file.isFile()) {
                finalImageValue = imagePath;
            } else {
                try {
                    String url = imageService.uploadAndGetUrl(file);
                    finalImageValue = url;
                } catch (IOException e) {
                    throw new RuntimeException("Erreur lors du traitement de l'image du burger", e);
                }
            }
        }

        Burger burger = new Burger(nom, prix, finalImageValue);
        return burgerRepository.save(burger);
    }

    @Override
    public void archiver(int idBurger) {
        burgerRepository.archive(idBurger);
    }
    
}
