package sn.ism.brasilburger;

import sn.ism.brasilburger.factory.ServiceFactory;
import sn.ism.brasilburger.view.*;

import java.util.Scanner;

public final class App {

    private App() {}

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        BurgerView burgerView = new BurgerView(
                ServiceFactory.getBurgerService(),
                scanner
        );

        ComplementView complementView = new ComplementView(
                ServiceFactory.getComplementService(),
                scanner
        );

        MenuView menuView = new MenuView(
                ServiceFactory.getMenuService(),
                scanner
        );

        ZoneView zoneView = new ZoneView(
                ServiceFactory.getZoneService(),
                scanner
        );

        QuartierView quartierView = new QuartierView(
                ServiceFactory.getQuartierService(),
                ServiceFactory.getZoneService(),
                scanner
        );

        LivreurView livreurView = new LivreurView(
                ServiceFactory.getLivreurService(),
                scanner
        );

        ConsoleView consoleView = new ConsoleView(
                burgerView,
                complementView,
                menuView,
                zoneView,
                quartierView,
                livreurView,scanner
        );

        consoleView.run();

        scanner.close();
    }
}
