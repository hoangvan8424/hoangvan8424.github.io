package com.example.firstnativeapp;

public class CheckPrimeNumberJava {
    public long getTimeExecute(long number) {
        int i;
        int check = 0;
        long tStart = System.currentTimeMillis();

        for(i = 2; i <= number/2; i++) {
            if (number % i == 0) {
                check = 1;
            } else {
                check = 0;
            }
        }

        long tEnd = System.currentTimeMillis();

        return (tEnd-tStart);
    }
}
