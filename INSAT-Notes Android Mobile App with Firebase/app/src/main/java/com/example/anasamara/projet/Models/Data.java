package com.example.anasamara.projet.Models;

import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;

import com.example.anasamara.projet.AwayFragment;
import com.example.anasamara.projet.HomeFragment;
import com.example.anasamara.projet.ViewPagerAdapter;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.google.gson.Gson;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Map;
import java.util.regex.Pattern;

import static android.content.Context.MODE_APPEND;
import static android.content.Context.MODE_PRIVATE;

public class Data {

    private DatabaseReference myRef;
    private FirebaseDatabase mDatabase;

    public Context context;
    public static final String Car_Name = "Name_PREFS";
    public static final String Car_Key = "String_PREFS";
    public static final String C_Name = "PREFS";
    public static final String C_Key = "S_PREFS";

    SharedPreferences sharedPreferences;
    SharedPreferences shared;


    public Data(Context context) {
        this.context = context;
        this.mDatabase = FirebaseDatabase.getInstance() ;

    }

    public List<String> getClasses() {

        myRef = mDatabase.getReference("Classes");
        myRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                List<String> L = new ArrayList<String>();
                List<Object> classes = (List<Object>) dataSnapshot.getValue();
                for (int i = 0; i < classes.size(); i++) {
                    Map<String, Object> map = (Map<String, Object>) classes.get(i);
                    String Classe = (String) map.get("Classe");
                    L.add(Classe);
                }

                String listitems = L.toString();
                sharedPreferences = context.getSharedPreferences(Car_Name, MODE_PRIVATE);
                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.putString(Car_Key, listitems);
                editor.apply();
            }

            @Override
            public void onCancelled(DatabaseError databaseError) {
                // Getting Post failed, log a message
                Log.w("loadPost:onCancelled", databaseError.toException());
                // ...
            }
        });
        sharedPreferences = context.getSharedPreferences(Car_Name, MODE_PRIVATE);
        Log.d("TAG", "shared Pref 1 : " +  sharedPreferences + " here");
        String listofitem = sharedPreferences.getString(Car_Key, null);
        //Log.d("TAG", "shared Pref 1 : " +  listofitem + " here");
        List<String> list = Arrays.asList(listofitem.substring(1, listofitem.length() - 1).split(", "));
        return list;

    }
    public int getIndex(List<String> L, String itemName) {
        for (int i = 0; i < L.size(); i++)
        {
            if (itemName.equals(L.get(i)))
            {
                return i;
            }
        }

        return -1;
    }

    public List<Matiere> getMatiere2emeSem(String classe) {
        List<String> M = getClasses();
        int index = getIndex(M,classe);
        String   ref = "Classes/"+index+"/MatieresSem2";

        myRef = mDatabase.getReference(ref);
        myRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                List<Matiere> L = new ArrayList<Matiere>();
                List<Object> classes = (List<Object>) dataSnapshot.getValue();
                for (int i = 0; i < classes.size(); i++) {
                    Map<String, Object> map2 = (Map<String, Object>) classes.get(i);
                    String matieeree = (String) map2.get("Matiere");
                    String coefficient = (String) map2.get("coefficient");
                    Matiere M1 = new Matiere(matieeree,Float.valueOf(coefficient));
                    L.add(M1);
                }
                String listitems = L.toString();
                shared = context.getSharedPreferences(C_Name, MODE_APPEND);
                SharedPreferences.Editor editor = shared.edit();
                editor.putString(C_Key, listitems);
                editor.commit();
            }
            @Override
            public void onCancelled(DatabaseError databaseError) {
                // Getting Post failed, log a message
                Log.w("loadPost:onCancelled", databaseError.toException());
                // ...
            }
        });

        shared = context.getSharedPreferences(C_Name, MODE_PRIVATE);
        String listofitem = shared.getString(C_Key, null);
        Log.d("TAG", "shared Pref 3 : " +  shared + " here");
        List<String> list = Arrays.asList(listofitem.substring(1, listofitem.length() - 1).split(Pattern.quote("}")));
        List<String> ls = new ArrayList<>();
        List<Matiere> ListMatiere = new ArrayList<Matiere>();
        for (int i = 0; i < list.size(); i++) {
            List<String>   S = Arrays.asList(list.get(i).split(Pattern.quote("{")));
            ls.add(S.get(1));
        }
        for (int i = 0; i < ls.size(); i++) {
            List<String>   S = Arrays.asList(ls.get(i).split(Pattern.quote(", ")));
            String[] L = S.get(0).split("=");
            String[] C = S.get(1).split("=");
            String matiere = L[1].substring(1,L[1].length() - 1);
            float coeff = Float.valueOf(C[1]);
            Matiere m = new Matiere(matiere,coeff);
            ListMatiere.add(m);
        }
        return ListMatiere;
    }


}
