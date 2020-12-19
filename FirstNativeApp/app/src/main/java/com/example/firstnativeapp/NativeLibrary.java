package com.example.firstnativeapp;

public class NativeLibrary {
    static {
        System.loadLibrary("native-lib");
    }

    /**
     * A native method that is implemented by the 'native-lib' native library,
     * which is packaged with this application.
     */
    public native int checkPrime(long number);
    public native int squareArea(long number);
}
