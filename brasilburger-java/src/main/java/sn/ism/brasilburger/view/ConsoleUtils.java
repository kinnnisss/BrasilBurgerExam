package sn.ism.brasilburger.view;

import java.util.Scanner;

public final class ConsoleUtils {
    public ConsoleUtils() {
    }
    public static int readInt(Scanner sc, String label) {
        while (true) {
            System.out.print(label);
            String s = sc.nextLine().trim();
            try {
                return Integer.parseInt(s);
            } catch (NumberFormatException e) {
                System.out.println("Entier invalide, recommence.");
            }
        }
    }

    
}
