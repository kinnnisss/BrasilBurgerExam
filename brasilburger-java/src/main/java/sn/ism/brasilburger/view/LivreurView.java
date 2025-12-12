package sn.ism.brasilburger.view;

import sn.ism.brasilburger.service.ILivreurService;

import java.util.Scanner;

public class LivreurView {

    private final ILivreurService livreurService;
    private final Scanner scanner;

    public LivreurView(ILivreurService livreurService, Scanner scanner) {
        this.livreurService = livreurService;
        this.scanner = scanner;
    }

    public void lister() {
        System.out.println("---- Livreurs ----");
        livreurService.lister().forEach(System.out::println);
    }
        public void creer() {
        String nom = ConsoleUtils.readString(scanner, "Nom du livreur : ", true);
        String prenom = ConsoleUtils.readString(scanner, "Prénom du livreur : ", true);
        String telephone = ConsoleUtils.readString(scanner, "Téléphone du livreur : ", true);

        var livreur = livreurService.creer(nom, prenom, telephone);
        System.out.println("Livreur créé : " + livreur);
    }

}