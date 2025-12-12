package sn.ism.brasilburger.view;
import sn.ism.brasilburger.service.IMenuService;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class MenuView {

    private final IMenuService menuService;
    private final Scanner scanner;

    public MenuView(IMenuService menuService, Scanner scanner) {
        this.menuService = menuService;
        this.scanner = scanner;
    }
      public void lister() {
        System.out.println("---- Menus actifs ----");
        menuService.lister().forEach(System.out::println);
    }

    public void creerMenuCompose() {
        String nom = ConsoleUtils.readString(scanner, "Nom du menu : ", true);
        String image = ConsoleUtils.readString(scanner, "Image (chemin/URL, optionnel) : ", false);

        List<Integer> burgerIds = new ArrayList<>();
        List<Integer> complementIds = new ArrayList<>();

        System.out.println("Ajouter des burgers au menu (IDs, vide pour finir) : ");
        while (true) {
            String line = scanner.nextLine();
            if (line.isBlank()) break;
            burgerIds.add(Integer.parseInt(line));
        }

        System.out.println("Ajouter des compléments au menu (IDs, vide pour finir) : ");
        while (true) {
            String line = scanner.nextLine();
            if (line.isBlank()) break;
            complementIds.add(Integer.parseInt(line));
        }

        var menu = menuService.creerMenuCompose(nom, image, burgerIds, complementIds);
        System.out.println("Menu créé : " + menu);
    }
    public void archiver() {
        int id = ConsoleUtils.readInt(scanner, "ID du menu à archiver : ");
        menuService.archiver(id);
        System.out.println("Menu archivé.");
    }

}