package sn.ism.brasilburger.service;

import sn.ism.brasilburger.model.Menu;

import java.util.List;

public interface IMenuService {
    List<Menu> lister();
    Menu creerMenuSimple(String nom, String image);
    Menu creerMenuCompose(String nom, String image, List<Integer> burgerIds, List<Integer> complementIds);
    void archiver(int idMenu);
}
