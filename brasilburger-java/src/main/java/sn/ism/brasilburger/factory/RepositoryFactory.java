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

}