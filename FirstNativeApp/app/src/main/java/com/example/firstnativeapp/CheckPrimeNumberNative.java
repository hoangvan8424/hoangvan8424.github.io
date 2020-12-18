package com.example.firstnativeapp;

public class CheckPrimeNumberNative {
    static {
        System.loadLibrary("native-lib");
    }

    /**
     * A native method that is implemented by the 'native-lib' native library,
     * which is packaged with this application.
     */
    public native int getTimeExecute(long number);
}
