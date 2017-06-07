package com.example.anasamara.projet;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.TextView;

public class Results extends AppCompatActivity {
    TextView mo;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_results);


        Bundle mBundle = getIntent().getExtras();
        if (mBundle != null) {

             String m = mBundle.getString("moyenne");
            mo =(TextView)findViewById(R.id.moy);
            mo.setText(m);
        }
    }
}
