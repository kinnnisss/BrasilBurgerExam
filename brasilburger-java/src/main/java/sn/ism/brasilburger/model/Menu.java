package sn.ism.brasilburger.model;

import java.math.BigDecimal;

public class Menu {
    private int id;
    private String nom;
    private String image;
    private BigDecimal prix;
    private boolean archived;

    public Menu() {
    }

    public Menu(int id, String nom, String image, BigDecimal prix, boolean archived) {
        this.id = id;
        this.nom = nom;
        this.image = image;
        this.prix = prix;
        this.archived = archived;
    }

    public Menu(String nom, String image, BigDecimal prix) {
        this(0, nom, image, prix, false);
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

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public BigDecimal getPrix() {
        return prix;
    }

    public void setPrix(BigDecimal prix) {
        this.prix = prix;
    }

    public boolean isArchived() {
        return archived;
    }

    public void setArchived(boolean archived) {
        this.archived = archived;
    }

    @Override
    public String toString() {
        return "Menu{" +
                "id=" + id +
                ", nom='" + nom + '\'' +
                ", image='" + image + '\'' +
                ", prix=" + prix +
                ", archived=" + archived +
                '}';
    }
}
