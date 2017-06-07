package com.example.anasamara.projet;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.example.anasamara.projet.Models.Data;
import com.example.anasamara.projet.Models.Matiere;
import com.example.anasamara.projet.Models.UserInformation;
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


/**
 * A simple {@link Fragment} subclass.
 */
public class AwayFragment extends Fragment {




    public static ArrayList<String> ListMatSem2 = new ArrayList<>();
    public ArrayList<Float> ListCoefSem2 = new ArrayList<>();

    public static float[] ListDSSem2 = new float[14];
    public static float[] ListExamSem2 = new float[14];
    public static String[] ListTPSem2 = new String[14];

    public AwayFragment(ArrayList<String> array3, ArrayList<Float> array4) {
        for (int i = 0; i < array3.size(); i++) {
            ListMatSem2.add(array3.get(i));
        }
        for (int i = 0; i < array4.size(); i++) {
            ListCoefSem2.add(array4.get(i));
        }
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_away, container, false);
        // Inflate the layout for this fragment



        final ListView lv = (ListView) view.findViewById(R.id.listView2);

        ArrayAdapter<String> lva = new ArrayAdapter<String>(
                getActivity(), android.R.layout.simple_list_item_1, ListMatSem2);

        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Intent intent = new Intent(AwayFragment.this.getActivity(), Details.class);
                intent.putExtra("mat", lv.getItemAtPosition(i).toString());
                intent.putExtra("i", String.valueOf(i));
                startActivity(intent);
            }
        });
        lv.setAdapter(lva);


        final SwipeRefreshLayout mSwipeRefreshLayout = (SwipeRefreshLayout) view.findViewById(R.id.fragment_away);

        mSwipeRefreshLayout.setOnRefreshListener(
                new SwipeRefreshLayout.OnRefreshListener() {
                    @Override
                    public void onRefresh() {
                        ((HomePage) getActivity()).refreshNow();
                        Toast.makeText(getContext(), "Refresh Layout working", Toast.LENGTH_LONG).show();
                    }
                }
        );

        return view;
    }


}