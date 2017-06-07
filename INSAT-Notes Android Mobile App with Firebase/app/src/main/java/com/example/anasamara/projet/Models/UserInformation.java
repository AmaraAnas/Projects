package com.example.anasamara.projet.Models;

/**
 * Created by User on 2/8/2017.
 */

public class UserInformation {

    private String name;
    private String phone_num;
    private Classe classe ;


    public UserInformation(String name, String phone_num, Classe classe) {
        this.name = name;
        this.phone_num = phone_num;
        this.classe = classe;
    }

    public UserInformation(){

    }

    public Classe getClasse() {
        return classe;
    }
    public void setClasse(Classe classe) {
        this.classe = classe;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPhone_num() {
        return phone_num;
    }

    public void setPhone_num(String phone_num) {
        this.phone_num = phone_num;
    }
}
