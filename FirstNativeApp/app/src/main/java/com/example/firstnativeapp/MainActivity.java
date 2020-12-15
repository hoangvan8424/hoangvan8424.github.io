package com.example.firstnativeapp;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    // Used to load the 'native-lib' library on application startup.
    static {
        System.loadLibrary("native-lib");
    }

    private Button btnCheckPrime;
    private EditText textNumber;
    private TextView txtTime;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Example of a call to a native method
        btnCheckPrime = (Button) findViewById(R.id.btn_check);
        textNumber = (EditText) findViewById(R.id.txt_number);
        txtTime = (TextView) findViewById(R.id.txt_time);

        txtTime.setText("");
        btnCheckPrime.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                txtTime.setText("");
                if(!textNumber.getText().toString().isEmpty()) {
                    int number = Integer.parseInt(textNumber.getText().toString());
                    if(isPrime(number)) {
                        Toast.makeText(MainActivity.this, number+" is prime number", Toast.LENGTH_LONG).show();
                        txtTime.setText("Time Execute: " + String.format("%.10f", getTimeExecute(number)));
                    } else {
                        Toast.makeText(MainActivity.this, number+" is not prime number", Toast.LENGTH_LONG).show();
                        txtTime.setText("Time Execute: " + String.format("%.10f", getTimeExecute(number)));
                    }
                }
            }
        });

    }

    /**
     * A native method that is implemented by the 'native-lib' native library,
     * which is packaged with this application.
     */
    public native boolean isPrime(int number);
    public native float getTimeExecute(int number);
}
