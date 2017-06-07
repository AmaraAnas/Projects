package com.example.anasamara.projet;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.test.espresso.core.deps.dagger.internal.DoubleCheckLazy;
import android.support.test.espresso.core.deps.guava.primitives.Floats;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;


import com.example.anasamara.projet.Models.Matiere;
import com.example.anasamara.projet.Models.Notes;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import static com.example.anasamara.projet.AwayFragment.ListDSSem2;
import static com.example.anasamara.projet.AwayFragment.ListExamSem2;
import static com.example.anasamara.projet.AwayFragment.ListTPSem2;
import static com.example.anasamara.projet.HomeFragment.ListDSSem1;
import static com.example.anasamara.projet.HomeFragment.ListExamSem1;
import static com.example.anasamara.projet.HomeFragment.ListTPSem1;

public class Details extends AppCompatActivity {
    EditText cetds, cettp,cetexam;
    TextView tvm;
    String i;
    String matiere ;

    private DatabaseReference myRef1 = FirebaseDatabase.getInstance().getReference();
    private DatabaseReference myRef = FirebaseDatabase.getInstance().getReference();
    private FirebaseAuth mAuth;
    private FirebaseDatabase mDatabase;
    private FirebaseAuth.AuthStateListener mAuthListener;
    FirebaseUser user ;
    private String userID;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details);
        cetds=(EditText)findViewById(R.id.etds);
        cettp=(EditText)findViewById(R.id.ettp);
        cetexam=(EditText)findViewById(R.id.etexam);
        tvm=(TextView)findViewById(R.id.tvd);
        mAuth = FirebaseAuth.getInstance();
        user = mAuth.getCurrentUser();
        userID = user.getUid();
        mAuth = FirebaseAuth.getInstance();
        this.mDatabase = FirebaseDatabase.getInstance();
        Bundle mBundle = getIntent().getExtras();

        if (mBundle != null) {
            matiere = mBundle.getString("mat");
            i = mBundle.getString("i");
        }
        tvm.setText(matiere);
        String  ref = "notes/"+userID+"/"+matiere;

        myRef = mDatabase.getReference(ref);
        myRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {

                Map<String, Object> map = (Map<String, Object>)dataSnapshot.getValue();
               if (map != null) {
                   String ds = (String) map.get("NoteDS");
                   String tp = (String) map.get("NoteTP");
                   String exam = (String) map.get("NoteExam");

                   ListDSSem2[Integer.valueOf(i)]= Float.valueOf(ds);
                   ListTPSem2[Integer.valueOf(i)]= tp;
                   ListExamSem2[Integer.valueOf(i)]= Float.valueOf(exam);

                   cetds.setText(ds);
                   cetexam.setText(exam);
                   cettp.setText(tp);
                }

            }
            @Override
            public void onCancelled(DatabaseError databaseError) {
                // Getting Post failed, log a message
                Log.w("loadPost:onCancelled", databaseError.toException());
                // ...
            }
        });


    }
    public void ok(View v)
    {
        String ds = cetds.getText().toString();
        String tp = cettp.getText().toString();
        String ex = cetexam.getText().toString();
        Notes notes = new  Notes(matiere,ds,tp,ex);
        myRef1.child("notes").child(userID).child(matiere).setValue(notes);
        Intent intent = new Intent(Details.this,HomePage.class);
        startActivity(intent);
    }
    public void cancel(View v)
    {
        Intent intent = new Intent(Details.this,HomePage.class);
        startActivity(intent);
    }
}
