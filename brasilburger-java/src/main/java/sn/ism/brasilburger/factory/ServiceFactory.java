package sn.ism.brasilburger.factory;

import sn.ism.brasilburger.service.*;
import sn.ism.brasilburger.service.impl.*;

public final class ServiceFactory {

    private static IBurgerService burgerService;
    private static IComplementService complementService;
    private static IMenuService menuService;

    private static IZoneService zoneService;
    private static IQuartierService quartierService;
    private static ILivreurService livreurService;
    private static IImageService imageService;
    private ServiceFactory() {
    }

       public static IImageService getImageService() {
        if (imageService == null) {
            imageService = new ImageServiceImpl();
        }
        return imageService;
    }

    public static IBurgerService getBurgerService() {
        if (burgerService == null) {
            burgerService = new BurgerServiceImpl(
                    RepositoryFactory.getBurgerRepository(),getImageService()
            );
        }
        return burgerService;
    }

    public static IComplementService getComplementService() {
        if (complementService == null) {
            complementService = new ComplementServiceImpl(
                    RepositoryFactory.getComplementRepository(),getImageService()
            );
        }
        return complementService;
    }

    public static IMenuService getMenuService() {
        if (menuService == null) {
            menuService = new MenuServiceImpl(
                    RepositoryFactory.getMenuRepository(),
                    RepositoryFactory.getMenuBurgerRepository(),
                    RepositoryFactory.getMenuComplementRepository(),getImageService()
            );
        }
        return menuService;
    }


}