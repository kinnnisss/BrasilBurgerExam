package sn.ism.brasilburger.view;

import java.util.Scanner;

public class ConsoleView {

    private final BurgerView burgerView;
    private final ComplementView complementView;
    private final MenuView menuView;
    private final ZoneView zoneView;
    private final QuartierView quartierView;
    private final LivreurView livreurView;

    private final Scanner scanner = new Scanner(System.in);

    public ConsoleView(BurgerView burgerView,
                       ComplementView complementView,
                       MenuView menuView,
                       ZoneView zoneView,
                       QuartierView quartierView,
                       LivreurView livreurView) {
        this.burgerView = burgerView;
        this.complementView = complementView;
        this.menuView = menuView;
        this.zoneView = zoneView;
        this.quartierView = quartierView;
        this.livreurView = livreurView;
    }

    public void run() {
        boolean running = true;

        while (running) {
            afficherMenu();
            System.out.print("Votre choix : ");
            String choix = scanner.nextLine();

            try {
                switch (choix) {
                    case "1" -> burgerView.lister();
                    case "2" -> burgerView.creer();
                    case "3" -> burgerView.archiver();

                    case "4" -> complementView.lister();
                    case "5" -> complementView.creer();
                    case "6" -> complementView.archiver();

                    case "7" -> menuView.lister();
                    case "8" -> menuView.creerMenuCompose();
                    case "15" -> menuView.archiver(); // optionnel

                    case "9"  -> zoneView.lister();
                    case "10" -> zoneView.creer();

                    case "11" -> quartierView.lister();
                    case "12" -> quartierView.creer();

                    case "13" -> livreurView.lister();
                    case "14" -> livreurView.creer();

                    case "0" -> running = false;
                    default -> System.out.println("Choix invalide.");
                }
            } catch (Exception e) {
                System.out.println("Erreur : " + e.getMessage());
            }
            System.out.println();
        }

        System.out.println("Au revoir !");
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
        System.out.println("15. Archiver un menu");

        System.out.println("---- Zones / Quartiers / Livreurs ----");
        System.out.println("9.  Lister les zones");
        System.out.println("10. Créer une zone");
        System.out.println("11. Lister les quartiers");
        System.out.println("12. Créer un quartier");
        System.out.println("13. Lister les livreurs");
        System.out.println("14. Créer un livreur");

        System.out.println("0.  Quitter");
    }
}
