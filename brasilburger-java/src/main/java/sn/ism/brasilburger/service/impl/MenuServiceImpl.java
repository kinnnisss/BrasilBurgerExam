package sn.ism.brasilburger.service.impl;

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
    public Menu creerMenuSimple(String nom, String image) {
        throw new UnsupportedOperationException("Unimplemented method 'creerMenuSimple'");
    }

    @Override
    public Menu creerMenuCompose(String nom, String image, List<Integer> burgerIds, List<Integer> complementIds) {
        throw new UnsupportedOperationException("Unimplemented method 'creerMenuCompose'");
    }

    @Override
    public void archiver(int idMenu) {
        throw new UnsupportedOperationException("Unimplemented method 'archiver'");
    }
    
}
