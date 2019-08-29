#include <stdio.h>
#include <conio.h>
#include <string.h>
#include <stdlib.h>
#define SIZE 100
int Mahoa_Ceaser(char *Str_Nguon,char *Str_Mahoa,int len,int key);
int Giaima_Ceaser(char Str_Nguon[],char Str_Giaima[],int len,int key);
int khoitao(char Str[]);
void main()
{
    char Str[SIZE], Str_Mahoa[SIZE], Str_Giaima[SIZE];
    int len, key;

    printf("Nhap chuoi: ");
    gets(Str);

    printf("Nhap so buoc nhay: ");
    scanf("%d",&key);

    len=strlen(Str);

    khoitao(Str_Mahoa);
    khoitao(Str_Giaima);

    Mahoa_Ceaser(Str, Str_Mahoa, len, key);
    Giaima_Ceaser(Str_Mahoa, Str_Giaima, len, key);
    printf("Chuoi %s duoc ma hoa thanh: %s\n", Str, Str_Mahoa);
    printf("Chuoi %s duoc giai ma thanh: %s\n", Str_Mahoa, Str_Giaima);
    getch();
}
int khoitao(char Str[])
{
    for(int i=0;i<SIZE;i++)
        Str[i]=0;
    return 0;
}
int Mahoa_Ceaser(char Str_Nguon[], char Str_Mahoa[], int len, int key)
{
    for (int i=0;i<len;i++) {
        char c = Str_Nguon[i];
        if(c>='A' && c<='Z')
            Str_Mahoa[i]=(Str_Nguon[i]-'A'+key)%26 + 'A';
        else if(c>='a' && c<='z')
            Str_Mahoa[i]=(Str_Nguon[i]-'a'+key)%26 + 'a';
        else Str_Mahoa[i] = Str_Nguon[i];
    }
    return 0;
}

int Giaima_Ceaser(char Str_Nguon[],char Str_Giaima[],int len,int key)
{
    for (int i=0;i<len;i++){
        char c = Str_Nguon[i];
        if(c >= 'A' && c <= 'Z')
            Str_Giaima[i]=(abs(Str_Nguon[i]-'A'-key))%26 +'A';
        else if(c>='a' && c<='z')
            Str_Giaima[i]=(abs(Str_Nguon[i]-'a'-key))%26 + 'a';
        else Str_Giaima[i]=Str_Nguon[i];
    }
    return 0;
}
