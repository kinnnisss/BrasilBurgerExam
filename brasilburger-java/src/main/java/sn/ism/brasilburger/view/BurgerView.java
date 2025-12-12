package sn.ism.brasilburger.view;

import sn.ism.brasilburger.service.IBurgerService;

import java.math.BigDecimal;
import java.util.Scanner;
public final class BurgerView {
    private final IBurgerService burgerService;
    private final Scanner scanner;
    public BurgerView(IBurgerService burgerService, Scanner scanner) {
        this.burgerService = burgerService;
        this.scanner = scanner;
    }

    public void lister() {
        System.out.println("---- Burgers actifs ----");
        burgerService.lister().forEach(System.out::println);
    }

    public void creer() {
        String nom = ConsoleUtils.readString(scanner, "Nom du burger : ", true);
        BigDecimal prix = ConsoleUtils.readBigDecimal(scanner, "Prix : ");
        String image = ConsoleUtils.readString(scanner, "Image (chemin/URL, optionnel) : ", false);

        var burger = burgerService.creer(nom, prix, image);
        System.out.println("Burger créé : " + burger);
    }
}
