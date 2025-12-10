package sn.ism.brasilburger.config;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class DbConfig {
    private static final String DEFAULT_URL = "jdbc:postgresql://localhost:5432/brasilburger_db";
    private static final String DEFAULT_USER = "postgres";
    private static final String DEFAULT_PASSWORD = "Cisco123@";


    static {
        try {
            Class.forName("org.postgresql.Driver");
        } catch (ClassNotFoundException e) {
            throw new RuntimeException("Driver PostgreSQL introuvable", e);
        }
    }
    private DbConfig() {
    }

  
}
