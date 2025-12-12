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

}
