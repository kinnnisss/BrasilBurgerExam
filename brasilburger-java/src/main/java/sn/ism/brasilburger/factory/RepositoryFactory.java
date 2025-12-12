package sn.ism.brasilburger.factory;

import sn.ism.brasilburger.repository.*;
import sn.ism.brasilburger.repository.impl.*;

public final class RepositoryFactory {

    private static IBurgerRepository burgerRepository;
    private static IComplementRepository complementRepository;
    private static IMenuRepository menuRepository;
    private static IMenuBurgerRepository menuBurgerRepository;
    private static IMenuComplementRepository menuComplementRepository;

    private static IZoneRepository zoneRepository;
    private static IQuartierRepository quartierRepository;
    private static ILivreurRepository livreurRepository;

    private RepositoryFactory() {
    }
    public static IBurgerRepository getBurgerRepository() {
        if (burgerRepository == null) {
            burgerRepository = new BurgerRepositoryJdbc();
        }
        return burgerRepository;
    }

    public static IComplementRepository getComplementRepository() {
        if (complementRepository == null) {
            complementRepository = new ComplementRepositoryJdbc();
        }
        return complementRepository;
    }

    public static IMenuRepository getMenuRepository() {
        if (menuRepository == null) {
            menuRepository = new MenuRepositoryJdbc();
        }
        return menuRepository;
    }
    public static IMenuBurgerRepository getMenuBurgerRepository() {
        if (menuBurgerRepository == null) {
            menuBurgerRepository = new MenuBurgerRepositoryJdbc();
        }
        return menuBurgerRepository;
    }
    public static IMenuComplementRepository getMenuComplementRepository() {
        if (menuComplementRepository == null) {
            menuComplementRepository = new MenuComplementRepositoryJdbc();
        }
        return menuComplementRepository;
    }
    public static IZoneRepository getZoneRepository() {
        if (zoneRepository == null) {
            zoneRepository = new ZoneRepositoryJdbc();
        }
        return zoneRepository;
    }

    public static IQuartierRepository getQuartierRepository() {
        if (quartierRepository == null) {
            quartierRepository = new QuartierRepositoryJdbc();
        }
        return quartierRepository;
    }
        public static ILivreurRepository getLivreurRepository() {
        if (livreurRepository == null) {
            livreurRepository = new LivreurRepositoryJdbc();
        }
        return livreurRepository;
    }

}