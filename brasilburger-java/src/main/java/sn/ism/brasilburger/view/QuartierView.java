package sn.ism.brasilburger.view;


import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.service.IQuartierService;
import sn.ism.brasilburger.service.IZoneService;

import java.util.Scanner;

public class QuartierView {

    private final IQuartierService quartierService;
    private final IZoneService zoneService;
    private final Scanner scanner;

    public QuartierView(IQuartierService quartierService, IZoneService zoneService, Scanner scanner) {
        this.quartierService = quartierService;
        this.zoneService = zoneService;
        this.scanner = scanner;
    }

    public void lister() {
        System.out.println("---- Quartiers (toutes zones) ----");
        quartierService.lister().forEach(System.out::println);
    }

    public void creer() {
        String libelle = ConsoleUtils.readString(scanner, "Libellé du quartier : ", true);

        System.out.println("Zones disponibles : ");
        var zones = zoneService.lister();
        zones.forEach(System.out::println);

        int idZone = ConsoleUtils.readInt(scanner, "ID de la zone associée : ");

        Zone zone = zones.stream()
                .filter(z -> z.getId() == idZone)
                .findFirst()
                .orElseThrow(() -> new IllegalArgumentException("Zone inconnue"));

        var quartier = quartierService.creer(libelle, zone);
        System.out.println("Quartier créé : " + quartier);
    }
}