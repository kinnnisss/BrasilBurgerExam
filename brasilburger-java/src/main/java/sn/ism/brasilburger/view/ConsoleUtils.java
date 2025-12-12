package sn.ism.brasilburger.view;

import java.math.BigDecimal;
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

    public static BigDecimal readBigDecimal(Scanner sc, String label) {
        while (true) {
            System.out.print(label);
            String s = sc.nextLine().trim().replace(",", ".");
            try {
                return new BigDecimal(s);
            } catch (Exception e) {
                System.out.println("Nombre invalide, recommence.");
            }
        }
    }

    public static String readString(Scanner sc, String label, boolean required) {
        while (true) {
            System.out.print(label);
            String s = sc.nextLine();
            if (!required) return s;
            if (s != null && !s.isBlank()) return s;
            System.out.println("Champ obligatoire.");
        }
    }
    
}
