package com.example.anasamara.projet.Models;

import com.example.anasamara.projet.BDConnection.ConnectBD;
import com.google.firebase.database.DatabaseReference;

/**
 * Created by Anas Amara on 20/04/2017.
 */

public class Matiere {

    public String matiere;
    public float coefficient;

    ConnectBD connect = new ConnectBD();
    DatabaseReference mDatabase = connect.getInstance();


    public Matiere() {
        // Default constructor required for calls to DataSnapshot.getValue(User.class)
    }

    public Matiere(String matiere, float coefficient) {
        this.matiere = matiere;
        this.coefficient = coefficient;

    }

    public String getMatiere() {
        return matiere;
    }

    public void setMatiere(String matiere) {
        this.matiere = matiere;
    }

    public float getCoefficient() {
        return coefficient;
    }

    public void setCoefficient(float coefficient) {
        this.coefficient = coefficient;
    }

    @Override
    public String toString() {
        return "Matiere{" +
                "matiere='" + matiere + '\'' +
                ", coefficient=" + coefficient +
                '}';
    }
}
