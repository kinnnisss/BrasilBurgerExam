package sn.ism.brasilburger.service.impl;

import java.io.File;
import java.io.IOException;
import java.math.BigDecimal;
import java.util.List;
import java.util.Objects;

import sn.ism.brasilburger.model.Menu;
import sn.ism.brasilburger.repository.IMenuBurgerRepository;
import sn.ism.brasilburger.repository.IMenuComplementRepository;
import sn.ism.brasilburger.repository.IMenuRepository;
import sn.ism.brasilburger.service.IImageService;
import sn.ism.brasilburger.service.IMenuService;

public class MenuServiceImpl implements IMenuService {

    private final IMenuRepository menuRepository;
    private final IMenuBurgerRepository menuBurgerRepository;
    private final IMenuComplementRepository menuComplementRepository;
    private final IImageService imageService;

    public MenuServiceImpl(IMenuRepository menuRepository,
                           IMenuBurgerRepository menuBurgerRepository,
                           IMenuComplementRepository menuComplementRepository,
                           IImageService imageService) {
        this.menuRepository = Objects.requireNonNull(menuRepository);
        this.menuBurgerRepository = Objects.requireNonNull(menuBurgerRepository);
        this.menuComplementRepository = Objects.requireNonNull(menuComplementRepository);
        this.imageService = Objects.requireNonNull(imageService);
    }
    @Override
    public List<Menu> lister() {
        return menuRepository.findAllActive();
    }

    @Override
    public Menu creerMenuSimple(String nom, String imagePath) {
        if (nom == null || nom.isBlank()) {
            throw new IllegalArgumentException("Le nom du menu est obligatoire");
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
                    throw new RuntimeException("Erreur lors du traitement de l'image du menu", e);
                }
            }
        }

        Menu menu = new Menu(nom, finalImageValue, BigDecimal.ZERO);
        return menuRepository.save(menu);
    }

    @Override
    public Menu creerMenuCompose(String nom, String imagePath, List<Integer> burgerIds, List<Integer> complementIds) {
        if (nom == null || nom.isBlank()) {
            throw new IllegalArgumentException("Le nom du menu est obligatoire");
        }
        if ((burgerIds == null || burgerIds.isEmpty()) &&
            (complementIds == null || complementIds.isEmpty())) {
            throw new IllegalArgumentException("Un menu doit contenir au moins un burger ou un complément");
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
                    throw new RuntimeException("Erreur lors du traitement de l'image du menu", e);
                }
            }
        }

        Menu menu = new Menu(nom, finalImageValue, BigDecimal.ZERO);
        menu = menuRepository.save(menu);

        int menuId = menu.getId();

        if (burgerIds != null) {
            for (Integer idBurger : burgerIds) {
                menuBurgerRepository.addBurgerToMenu(menuId, idBurger);
            }
        }

        if (complementIds != null) {
            for (Integer idComplement : complementIds) {
                menuComplementRepository.addComplementToMenu(menuId, idComplement);
            }
        }

        menuRepository.updatePrix(menuId);

        return menuRepository.findById(menuId)
                .orElseThrow(() -> new IllegalStateException("Menu non trouvé après création"));
    }

    @Override
    public void archiver(int idMenu) {
        throw new UnsupportedOperationException("Unimplemented method 'archiver'");
    }
    
}
