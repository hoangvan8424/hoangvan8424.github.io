#include <linux/module.h>
#include <linux/init.h>
#include<linux/fs.h>
#include<linux/device.h>
#include<linux/cdev.h>
#include<linux/slab.h>
#include<linux/uaccess.h>
#include<linux/time.h>
#include <linux/timekeeping.h>
#include<linux/jiffies.h>

//#include <linux/ktime.h>

#define DRIVER_AUTHOR "Hoang Van Thai"
#define DRIVER_DESC   "Wall time and system uptime"
#define VERSION "3.0"
#define MEM_SIZE 1024

struct vchar_drv{
	dev_t dev_num;
	struct class *dev_class;
	struct device *dev;
}vchar_drv;

static struct cdev *example_cdev;
uint8_t *kernel_buffer;
unsigned open_cnt = 0;
unsigned long js, je;

int8_t *buf_tmp;
int32_t *kernel_buf1;
int32_t *kernel_buf2;
int8_t *kernel_buf3;

static int lab52_open(struct inode *inode, struct file *filp);
static int lab52_release(struct inode *inode, struct file *filp);
static ssize_t lab52_read(struct file *filp, char __user *user_buf, size_t len, loff_t * off);
static ssize_t lab52_write(struct file *filp, const char *user_buf, size_t len, loff_t * off);
 
static int select;
static struct file_operations fops =
{
	.owner          = THIS_MODULE,
	.read           = lab52_read,
	.write          = lab52_write,
	.open           = lab52_open,
	.release        = lab52_release,
};
 
static int lab52_open(struct inode *inode, struct file *filp)
{
	js = jiffies;   //lay so tick hien tai trong bien cua OS la jiffies
	open_cnt++;
	printk("Mo file %u lan\n", open_cnt);
	return 0;
}

static int lab52_release(struct inode *inode, struct file *filp)
{
    // System uptime
	struct timeval using_time;
	printk("Giai phong %u times\n", open_cnt);
	je = jiffies;                   //lay so tick hien tai - thoi diem dong file
	jiffies_to_timeval(je-js, &using_time); //tru de tinhs thoi gian

	//lay giay: tv_sec; micro giay: tv_usec
	printk("(System uptime) Driver duoc su dung luc %ld.%ld s\n", using_time.tv_sec, using_time.tv_usec/1000);
	return 0;
}
 
static ssize_t lab52_read(struct file *filp, char __user *user_buf, size_t len, loff_t *off)
{
	//lay time voi do chnh xac nano giay
	struct timespec64 kts;
	ktime_get_coarse_real_ts64(&kts);// = current_kernel_time64();//current_kernel_time();
	
	copy_to_user(user_buf, kernel_buffer, MEM_SIZE);
	printk("Doc file %u lan vao thoi diem %ld.%ld from 1 Jan 1970\n", open_cnt, kts.tv_sec, kts.tv_nsec/1000000);
	return MEM_SIZE;
}
static ssize_t lab52_write(struct file *filp, const char __user *user_buf, size_t len, loff_t *off)
{
    printk(KERN_INFO "len = %ld\n", len);
	if(len == 4) {
		copy_from_user(kernel_buf1, user_buf, len);

		copy_from_user(kernel_buf2, user_buf, len);

		copy_from_user(kernel_buf3, user_buf, len);
	}
	else {
		copy_from_user(buf_tmp, user_buf, len);
		if(*buf_tmp == '1') {
			select = 1;
		}
		if(*buf_tmp == '2') {
			select = 2;
		}
		if(*buf_tmp == '3') {
			select = 3;
		}
	}


	//lay walltime voi do chinh xac micro giay 
	struct timespec64 ktv;
	ktime_get_real_ts64(&ktv);

	copy_from_user(kernel_buffer, user_buf, len);
	printk("Ghi file %u lan, vao thoi diem %ld.%ld from 1 Jan 1970\n", open_cnt, ktv.tv_sec, ktv.tv_sec/1000);
	return len;
}
 

static int __init char_driver_init(void)
{
	/* cap phat dong device number */
    int ret = 0;
    vchar_drv.dev_num = 0;

	ret = alloc_chrdev_region(&vchar_drv.dev_num, 0, 1, "Lab 52");
    if(ret < 0) {
        printk("Can't allocate character driver\n");
		goto failed_register_devnum;
    }
	printk("Insert character driver successfully. major(%d), minor(%d)\n", MAJOR(vchar_drv.dev_num), MINOR(vchar_drv.dev_num));

	/* tao device file /dev/char_device */
	vchar_drv.dev_class = class_create(THIS_MODULE, "Lab05");
    if(IS_ERR(vchar_drv.dev_class)) {
		printk("Can't create class\n");
		goto failed_create_class;
	}

	device_create(vchar_drv.dev_class, NULL, vchar_drv.dev_num, NULL,"lab52");
    if(IS_ERR(vchar_drv.dev)) {
		printk("Can't create device file\n");
		goto failed_create_device;
	}

	/* tao kernel buffer */
	kernel_buffer = kmalloc(MEM_SIZE , GFP_KERNEL);

	/* lien ket cac ham entry point cua driver voi device file */
	example_cdev = cdev_alloc();
	cdev_init(example_cdev, &fops);
	cdev_add(example_cdev, vchar_drv.dev_num, 1);

	return 0;

failed_create_device:
	class_destroy(vchar_drv.dev_class);
failed_create_class:
	unregister_chrdev_region(vchar_drv.dev_num, 1);
failed_register_devnum:
	return ret;
}

void __exit char_driver_exit(void)
{
	cdev_del(example_cdev);
	kfree(kernel_buffer);
	device_destroy(vchar_drv.dev_class,vchar_drv.dev_num);
	class_destroy(vchar_drv.dev_class);
	unregister_chrdev_region(vchar_drv.dev_num, 1);
	printk("Remove character driver successfully.\n");
}

module_init(char_driver_init);
module_exit(char_driver_exit);

MODULE_LICENSE("GPL");
MODULE_AUTHOR(DRIVER_AUTHOR);
MODULE_DESCRIPTION(DRIVER_DESC);
MODULE_VERSION("2.4");
MODULE_SUPPORTED_DEVICE("testdevice");

