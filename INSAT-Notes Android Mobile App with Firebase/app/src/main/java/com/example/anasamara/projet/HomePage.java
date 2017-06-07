package com.example.anasamara.projet;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.design.widget.TabLayout;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ListView;
import android.widget.Toast;

import com.example.anasamara.projet.Models.Data;
import com.example.anasamara.projet.Models.Matiere;
import com.example.anasamara.projet.Models.Notes;
import com.example.anasamara.projet.Models.UserInformation;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
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

import static com.example.anasamara.projet.AwayFragment.ListDSSem2;
import static com.example.anasamara.projet.AwayFragment.ListExamSem2;
import static com.example.anasamara.projet.AwayFragment.ListMatSem2;
import static com.example.anasamara.projet.AwayFragment.ListTPSem2;
import static com.example.anasamara.projet.HomeFragment.ListDSSem1;
import static com.example.anasamara.projet.HomeFragment.ListExamSem1;
import static com.example.anasamara.projet.HomeFragment.ListMatSem1;
import static com.example.anasamara.projet.HomeFragment.ListTPSem1;

public class HomePage extends AppCompatActivity {


    public Context context;

    TabLayout tabLayout;
    ViewPager viewPager;
    ViewPagerAdapter viewPagerAdapter;
    private FirebaseDatabase mFirebaseDatabase;
    private DatabaseReference myRef1 = FirebaseDatabase.getInstance().getReference();
    private DatabaseReference myRef = FirebaseDatabase.getInstance().getReference();
    private FirebaseAuth mAuth;
    private FirebaseDatabase mDatabase;
    private FirebaseAuth.AuthStateListener mAuthListener;
    FirebaseUser user;
    private String userID;
    private ListView mListView;
    ArrayList<String> array1;
    ArrayList<Float> array2;
    ArrayList<String> array3;
    ArrayList<Float> array4;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_page);


        mListView = (ListView) findViewById(R.id.listview);
        array1 = new ArrayList<>();
        array2 = new ArrayList<>();
        array3 = new ArrayList<>();
        array4 = new ArrayList<>();

        mAuth = FirebaseAuth.getInstance();
        mFirebaseDatabase = FirebaseDatabase.getInstance();
        myRef = mFirebaseDatabase.getReference("users");
        user = mAuth.getCurrentUser();
        userID = user.getUid();
        this.mDatabase = FirebaseDatabase.getInstance();


        tabLayout = (TabLayout) findViewById(R.id.tabLayout);
        viewPager = (ViewPager) findViewById(R.id.viewPager);
        myRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                showData(dataSnapshot);
                remplirTab();
            }
            @Override
            public void onCancelled(DatabaseError databaseError) {

            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.menu_settings:
                mAuth.signOut();
                toastMessage("Signing Out...");
                Intent intent = new Intent(HomePage.this, MainActivity.class);
                startActivity(intent);

            default:
                return super.onOptionsItemSelected(item);
        }
    }


    private void showData(DataSnapshot dataSnapshot) {
        final Data dataset = new Data(getApplicationContext());
        final UserInformation uInfo = new UserInformation();
        for (DataSnapshot ds : dataSnapshot.getChildren()) {

            if (ds.getKey().equals(userID)) {

                uInfo.setName(ds.getValue(UserInformation.class).getName()); //set the name
                uInfo.setClasse(ds.getValue(UserInformation.class).getClasse()); //set the email
                uInfo.setPhone_num(ds.getValue(UserInformation.class).getPhone_num()); //set the phone_num
            }
        }

        List<String> M = dataset.getClasses();
        int index = dataset.getIndex(M,uInfo.getClasse().getClasse());

        String  ref = "Classes/"+index+"/MatieresSem1";

        final List<Matiere> L = new ArrayList<Matiere>();
        myRef = mDatabase.getReference(ref);
        myRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                List<Object> classes = (List<Object>) dataSnapshot.getValue();
                for (int i = 0; i < classes.size(); i++) {
                    Map<String, Object> map2 = (Map<String, Object>) classes.get(i);
                    String matieeree = (String) map2.get("Matiere");
                    String coefficient = (String) map2.get("coefficient");
                    Matiere M1 = new Matiere(matieeree,Float.valueOf(coefficient));
                    L.add(M1);
                }
                for (int i = 0 ; i<L.size();i++)
                {
                    array1.add(L.get(i).getMatiere()) ;
                    array2.add(L.get(i).getCoefficient()) ;
                }
                viewPagerAdapter = new ViewPagerAdapter(getSupportFragmentManager());
                viewPagerAdapter.addFragments(new HomeFragment(array1,array2), "Semestre 1");
                Log.d("TAG", "arrray1 : " + array1.toString());
                Log.d("TAG", "arrray2 : " + array2.toString());
                List<Matiere> mat2 = new ArrayList<>();
                mat2 = dataset.getMatiere2emeSem(uInfo.getClasse().getClasse());

                for (int i = 0 ; i<mat2.size();i++)
                {
                    array3.add(mat2.get(i).getMatiere()) ;
                    array4.add(mat2.get(i).getCoefficient()) ;
                }


                viewPagerAdapter.addFragments(new AwayFragment(array3,array4), "Semestre 2");
                Log.d("TAG", "arrray3 : " + array3.toString());
                Log.d("TAG", "arrray4 : " + array4.toString());
                viewPager.setAdapter(viewPagerAdapter);
                tabLayout.setupWithViewPager(viewPager);


            }
            @Override
            public void onCancelled(DatabaseError databaseError) {
                // Getting Post failed, log a message
                Log.w("loadPost:onCancelled", databaseError.toException());
                // ...
            }
        });

    }
    private void toastMessage(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }
    public void refreshNow (){
        finish();
        overridePendingTransition( 0, 0);
        startActivity(getIntent());
        overridePendingTransition( 0, 0);
    }
    public void remplirTab() {

        String ref = "notes/" + userID ;

        myRef1 = mDatabase.getReference(ref);
        myRef1.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                for (DataSnapshot ds : dataSnapshot.getChildren()) {


                    int  m = array3.indexOf(ds.getValue(Notes.class).getMatier());
                    int  c  = array1.indexOf(ds.getValue(Notes.class).getMatier());
                    if (m>-1)
                    {
                        ListDSSem2[m] = Float.valueOf(ds.getValue(Notes.class).getNoteDS());
                        ListExamSem2[m] = Float.valueOf(ds.getValue(Notes.class).getNoteExam());
                        ListTPSem2[m] = ds.getValue(Notes.class).getNoteTP();

                    }
                    else {
                        ListDSSem1[c] = Float.valueOf(ds.getValue(Notes.class).getNoteDS());
                        ListExamSem1[c] = Float.valueOf(ds.getValue(Notes.class).getNoteExam());
                        ListTPSem1[c] = ds.getValue(Notes.class).getNoteTP();

                    }



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
    public Double calculMoy() {
        int i ;
        Double m1=0.0,m2=0.0 ;


        for(i=0;i<ListMatSem1.size();i++)

        {
            if (ListTPSem1[i] != null) {
                if (ListTPSem1[i].compareTo("") == 0) {
                    m1 = m1 + (((ListExamSem1[i] * 2) + ListDSSem1[i]) / 3);
                } else {
                    m1 = m1 + (((ListExamSem1[i] * 2) + ListDSSem1[i] + Double.valueOf(ListTPSem1[i])) / 4);
                }
            }
        }
        m1=m1/ListMatSem1.size();

        for(i=0;i<ListMatSem2.size();i++)
        {
            if(ListTPSem2[i].compareTo("")==0)
            {
                m2=m2+(((ListExamSem2[i]*2)+ListDSSem2[i])/3);
            }
            else
            {
                m2=m2+(((ListExamSem2[i]*2)+ListDSSem2[i]+Float.valueOf(ListTPSem2[i]))/4);
            }
        }
        m2=m2/ListMatSem2.size();


        return (m1+m2)/2;

    }
    public  void  calculer(View v) {
        System.out.println("Appel couton calculer!!!");
        Double m =calculMoy();
        Intent intent = new Intent(HomePage.this,Results.class);
        intent.putExtra("moyenne",m.toString());
        startActivity(intent);
    }
}

