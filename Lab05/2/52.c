#include <linux/module.h>
#include <linux/init.h>
#include<linux/fs.h>
#include<linux/device.h>
#include<linux/cdev.h>
#include<linux/slab.h>
#include<linux/uaccess.h>
#include<linux/time.h>
#include<linux/jiffies.h>

#define DRIVER_AUTHOR "Hoang Van Thai"
#define DRIVER_DESC   "Thoi gian tuyet doi"
#define MEM_SIZE 1024

dev_t dev_num = 0;
static struct class * device_class;
static struct cdev *example_cdev;
uint8_t *kernel_buffer;
unsigned open_cnt = 0;
unsigned long js, je;

static int __init char_driver_init(void)
{

}

static void __exit char_driver_exit(void)
{
    
}

















MODULE_LICENSE("GPL");
MODULE_AUTHOR(DRIVER_AUTHOR);
MODULE_DESCRIPTION(DRIVER_DESC);
MODULE_VERSION("2.4");
MODULE_SUPPORTED_DEVICE("timmer");
