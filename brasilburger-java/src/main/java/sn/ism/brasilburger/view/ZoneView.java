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

}