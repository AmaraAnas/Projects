package com.example.anasamara.projet;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
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
import com.google.gson.Gson;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Map;
import java.util.regex.Pattern;

public class MainActivity extends AppCompatActivity {


    //private DatabaseReference myRef;
   // private FirebaseDatabase  mDatabase;
    private Button bt;
    private Button btreg;
    private Button btnSignOut;
    private EditText email;
    private EditText password;
    private Spinner spinner;
    private EditText nom;
    private EditText tel;
    private DatabaseReference myRef = FirebaseDatabase.getInstance().getReference();
    List<String> List = new ArrayList<String>();
    List<Matiere> ListMatiere = new ArrayList<Matiere>();
    private FirebaseAuth mAuth;
    private FirebaseAuth.AuthStateListener mAuthListener;
    FirebaseUser user ;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        mAuth = FirebaseAuth.getInstance();
        btreg = (Button) this.findViewById(R.id.register);
        bt = (Button) this.findViewById(R.id.email_sign_in_button);
        //btnSignOut = (Button) this.findViewById(R.id.email_sign_out_button);
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
                    Intent intent = new Intent(MainActivity.this, HomePage.class);
                    startActivity(intent);
                } else {
                    // User is signed out
                    Log.d("TAG", "onAuthStateChanged:signed_out");
                    toastMessage("Successfully signed out.");
                }
                // ...
            }
        };

        this.bt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String emaail = "";
                String pass = "";
                emaail = email.getText().toString();
                pass  = password.getText().toString();
                SignIn(emaail,pass);

        }
        });

        btreg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, Registration.class);
                startActivity(intent);
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
    private void SignIn(String email, String passwd){

        if (TextUtils.isEmpty(email) || TextUtils.isEmpty(passwd)  ){
            Context context = getApplicationContext();
            CharSequence text = "champ Vide !!!!";
            int duration = Toast.LENGTH_SHORT;
            Toast toast = Toast.makeText(context, text, duration);
            toast.show();
        }
        else {
            mAuth.signInWithEmailAndPassword(email,passwd).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    if (!task.isSuccessful()) {
                        Toast.makeText(MainActivity.this, "Sign in Problem",
                                Toast.LENGTH_SHORT).show();
                    }
                    else {
                        Intent intent = new Intent(MainActivity.this, HomePage.class);
                        startActivity(intent);
                    }
                }
            });

        }

    }
    private void toastMessage(String message){
        Toast.makeText(this,message,Toast.LENGTH_SHORT).show();
    }


}
