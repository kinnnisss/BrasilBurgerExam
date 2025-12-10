package sn.ism.brasilburger.config;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class DbConfig {
    private static final String DEFAULT_URL = "jdbc:postgresql://localhost:5432/brasilburger_db";
    private static final String DEFAULT_USER = "postgres";
    private static final String DEFAULT_PASSWORD = "Cisco123@";

    private static final String URL = System.getenv().getOrDefault(
            "BB_DB_URL",
            DEFAULT_URL
    );

    private static final String USER = System.getenv().getOrDefault(
            "BB_DB_USER",
            DEFAULT_USER
    );

    private static final String PASSWORD = System.getenv().getOrDefault(
            "BB_DB_PASSWORD",
            DEFAULT_PASSWORD
    );    

    static {
        try {
            Class.forName("org.postgresql.Driver");
        } catch (ClassNotFoundException e) {
            throw new RuntimeException("Driver PostgreSQL introuvable", e);
        }
    }
    private DbConfig() {
    }

  public static Connection getConnection() throws SQLException {
        return DriverManager.getConnection(URL, USER, PASSWORD);
    }
}
