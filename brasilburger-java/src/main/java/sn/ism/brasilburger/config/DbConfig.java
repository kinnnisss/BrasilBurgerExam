package sn.ism.brasilburger.config;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class DbConfig {
    private static final String URL = "jdbc:postgresql://localhost:5432/brasilburger_db";
    private static final String USER = "postgres";
    private static final String PASSWORD = "Cisco123@"; 

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
