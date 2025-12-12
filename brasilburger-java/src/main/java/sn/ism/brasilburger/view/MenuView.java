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

}