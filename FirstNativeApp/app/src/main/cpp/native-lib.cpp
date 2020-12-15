#include <jni.h>
#include <string>
#include <sys/time.h>
#include "PrimeNumber.h"
extern "C" JNIEXPORT jboolean JNICALL
Java_com_example_firstnativeapp_MainActivity_isPrime(JNIEnv* env, jobject, jint number) {
    PrimeNumber primeNumber(number);
    return primeNumber.isPrime();
}

extern "C" JNIEXPORT jfloat JNICALL
Java_com_example_firstnativeapp_MainActivity_getTimeExecute(JNIEnv* env, jobject, jint number) {
    PrimeNumber primeNumber(number);
    primeNumber.isPrime();
    return primeNumber.getTimeExecute();
}