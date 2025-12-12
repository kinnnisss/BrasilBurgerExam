package sn.ism.brasilburger;

import sn.ism.brasilburger.model.Burger;
import sn.ism.brasilburger.model.Complement;
import sn.ism.brasilburger.model.Livreur;
import sn.ism.brasilburger.model.Menu;
import sn.ism.brasilburger.model.TypeComplement;
import sn.ism.brasilburger.repository.impl.BurgerRepositoryJdbc;
import sn.ism.brasilburger.repository.impl.ComplementRepositoryJdbc;
import sn.ism.brasilburger.repository.impl.LivreurRepositoryJdbc;
import sn.ism.brasilburger.repository.impl.MenuRepositoryJdbc;
import sn.ism.brasilburger.repository.impl.QuartierRepositoryJdbc;
import sn.ism.brasilburger.repository.impl.ZoneRepositoryJdbc;
import sn.ism.brasilburger.service.impl.BurgerServiceImpl;
import sn.ism.brasilburger.service.impl.ComplementServiceImpl;
import sn.ism.brasilburger.service.impl.ImageServiceImpl;
import sn.ism.brasilburger.service.impl.LivreurServiceImpl;
import sn.ism.brasilburger.service.impl.QuartierServiceImpl;
import sn.ism.brasilburger.service.impl.ZoneServiceImpl;

import java.math.BigDecimal;

import sn.ism.brasilburger.model.Quartier;
import sn.ism.brasilburger.model.Zone;
import sn.ism.brasilburger.repository.impl.QuartierRepositoryJdbc;

// public class App {
//     public static void main(String[] args) {
        // BurgerRepositoryJdbc burgerRepo = new BurgerRepositoryJdbc();
        // ComplementRepositoryJdbc complementRepo = new ComplementRepositoryJdbc();

        // System.out.println("=== Liste des burgers actifs ===");
        // burgerRepo.findAllActive().forEach(b -> 
        //     System.out.println(b.getId() + " - " + b.getNom() + " : " + b.getPrix())
        // );

        // System.out.println("=== Liste des compléments actifs ===");
        // complementRepo.findAllActive().forEach(c -> 
        //     System.out.println(c.getId() + " - " + c.getNom() + " (" + c.getType() + ")")
        // );

        // Burger newBurger = new Burger();
        // newBurger.setNom("Test Burger");
        // newBurger.setPrix(BigDecimal.valueOf(2500));
        // newBurger.setImage("burger.png");
        // burgerRepo.save(newBurger);
        // System.out.println("Burger inséré avec ID : " + newBurger.getId());

        // Complement newComplement = new Complement();
        // newComplement.setNom("Frites");
        // newComplement.setType(TypeComplement.FRITE);
        // newComplement.setPrix(BigDecimal.valueOf(500));
        // newComplement.setImage("frites.png");
        // complementRepo.save(newComplement);
        // System.out.println("Complément inséré avec ID : " + newComplement.getId());
        // Menu menu = new Menu();
        // menu.setNom("Menu Test");
        // menu.setPrix(BigDecimal.valueOf(3000));
        // menu.setImage("menu.png");
        // MenuRepositoryJdbc menuRepo = new MenuRepositoryJdbc();
        // menuRepo.save(menu);
        // System.out.println("=== Liste des menus actifs ===");
        // menuRepo.findAllActive().forEach(m -> 
        //     System.out.println(m.getId() + " - " + m.getNom() + " : " + m.getPrix())
        // );
        // int testId = 1; 
        // menuRepo.archive(testId);
        // System.out.println("Menu archivé avec ID : " + testId);
        // System.out.println(menuRepo.findById(testId).isPresent() ? "Menu avec ID " + testId + " est archivé." : "Menu avec ID " + testId + " n'existe pas.");
        // System.out.println("=== Vérification des menus actifs après archivage ===");
        // menuRepo.findAllActive().forEach(m -> 
        //     System.out.println(m.getId() + " - " + m.getNom() + " : " + m.getPrix())
        // );

        // menuRepo.findById(testId).ifPresentOrElse(
        //     m -> System.out.println("Menu trouvé : " + m.getNom() + " (archivé = " + m.isArchived() + ")"),
        //     () -> System.out.println("Aucun menu trouvé avec l'ID " + testId)
        // );

        // Livreur livreur = new Livreur();
        // livreur.setNom("Doe");
        // livreur.setPrenom("John");
        // livreur.setTelephone("123456789");
        // LivreurRepositoryJdbc livreurRepo = new LivreurRepositoryJdbc();
        // livreurRepo.save(livreur);
        // System.out.println("Livreur inséré avec ID : " + livreur.getId());
        // int testLivreurId = 1;
        // livreurRepo.findById(testLivreurId).ifPresentOrElse(
        //     l -> System.out.println("Livreur trouvé : " + l.getNom() + " " + l.getPrenom()),
        //     () -> System.out.println("Aucun livreur trouvé avec l'ID " + testLivreurId)
        // );
        // livreurRepo.findAll().forEach(l -> 
        //     System.out.println(l.getId() + " - " + l.getNom() + " " + l.getPrenom() + " : " + l.getTelephone())
        // );

        // burgerRepo.findById(newBurger.getId()).ifPresent(b -> 
        //     System.out.println("Burger trouvé : " + b.getNom())
        // );


        // complementRepo.findById(newComplement.getId()).ifPresent(c -> 
        //     System.out.println("Complément trouvé : " + c.getNom())
        // );

        // burgerRepo.archive(newBurger.getId());
        // System.out.println("Burger archivé avec ID : " + newBurger.getId());


public class App {
    public static void main(String[] args) {
        // QuartierRepositoryJdbc quartierRepo = new QuartierRepositoryJdbc();

        // System.out.println("=== Liste des quartiers ===");
        // quartierRepo.findAll().forEach(q ->
        //     System.out.println(q.getId() + " - " + q.getLibelle() +
        //                        " (Zone: " + q.getZone().getLibelle() +
        //                        ", Prix livraison: " + q.getZone().getPrixLivraison() + ")")
        // );

        // Zone zoneTest = new Zone();
        // zoneTest.setId(1); 
        // System.out.println("\n=== Quartiers de la zone " + zoneTest.getId() + " ===");
        // quartierRepo.findByZone(zoneTest).forEach(q ->
        //     System.out.println(q.getId() + " - " + q.getLibelle())
        // );

        // int testId = 1; 
        // System.out.println("\n=== Recherche du quartier avec ID " + testId + " ===");
        // quartierRepo.findById(testId).ifPresentOrElse(
        //     q -> System.out.println("Quartier trouvé : " + q.getLibelle() +
        //                             " (Zone: " + q.getZone().getLibelle() + ")"),
        //     () -> System.out.println("Aucun quartier trouvé avec l'ID " + testId)
        // );
        //   ZoneRepositoryJdbc zoneRepo = new ZoneRepositoryJdbc();

        // System.out.println("=== Liste des zones ===");
        // zoneRepo.findAll().forEach(z ->
        //     System.out.println(z.getId() + " - " + z.getLibelle() +
        //                        " (Prix livraison: " + z.getPrixLivraison() + ")")
        // );

        // int testId = 1; 
        // System.out.println("\n=== Recherche de la zone avec ID " + testId + " ===");
        // zoneRepo.findById(testId).ifPresentOrElse(
        //     z -> System.out.println("Zone trouvée : " + z.getLibelle() +
        //                             " (Prix livraison: " + z.getPrixLivraison() + ")"),
        //     () -> System.out.println("Aucune zone trouvée avec l'ID " + testId)
        // );

        // Zone newZone = new Zone();
        // newZone.setLibelle("Zone Test");
        // newZone.setPrixLivraison(BigDecimal.valueOf(1500));
        // zoneRepo.save(newZone);
        // System.out.println("\nZone insérée avec ID : " + newZone.getId());

        // newZone.setLibelle("Zone Test Modifiée");
        // newZone.setPrixLivraison(BigDecimal.valueOf(2000));
        // zoneRepo.save(newZone);
        // System.out.println("Zone mise à jour : " + newZone.getLibelle() +
        //                    " (Prix livraison: " + newZone.getPrixLivraison() + ")");
         BurgerRepositoryJdbc burgerRepo = new BurgerRepositoryJdbc();
        ZoneRepositoryJdbc zoneRepo = new ZoneRepositoryJdbc();
        QuartierRepositoryJdbc quartierRepo = new QuartierRepositoryJdbc();
        LivreurRepositoryJdbc livreurRepo = new LivreurRepositoryJdbc();
        ImageServiceImpl imageService = new ImageServiceImpl();

        BurgerServiceImpl burgerService = new BurgerServiceImpl(burgerRepo, imageService);
        ZoneServiceImpl zoneService = new ZoneServiceImpl(zoneRepo);
        QuartierServiceImpl quartierService = new QuartierServiceImpl(quartierRepo, zoneRepo);
        LivreurServiceImpl livreurService = new LivreurServiceImpl(livreurRepo);

        System.out.println("=== Burgers actifs ===");
        burgerService.lister().forEach(b -> System.out.println(b.getNom() + " : " + b.getPrix()));

        Burger b = burgerService.creer("Brasil Burger", BigDecimal.valueOf(3500), "C:/images/burger.png");
        System.out.println("Burger créé avec ID : " + b.getId() + " et image : " + b.getImage());


        zoneService.lister().forEach(z -> System.out.println("Zone : " + z.getLibelle()));
        Zone z = zoneRepo.findById(1).orElseThrow();
        Quartier q = quartierService.creer("Quartier Test", z);
        System.out.println("Quartier créé : " + q.getLibelle() + " dans zone " + q.getZone().getLibelle());

        Livreur l = livreurService.creer("Diop", "Mamadou", "770000000");
        System.out.println("Livreur créé : " + l.getNom() + " " + l.getPrenom());
    }
}
   
