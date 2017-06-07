package com.example.anasamara.projet.Models;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Anas Amara on 23/04/2017.
 */

public class Classe {
    public String classe;
    public List<Matiere> matieres;

    public Classe() {
    }
    public Classe(String classe) {
        this.classe = classe;
        matieres = new ArrayList<Matiere>() ;
    }

    public String getClasse() {
        return classe;
    }

    public void setClasse(String classe) {
        this.classe = classe;
    }

    public List<Matiere> getMatieres() {
        return matieres;
    }

    public void setMatieres(List<Matiere> matieres) {
        this.matieres = matieres;
    }
}
