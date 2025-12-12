package sn.ism.brasilburger.service;

import sn.ism.brasilburger.model.Burger;

import java.math.BigDecimal;
import java.util.List;

public interface IBurgerService {
    List<Burger> lister();
    Burger creer(String nom, BigDecimal prix, String image);
    void archiver(int idBurger);
}
