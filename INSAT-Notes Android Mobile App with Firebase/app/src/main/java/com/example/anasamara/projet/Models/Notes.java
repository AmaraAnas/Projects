package com.example.anasamara.projet.Models;

import com.google.firebase.database.Exclude;

/**
 * Created by Anas Amara on 28/05/2017.
 */

public class Notes {

    public String matier;
    public String NoteDS;
    public String NoteTP;
    public String NoteExam;


    public Notes() {
    }

    public Notes(String matiere, String noteDS, String noteTP, String noteExam) {

        NoteDS = noteDS;
        NoteTP = noteTP;
        NoteExam = noteExam;
        matier = matiere;
    }

    @Exclude
    public String getMatier() {
        return matier;
    }
    @Exclude
    public void setMatier(String matier) {
        this.matier = matier;
    }

    @Exclude
    public String getNoteDS() {
        return NoteDS;
    }
    @Exclude
    public void setNoteDS(String noteDS) {
        NoteDS = noteDS;
    }


    @Exclude
    public String getNoteTP() {
        return NoteTP;
    }
    @Exclude
    public void setNoteTP(String noteTP) {
        NoteTP = noteTP;
    }
    @Exclude
    public String getNoteExam() {
        return NoteExam;
    }
    @Exclude
    public void setNoteExam(String noteExam) {
        NoteExam = noteExam;
    }
}
