ifneq ($(KERNELRELEASE),)
   obj-m := sema.o
else

KDIR = /lib/modules/`uname -r`/build

all:
	make -C $(KDIR) M=`pwd`
endif
clean:
	make -C $(KDIR) M=`pwd` clean
