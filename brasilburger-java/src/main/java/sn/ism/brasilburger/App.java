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

import java.math.BigDecimal;

public class App {
    public static void main(String[] args) {
        BurgerRepositoryJdbc burgerRepo = new BurgerRepositoryJdbc();
        ComplementRepositoryJdbc complementRepo = new ComplementRepositoryJdbc();

        System.out.println("=== Liste des burgers actifs ===");
        burgerRepo.findAllActive().forEach(b -> 
            System.out.println(b.getId() + " - " + b.getNom() + " : " + b.getPrix())
        );

        System.out.println("=== Liste des compléments actifs ===");
        complementRepo.findAllActive().forEach(c -> 
            System.out.println(c.getId() + " - " + c.getNom() + " (" + c.getType() + ")")
        );

        Burger newBurger = new Burger();
        newBurger.setNom("Test Burger");
        newBurger.setPrix(BigDecimal.valueOf(2500));
        newBurger.setImage("burger.png");
        burgerRepo.save(newBurger);
        System.out.println("Burger inséré avec ID : " + newBurger.getId());

        Complement newComplement = new Complement();
        newComplement.setNom("Frites");
        newComplement.setType(TypeComplement.FRITE);
        newComplement.setPrix(BigDecimal.valueOf(500));
        newComplement.setImage("frites.png");
        complementRepo.save(newComplement);
        System.out.println("Complément inséré avec ID : " + newComplement.getId());
        Menu menu = new Menu();
        menu.setNom("Menu Test");
        menu.setPrix(BigDecimal.valueOf(3000));
        menu.setImage("menu.png");
        MenuRepositoryJdbc menuRepo = new MenuRepositoryJdbc();
        menuRepo.save(menu);
        System.out.println("=== Liste des menus actifs ===");
        menuRepo.findAllActive().forEach(m -> 
            System.out.println(m.getId() + " - " + m.getNom() + " : " + m.getPrix())
        );
        int testId = 1; 
        menuRepo.archive(testId);
        System.out.println("Menu archivé avec ID : " + testId);
        System.out.println(menuRepo.findById(testId).isPresent() ? "Menu avec ID " + testId + " est archivé." : "Menu avec ID " + testId + " n'existe pas.");
        System.out.println("=== Vérification des menus actifs après archivage ===");
        menuRepo.findAllActive().forEach(m -> 
            System.out.println(m.getId() + " - " + m.getNom() + " : " + m.getPrix())
        );

        menuRepo.findById(testId).ifPresentOrElse(
            m -> System.out.println("Menu trouvé : " + m.getNom() + " (archivé = " + m.isArchived() + ")"),
            () -> System.out.println("Aucun menu trouvé avec l'ID " + testId)
        );

        burgerRepo.findById(newBurger.getId()).ifPresent(b -> 
            System.out.println("Burger trouvé : " + b.getNom())
        );


        complementRepo.findById(newComplement.getId()).ifPresent(c -> 
            System.out.println("Complément trouvé : " + c.getNom())
        );

        burgerRepo.archive(newBurger.getId());
        System.out.println("Burger archivé avec ID : " + newBurger.getId());

         
    }
}
