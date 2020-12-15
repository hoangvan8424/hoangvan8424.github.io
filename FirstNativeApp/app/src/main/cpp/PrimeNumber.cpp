//
// Created by Thai on 15/12/2020.
//

#include "PrimeNumber.h"
PrimeNumber::PrimeNumber(int num) {
    PrimeNumber::number = num;
}

bool PrimeNumber::isPrime() {
    bool isPrime = true;
    timeExecute = 0;
    clock_t start = clock();

    for (int i = 2; i <= number / 2; i++) {
        if (number % i == 0) {
            isPrime = false;
        } else {
            isPrime = true;
        }
    }
    clock_t end = clock();

    timeExecute = (double) (end-start)/CLOCKS_PER_SEC;
    return isPrime;
}

double PrimeNumber::getTimeExecute() {
    return timeExecute;
}