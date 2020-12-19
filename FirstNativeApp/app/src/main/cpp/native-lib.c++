#include <jni.h>
#include <string.h>
#include <time.h>
#include <math.h>

extern "C"
JNIEXPORT jint JNICALL
Java_com_example_firstnativeapp_NativeLibrary_checkPrime(JNIEnv *env, jobject thiz,
                                                             jlong number) {
    jint i;
    jint check = 0;
    clock_t t_start, t_end;

    t_start = clock()/(CLOCKS_PER_SEC/1000);

    for (i = 2; i <= number / 2; i++) {
        if (number % i == 0) {
            check = 1;
        } else {
            check = 0;
        }
    }
    t_end = clock()/(CLOCKS_PER_SEC/1000);

    return t_end-t_start;
}

extern "C"
JNIEXPORT jint JNICALL
Java_com_example_firstnativeapp_NativeLibrary_squareArea(JNIEnv *env, jobject thiz,
        jlong number) {
    clock_t t_start, t_end;
    long acreage = 0;

    t_start = clock()/(CLOCKS_PER_SEC/1000);
    acreage = number * number;
    t_end = clock()/(CLOCKS_PER_SEC/1000);
    return t_end-t_start;
}