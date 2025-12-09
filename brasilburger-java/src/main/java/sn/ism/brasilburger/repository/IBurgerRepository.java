package sn.ism.brasilburger.repository;

import sn.ism.brasilburger.model.Burger;

import java.util.List;
import java.util.Optional;

public interface IBurgerRepository {
    List<Burger> findAllActive();
    Optional<Burger> findById(int id);
    Burger save(Burger burger);        
    void archive(int id);
}
