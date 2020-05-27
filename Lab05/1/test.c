#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <fcntl.h>
#include <unistd.h>
 
int8_t write_buf[1024]="42422\n";
int8_t read_buf[1024];
int main()
{
    int fd;
    fd = open("/dev/lab51", O_RDWR);
    if(fd<0) {
        printf("Can't open file\n");
        return 0;
    }
    write(fd, write_buf, strlen(write_buf)+1);
    read(fd, read_buf, 1024);
    printf("%s", read_buf);
    close(fd);
}
