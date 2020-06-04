#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <unistd.h>
#include <string.h>
#include <sys/ioctl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <sys/select.h>
#include <sys/time.h>
 
#define BUFFER_LENGTH 256

int32_t write_buf;
int32_t read_buf1[BUFFER_LENGTH];
int32_t read_buf2[BUFFER_LENGTH];
int8_t read_buf3[BUFFER_LENGTH];

int main(int argc, char** argv)
{
    int ret, fd;
    char select;
    int i;
    int bin = 0, oct = 0, hex = 0;

    fd = open("/dev/lab52", O_RDWR);
    if(fd < 0) {
		printf("Can not open the device file\n");
		return 0;
    }
    printf("Open the device file success\n");
    
    while (1)
    {
        printf("-----------------------SELECT-----------------------\n");
        printf("1. Lay thoi gian tuyet doi chinh xac den micro giay\n");
        printf("2. Lay thoi gian tuyet doi chinh xac den nano giay\n");
        printf("3. Lay thoi gian tuong doi\n");
        printf("4. Ket thuc chuong trinh\n");
        printf("\nNhap lua chon: ");
        scanf(" %c", &select);

        switch (select)
        {
                
            case '2':
                printf("Nhap so he 10: ");
                scanf("%d", &write_buf);
                write(fd, &write_buf, sizeof(write_buf));
                break;
            case '3':
                write(fd, &select, sizeof(select));
                bin = read(fd, read_buf2, sizeof(read_buf2));
                printf("10 -> 2: ");
                for(i = 0; i<bin;i++) {
                    printf("%d", read_buf2[i]);
                }
                printf("\n");
                break;
            case '4': 
                write(fd, &select, sizeof(select));
                oct = read(fd, read_buf8, sizeof(read_buf8));
                printf("10 -> 8: ");
                for(i=0;i<oct;i++) {
                    printf("%d", read_buf8[i]);
                }
                printf("\n");
                break;
            case '5': 
                close(fd);
                exit(1);
                break;
        }
    }
    close(fd);
    printf("End of the program\n");
    return 0;
}    