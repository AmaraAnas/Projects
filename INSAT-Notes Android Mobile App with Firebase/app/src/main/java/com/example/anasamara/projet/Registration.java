package com.example.anasamara.projet;

import android.content.Context;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.anasamara.projet.Models.Classe;
import com.example.anasamara.projet.Models.Data;
import com.example.anasamara.projet.Models.Matiere;
import com.example.anasamara.projet.Models.UserInformation;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Registration extends AppCompatActivity {
    private Button bt;
    private EditText email;
    private EditText password;
    private Spinner spinner;
    private EditText nom;
    private EditText tel;
    public static final String Name = "Name";
    public static final String Key = "String";
    SharedPreferences sharedPref;

    private DatabaseReference myRef = FirebaseDatabase.getInstance().getReference();
    private FirebaseAuth mAuth;
    private FirebaseAuth.AuthStateListener mAuthListener;
    FirebaseUser user ;
    String uid ="";



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registration);
        mAuth = FirebaseAuth.getInstance();
        bt = (Button) this.findViewById(R.id.registerer);
        email = (EditText) this.findViewById(R.id.email);
        password = (EditText) this.findViewById(R.id.password);
        spinner = (Spinner) findViewById(R.id.classes);
        nom = (EditText) this.findViewById(R.id.nom);
        tel = (EditText) this.findViewById(R.id.phone);

        mAuthListener = new FirebaseAuth.AuthStateListener() {
            @Override
            public void onAuthStateChanged(@NonNull FirebaseAuth firebaseAuth) {
                user = firebaseAuth.getCurrentUser();
                if (user != null) {
                    // User is signed in
                    Log.d("TAG", "onAuthStateChanged:signed_in:" + user.getUid());
                    toastMessage("Successfully signed in with: " + user.getEmail());
                } else {
                    // User is signed out
                    Log.d("TAG", "onAuthStateChanged:signed_out");
                    toastMessage("Successfully signed out.");
                }
                // ...
            }
        };
        addItemsOnSpinner();
        this.bt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String emaail = "";
                String pass = "";
                emaail = email.getText().toString();
                pass  = password.getText().toString();
                registerUser(emaail,pass);
               // toastMessage("hello uid "+Useruid);
                //myRef.child("users").child(Useruid).setValue(U);
            }
        });
    }

    @Override
    public void onStart() {
        super.onStart();
        mAuth.addAuthStateListener(mAuthListener);
    }
    @Override
    public void onStop() {
        super.onStop();
        if (mAuthListener != null) {
            mAuth.removeAuthStateListener(mAuthListener);
        }
    }
    private void toastMessage(String message){
        Toast.makeText(this,message,Toast.LENGTH_SHORT).show();
    }
    //creating a new user
    private void registerUser(String email, String passwd){

        mAuth.createUserWithEmailAndPassword(email, passwd)
                .addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        String key = "";
                        //checking if success
                        if(task.isSuccessful()){
                            key = task.getResult().getUser().getUid();
                            toastMessage("seccuss here "+key);
                            String name = "";
                            String phone = "";
                            String c = String.valueOf(spinner.getSelectedItem());
                            Classe classe = new Classe(c);
                            name = nom.getText().toString();
                            phone = tel.getText().toString();
                            UserInformation U = new UserInformation(name,phone,classe);
                          //  toastMessage("hello uid "+Useruid);
                            myRef.child("users").child(key).setValue(U);
                           /* sharedPref = getApplicationContext().getSharedPreferences(Name, MODE_PRIVATE);
                            SharedPreferences.Editor editor = sharedPref.edit();
                            editor.putString(Key, key);
                            editor.apply();*/

                        }else{
                            toastMessage("Failed");                        }


                    }
                });
        /*sharedPref = getApplicationContext().getSharedPreferences(Name, MODE_PRIVATE);
        uid = sharedPref.getString(Key, null);
       // toastMessage("hello thoast "+uid);
        return uid ;*/
    }
    // add items into spinner dynamically
    public void addItemsOnSpinner() {
        Data dataset = new Data(getApplicationContext());
        List<String> list = new ArrayList<String>();
        list = dataset.getClasses();
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, list);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(dataAdapter);
    }


}
