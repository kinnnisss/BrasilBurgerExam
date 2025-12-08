package sn.ism.brasilburger.model;

import java.math.BigDecimal;

public class Zone {
    private int id;
    private String libelle;
    private BigDecimal prixLivraison;

    public Zone() {
    }

    public Zone(int id, String libelle, BigDecimal prixLivraison) {
        this.id = id;
        this.libelle = libelle;
        this.prixLivraison = prixLivraison;
    }

    public Zone(String libelle, BigDecimal prixLivraison) {
        this(0, libelle, prixLivraison);
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getLibelle() {
        return libelle;
    }

    public void setLibelle(String libelle) {
        this.libelle = libelle;
    }

    public BigDecimal getPrixLivraison() {
        return prixLivraison;
    }

    public void setPrixLivraison(BigDecimal prixLivraison) {
        this.prixLivraison = prixLivraison;
    }

    @Override
    public String toString() {
        return "Zone{" +
                "id=" + id +
                ", libelle='" + libelle + '\'' +
                ", prixLivraison=" + prixLivraison +
                '}';
    }
}
