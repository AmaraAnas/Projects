package com.example.anasamara.projet.BDConnection;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

/**
 * Created by Anas Amara on 20/04/2017.
 */

public class ConnectBD {

    public DatabaseReference mDatabase;


    public  DatabaseReference getInstance()
    {
        return this.mDatabase = FirebaseDatabase.getInstance().getReference();
    }
}

