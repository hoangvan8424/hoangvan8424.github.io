#include<stdio.h>
#include<string.h>
int maHoa(char message[], int key) {
    for(int i = 0; message[i] != '\0'; ++i){
		char ch = message[i];

		if(ch >= 'a' && ch <= 'z'){
			ch = ch + key;

			if(ch > 'z'){
				ch = ch - 'z' + 'a' - 1;
			}
			message[i] = ch;
		}
		else if(ch >= 'A' && ch <= 'Z'){
			ch = ch + key;

			if(ch > 'Z'){
				ch = ch - 'Z' + 'A' - 1;
			}

			message[i] = ch;
		}
	}
	return message;
}
int giaiMa(char message[], int key) {
    for(int i = 0;  message[i] != '\0'; ++i){
		char ch = message[i];

		if(ch >= 'a' && ch <= 'z'){
			ch = ch - key;

			if(ch < 'a'){
				ch = ch + 'z' - 'a' + 1;
			}

			message[i] = ch;
		}
		else if(ch >= 'A' && ch <= 'Z'){
			ch = ch - key;

			if(ch < 'A'){
				ch = ch + 'Z' - 'A' + 1;
			}

			message[i] = ch;
		}
	}
	return message;
}
int main()
{
	char message[100], ch;
	int i, key, len;
	printf("Enter a message to encrypt: ");
	gets(message);
	printf("Enter key: ");
	scanf("%d", &key);

// Ma hoa
	printf("\nEncrypted message: %s", strupr(maHoa(message, key)));
// Giai ma

	printf("\nDecrypted message: %s", strlwr(giaiMa(message, key)));


	return 0;
}
