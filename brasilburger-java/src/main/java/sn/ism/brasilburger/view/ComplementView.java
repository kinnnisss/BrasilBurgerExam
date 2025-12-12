package sn.ism.brasilburger.view;

import sn.ism.brasilburger.model.TypeComplement;
import sn.ism.brasilburger.service.IComplementService;

import java.math.BigDecimal;
import java.util.Scanner;

public class ComplementView {

    private final IComplementService complementService;
    private final Scanner scanner;

    public ComplementView(IComplementService complementService, Scanner scanner) {
        this.complementService = complementService;
        this.scanner = scanner;
    }

    public void lister() {
        System.out.println("---- Compléments actifs ----");
        complementService.lister().forEach(System.out::println);
    }

}