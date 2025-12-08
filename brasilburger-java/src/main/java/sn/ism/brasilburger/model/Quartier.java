package sn.ism.brasilburger.model;

public class Quartier {
    private int id;
    private String libelle;
    private Zone zone; 

    public Quartier() {
    }

    public Quartier(int id, String libelle, Zone zone) {
        this.id = id;
        this.libelle = libelle;
        this.zone = zone;
    }

    public Quartier(String libelle, Zone zone) {
        this(0, libelle, zone);
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

    public Zone getZone() {
        return zone;
    }

    public void setZone(Zone zone) {
        this.zone = zone;
    }

    @Override
    public String toString() {
        return "Quartier{" +
                "id=" + id +
                ", libelle='" + libelle + '\'' +
                ", zone=" + (zone != null ? zone.getLibelle() : "null") +
                '}';
    }
}
