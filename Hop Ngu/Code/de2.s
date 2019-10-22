; Tong cac so chia het cho 5 tren duong cheo chinh
; Dem so phan tu la so chan tren duong cheo phu

		AREA RESET, DATA, READONLY
		DCD 0x20001000
		DCD start
		
		AREA MYDATA, DATA, READONLY
maTran	DCD	5,2,5
		DCD	4,1,6
		DCD	2,0,10
		AREA MYCODE, CODE, READONLY
		
tong	PROC
		LDR R4, [R0], #16	
		MOV R7, #5
		UDIV R5, R4, R7
		MLS R6, R5, R7, R4
		CMP R6, #0
		BNE thoat
		B cong
cong	
		ADD R1, R1, R4
		B thoat
		
thoat
		ADD R3, R3, #1
		CMP R3, #3
		BLE tong
		BX LR
		ENDP
		
demSoChan		PROC

		LDR R4, [R0, #8]!
		MOV R7, #2
		UDIV R5, R4, R7
		MLS R6, R5, R7, R4
		CMP R6, #0
		BNE thoat2
		B dem
dem	
		ADD R2, R2, #1
		B thoat2
		

thoat2
		ADD R3, R3, #1
		CMP R3, #3
		BLE demSoChan
		BX LR
		ENDP
start
main	PROC
		LDR R0, =maTran
		MOV R1, #0 ; tong cac so chia het cho 5
		MOV R2, #0 ; so phan tu la so chan tren duong cheo phu
		MOV R3, #1 ; bien dem
		MOV R8, #8
		BL tong
		
		LDR R0, =maTran
		MOV R3, #1
		BL demSoChan
		NOP
		ENDP
		END
		