package sn.ism.brasilburger.model;

import java.math.BigDecimal;

public class Burger {
    private int id;
    private String nom;
    private BigDecimal prix;
    private String image;
    private boolean archived;

    public Burger() {
    }

    public Burger(int id, String nom, BigDecimal prix, String image, boolean archived) {
        this.id = id;
        this.nom = nom;
        this.prix = prix;
        this.image = image;
        this.archived = archived;
    }

    public Burger(String nom, BigDecimal prix, String image) {
        this(0, nom, prix, image, false);
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public BigDecimal getPrix() {
        return prix;
    }

    public void setPrix(BigDecimal prix) {
        this.prix = prix;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public boolean isArchived() {
        return archived;
    }

    public void setArchived(boolean archived) {
        this.archived = archived;
    }

    @Override
    public String toString() {
        return "Burger{" +
                "id=" + id +
                ", nom='" + nom + '\'' +
                ", prix=" + prix +
                ", image='" + image + '\'' +
                ", archived=" + archived +
                '}';
    }
}
