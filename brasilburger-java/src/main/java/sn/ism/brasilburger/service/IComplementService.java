package sn.ism.brasilburger.service;

import sn.ism.brasilburger.model.Complement;
import sn.ism.brasilburger.model.TypeComplement;

import java.math.BigDecimal;
import java.util.List;

public interface IComplementService {
    List<Complement> lister();
    Complement creer(String nom, TypeComplement type, BigDecimal prix, String image);
    void archiver(int idComplement);
}
