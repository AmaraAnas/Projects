package com.example.anasamara.projet;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

import com.example.anasamara.projet.Models.Notes;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.Map;

import static com.example.anasamara.projet.AwayFragment.ListDSSem2;
import static com.example.anasamara.projet.AwayFragment.ListExamSem2;
import static com.example.anasamara.projet.AwayFragment.ListTPSem2;
import static com.example.anasamara.projet.HomeFragment.ListDSSem1;
import static com.example.anasamara.projet.HomeFragment.ListExamSem1;
import static com.example.anasamara.projet.HomeFragment.ListTPSem1;

public class Details2 extends AppCompatActivity {
    EditText cetds2, cettp2,cetexam2;
    TextView tvm2;
    String i2;
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
        setContentView(R.layout.activity_details2);
        cetds2=(EditText)findViewById(R.id.etds2);
        cettp2=(EditText)findViewById(R.id.ettp2);
        cetexam2=(EditText)findViewById(R.id.etexam2);
        tvm2=(TextView)findViewById(R.id.tvd2);
        mAuth = FirebaseAuth.getInstance();
        user = mAuth.getCurrentUser();
        userID = user.getUid();
        mAuth = FirebaseAuth.getInstance();
        this.mDatabase = FirebaseDatabase.getInstance();
        Bundle mBundle = getIntent().getExtras();
        if (mBundle != null) {

            i2 = mBundle.getString("i2");
            matiere = mBundle.getString("mat2");

        }
        tvm2.setText(matiere);
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

                    ListDSSem1[Integer.valueOf(i2)]= Float.valueOf(ds);
                    ListTPSem1[Integer.valueOf(i2)]= tp;
                    ListExamSem1[Integer.valueOf(i2)]= Float.valueOf(exam);

                    cetds2.setText(ds);
                    cetexam2.setText(exam);
                    cettp2.setText(tp);
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
    public void ok2(View v)
    {
        String ds = cetds2.getText().toString();
        String tp = cettp2.getText().toString();
        String ex = cetexam2.getText().toString();
        Notes notes = new  Notes(matiere,ds,tp,ex);
        myRef1.child("notes").child(userID).child(matiere).setValue(notes);
        Intent intent = new Intent(Details2.this,HomePage.class);
        startActivity(intent);
    }
    public void cancel2(View v)
    {
        Intent intent = new Intent(Details2.this,MainActivity.class);
        startActivity(intent);
    }
}
