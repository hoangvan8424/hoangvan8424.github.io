; tong cac so nguyen to tren duong cheo chinh
; dem so nguyen to tren duong cheo chinh
		AREA RESET, DATA, READONLY
		DCD 0x20001000
		DCD START
		
		AREA MYDATA, DATA, READONLY
		
maTran	DCD	1,2,3
		DCD 4,4,2
		DCD 0,1,2
		
		AREA MYCODE, CODE, READONLY
		
tong	PROC
		LDR R4, [R0], #16
		ADD R1, R1, R4
		ADD R3, R3, #1
		CMP R3, #3
		BLE tong
		BX LR
		ENDP
		
soNT	PROC
		LDR R4, [R0], #16
		MOV R5, #1 ; bien dem vong lap
lap
		ADD R5, R5, #1 
		CMP R5, R4
		BLT chiaDu ; R5<R4 nhay den chiaDu
		BEQ xuLy
		BGT thoat

xuLy	ADD R2, R2, #1
		B thoat
		
chiaDu
		UDIV R6, R4, R5 ; chia
		MLS R7, R6, R5, R4 ; so du
		CMP R7, #0
		BNE lap
		B thoat
		
thoat
		ADD R3, R3, #1
		CMP R3, #3
		BLE soNT
		BX LR
		ENDP
		
		
START
main	PROC
		LDR R0, =maTran
		MOV R1, #0 ; tong so nguyen to
		MOV R2, #0 ; dem so nguyen to
		MOV R3, #1 ; bien dem chung
		BL tong
		LDR R0, =maTran
		MOV R3, #1
		BL soNT
		NOP
		ENDP
		END
		
		
		