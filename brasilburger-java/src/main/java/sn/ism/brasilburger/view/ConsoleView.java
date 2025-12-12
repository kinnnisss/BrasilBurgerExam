package sn.ism.brasilburger.view;

import sn.ism.brasilburger.model.TypeComplement;
import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.service.*;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class ConsoleView {

    private final IBurgerService burgerService;
    private final IComplementService complementService;
    private final IMenuService menuService;
    private final IZoneService zoneService;
    private final IQuartierService quartierService;
    private final ILivreurService livreurService;

    private final Scanner scanner = new Scanner(System.in);

    public ConsoleView(IBurgerService burgerService,
                       IComplementService complementService,
                       IMenuService menuService,
                       IZoneService zoneService,
                       IQuartierService quartierService,
                       ILivreurService livreurService) {
        this.burgerService = burgerService;
        this.complementService = complementService;
        this.menuService = menuService;
        this.zoneService = zoneService;
        this.quartierService = quartierService;
        this.livreurService = livreurService;
    }

    private void afficherMenu() {
        System.out.println("==== BRASIL BURGER - GESTION RESSOURCES ====");
        System.out.println("---- Burgers / Compléments / Menus ----");
        System.out.println("1.  Lister les burgers");
        System.out.println("2.  Créer un burger");
        System.out.println("3.  Archiver un burger");
        System.out.println("4.  Lister les compléments");
        System.out.println("5.  Créer un complément");
        System.out.println("6.  Archiver un complément");
        System.out.println("7.  Lister les menus");
        System.out.println("8.  Créer un menu composé");

        System.out.println("---- Zones / Quartiers / Livreurs ----");
        System.out.println("9.  Lister les zones");
        System.out.println("10. Créer une zone");
        System.out.println("11. Lister les quartiers (toutes zones)");
        System.out.println("12. Créer un quartier (avec zone)");
        System.out.println("13. Lister les livreurs");
        System.out.println("14. Créer un livreur");

        System.out.println("0.  Quitter");
    }


}
