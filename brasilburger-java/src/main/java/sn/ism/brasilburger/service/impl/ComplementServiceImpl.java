package sn.ism.brasilburger.service.impl;

import java.io.File;
import java.io.IOException;
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
    public Complement creer(String nom, TypeComplement type, BigDecimal prix, String imagePath) {
        if (nom == null || nom.isBlank()) {
            throw new IllegalArgumentException("Le nom du complément est obligatoire");
        }
        if (type == null) {
            throw new IllegalArgumentException("Le type du complément est obligatoire");
        }
        if (prix == null || prix.signum() <= 0) {
            throw new IllegalArgumentException("Le prix du complément doit être > 0");
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
                    throw new RuntimeException("Erreur lors du traitement de l'image du complément", e);
                }
            }
        }

        Complement complement = new Complement(nom, type, prix, finalImageValue);
        return complementRepository.save(complement);
    }

    @Override
    public void archiver(int idComplement) {
        complementRepository.archive(idComplement);
    }

}
