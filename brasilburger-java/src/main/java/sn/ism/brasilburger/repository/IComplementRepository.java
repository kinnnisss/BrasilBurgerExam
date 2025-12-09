package sn.ism.brasilburger.repository;

import sn.ism.brasilburger.model.Complement;

import java.util.List;
import java.util.Optional;

public interface IComplementRepository {
    List<Complement> findAllActive();
    Optional<Complement> findById(int id);
    Complement save(Complement complement);
    void archive(int id);
}
