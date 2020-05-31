/*
 * Kernel API lab
 *
 * sched-spin.c: Sleeping in atomic context
 */

#include <linux/module.h>
#include <linux/init.h>
#include <linux/kernel.h>
#include <linux/sched.h>

MODULE_DESCRIPTION("Sleeping in atomic context");
MODULE_AUTHOR("Nhom 1");
MODULE_LICENSE("GPL");

static int sched_spin_init(void)
{
	printk("\nHello from Sleeping in atomic context\n");
	spinlock_t lock; // khai bao spinlock

	spin_lock_init(&lock); // khoi tạo spinlock

	/* Use spin_lock to aquire the lock */
	spin_lock(&lock);

	set_current_state(TASK_INTERRUPTIBLE);
	/* Try to sleep for 5 seconds. */
	schedule_timeout(5 * HZ);

	/* TODO 0: Use spin_unlock to release the lock */
	spin_unlock(&lock);

	printk("\nUnlock process\n");

	return 0;
}

static void sched_spin_exit(void)
{
	printk("\nGoodbye from sleeping in atomic context");
}

module_init(sched_spin_init);
module_exit(sched_spin_exit);
