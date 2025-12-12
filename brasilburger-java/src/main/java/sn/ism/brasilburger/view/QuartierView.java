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
}