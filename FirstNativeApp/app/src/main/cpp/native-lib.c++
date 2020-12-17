#include <jni.h>
#include <string.h>
#include <time.h>
#include <math.h>

extern "C" JNIEXPORT jint JNICALL
Java_com_example_firstnativeapp_MainActivity_getTimeExecute(JNIEnv* env, jobject, jlong number) {
    jint i,j;
    jint check = 0;
    clock_t t_start, t_end;
    float timeExecute = 0;

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