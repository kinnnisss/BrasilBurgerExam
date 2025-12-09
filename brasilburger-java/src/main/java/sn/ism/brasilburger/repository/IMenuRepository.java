package sn.ism.brasilburger.repository;

import sn.ism.brasilburger.model.Menu;

import java.util.List;
import java.util.Optional;

public interface IMenuRepository {
    List<Menu> findAllActive();
    Optional<Menu> findById(int id);
    Menu save(Menu menu);       // prix déjà calculé
    void archive(int id);
    void updatePrix(int idMenu);
}
