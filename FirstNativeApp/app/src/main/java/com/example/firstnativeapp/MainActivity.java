package com.example.firstnativeapp;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    // Used to load the 'native-lib' library on application startup.

    private Button btnJavaCheck;
    private Button btnNativeCheck;
    private EditText textNumber;
    private TextView txtNameAlgorithm;
    private TextView txtNumberCheck;
    private TextView txtTime;
    private LinearLayout txtContainer;
    private CheckPrimeNumberJava checkPrimeNumberJava;
    private CheckPrimeNumberNative checkPrimeNumberNative;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnJavaCheck = (Button) findViewById(R.id.btn_start_java);
        btnNativeCheck = (Button) findViewById(R.id.btn_start_native);
        textNumber = (EditText) findViewById(R.id.txt_number);
        txtTime = (TextView) findViewById(R.id.txt_time);
        txtNameAlgorithm = (TextView) findViewById(R.id.txt_name_algorithm);
        txtNumberCheck = (TextView) findViewById(R.id.txt_number_check);
        txtContainer = (LinearLayout) findViewById(R.id.txt_container);

        checkPrimeNumberJava = new CheckPrimeNumberJava();
        checkPrimeNumberNative = new CheckPrimeNumberNative();

        txtContainer.setVisibility(View.GONE);

        btnNativeCheck.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!textNumber.getText().toString().isEmpty()) {
                    long number = Long.parseLong(textNumber.getText().toString());
                    txtContainer.setVisibility(View.VISIBLE);
                    txtNameAlgorithm.setText("Phép tính số nguyên: Kiểm tra số nguyên tố (Native C++)");
                    txtNumberCheck.setText("Số kiểm tra: " + number);
                    txtTime.setText("Thời gian thực thi: " + checkPrimeNumberNative.getTimeExecute(number) + "ms");
                }
            }
        });

        btnJavaCheck.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!textNumber.getText().toString().isEmpty()) {
                    long number = Long.parseLong(textNumber.getText().toString());
                    txtContainer.setVisibility(View.VISIBLE);
                    txtNameAlgorithm.setText("Phép tính số nguyên: Kiểm tra số nguyên tố (Java)");
                    txtNumberCheck.setText("Số kiểm tra: " + number);
                    txtTime.setText("Thời gian thực thi: " + checkPrimeNumberJava.getTimeExecute(number) + "ms");
                }
            }
        });

    }
}
