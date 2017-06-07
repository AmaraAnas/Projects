package com.example.anasamara.projet;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;


/**
 * A simple {@link Fragment} subclass.
 */
public class HomeFragment extends Fragment {

    public static ArrayList<String> ListMatSem1 = new ArrayList<>();
    public ArrayList<Float> ListCoefSem1 = new ArrayList<>();

    public static float[] ListDSSem1 = new float[14];
    public static float[] ListExamSem1 = new float[14];
    public static String[] ListTPSem1 = new String[14];


    public HomeFragment(ArrayList<String> array1  ,ArrayList<Float> array2)
    {
        for (int i = 0 ; i<array1.size();i++)
        {
            ListMatSem1.add(array1.get(i))  ;
        }
        for (int i = 0 ; i<array2.size();i++)
        {
            ListCoefSem1.add(array2.get(i))  ;
        }
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_home, container, false);
        // Inflate the layout for this fragment


       final ListView lv = (ListView) view.findViewById(R.id.listView3);

        ArrayAdapter<String> lva = new ArrayAdapter<String>(
                getActivity(), android.R.layout.simple_list_item_1,ListMatSem1);

        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Intent intent = new Intent(HomeFragment.this.getActivity(),Details.class);
                intent.putExtra("mat", lv.getItemAtPosition(i).toString());
                intent.putExtra("i", String.valueOf(i));
                System.out.println("i ="+i);
                startActivity(intent);
            }
        });
        lv.setAdapter(lva);

        final SwipeRefreshLayout mSwipeRefreshLayout = (SwipeRefreshLayout) view.findViewById(R.id.fragment_home);

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

