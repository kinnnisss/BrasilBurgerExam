package sn.ism.brasilburger.model;

import java.math.BigDecimal;

public class Complement {
    private int id;
    private String nom;
    private TypeComplement type;
    private BigDecimal prix;
    private String image;
    private boolean archived;

    public Complement() {
    }

    public Complement(int id, String nom, TypeComplement type, BigDecimal prix, String image, boolean archived) {
        this.id = id;
        this.nom = nom;
        this.type = type;
        this.prix = prix;
        this.image = image;
        this.archived = archived;
    }

    public Complement(String nom, TypeComplement type, BigDecimal prix, String image) {
        this(0, nom, type, prix, image, false);
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

    public TypeComplement getType() {
        return type;
    }

    public void setType(TypeComplement type) {
        this.type = type;
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
        return "Complement{" +
                "id=" + id +
                ", nom='" + nom + '\'' +
                ", type=" + type +
                ", prix=" + prix +
                ", image='" + image + '\'' +
                ", archived=" + archived +
                '}';
    }
}
