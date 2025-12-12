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
    public void creer() {
        String nom = ConsoleUtils.readString(scanner, "Nom du complément : ", true);

        System.out.println("Type (1 = FRITE, 2 = BOISSON) : ");
        String typeStr = scanner.nextLine();
        TypeComplement type = switch (typeStr) {
            case "1" -> TypeComplement.FRITE;
            case "2" -> TypeComplement.BOISSON;
            default -> throw new IllegalArgumentException("Type invalide");
        };

        BigDecimal prix = ConsoleUtils.readBigDecimal(scanner, "Prix : ");
        String image = ConsoleUtils.readString(scanner, "Image (chemin/URL, optionnel) : ", false);

        var c = complementService.creer(nom, type, prix, image);
        System.out.println("Complément créé : " + c);
    }

    public void archiver() {
        int id = ConsoleUtils.readInt(scanner, "ID du complément à archiver : ");
        complementService.archiver(id);
        System.out.println("Complément archivé.");
    }

}