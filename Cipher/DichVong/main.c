#include <stdio.h>
#include <conio.h>
#include <string.h>
char *Proccess(char *input, int k, int method){
    char *temp = new char[1000];
    strcpy(temp , input);
    for (int i=0; i<strlen(temp); i++){
        int x = (int)temp[i];
        int y = (method==0)?(x+k%26):(x-k%26);
        int sp;
        if (x>64 && x<91)
            sp=0;
        else if (x>96 && x<123)
            sp=32;
        else {
            y=x;
            continue;
        }
        if (y>90+sp) y-=26;
        else if (y<65+sp) y+=26;
        temp[i] = (char)y;
    }
    return temp;
}
char *Encrypt(char *input, int k){
    return Proccess(input,k,0);
}
char *Decrypt(char *input, int k){
    return Proccess(input,k,1);
}

main(){
    int k=1;
    char str[]="XYZ xyz ABC abc";
    printf("\n%s -> %s -> %s\n",str,Encrypt(str,k),Decrypt(Encrypt(str,k),k));
    getch();
}
