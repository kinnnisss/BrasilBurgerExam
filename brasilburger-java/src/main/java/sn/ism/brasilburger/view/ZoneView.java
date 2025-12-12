package sn.ism.brasilburger.view;


import sn.ism.brasilburger.service.IZoneService;

import java.math.BigDecimal;
import java.util.Scanner;

public class ZoneView {

    private final IZoneService zoneService;
    private final Scanner scanner;

    public ZoneView(IZoneService zoneService, Scanner scanner) {
        this.zoneService = zoneService;
        this.scanner = scanner;
    }

    public void lister() {
        System.out.println("---- Zones ----");
        zoneService.lister().forEach(System.out::println);
    }
    public void creer() {
        String libelle = ConsoleUtils.readString(scanner, "Libellé de la zone : ", true);
        BigDecimal prixLivraison = ConsoleUtils.readBigDecimal(scanner, "Prix de livraison : ");

        var zone = zoneService.creer(libelle, prixLivraison);
        System.out.println("Zone créée : " + zone);
    }

}