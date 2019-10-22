; tong cac so chia het cho 8 trong day so
; tong cac so nguyen to trong chuoi so
AREA RESET, DATA, READONLY
		DCD 0x20001000
		DCD RESET_HANDLE
		
		AREA MYDATA, DATA, READONLY
chuoi	DCD 16,8,5,4,7
		
		AREA MYCODE, CODE, READONLY
		ENTRY
		
tongChiaHet8	PROC
		MOV R4, #8
lap		
		LDR R5, [R0], #4
		UDIV R6, R5, R4
		MLS R7, R6, R4, R5
		CMP R7, #0
		BEQ tong1
		BNE thoat1
tong1	
		ADD R1, R5
		B thoat1
thoat1
		ADD R3, #1
		CMP R3, #5
		BNE lap
		BX LR
		ENDP
tongSoNT	PROC
		LDR R4, [R0], #4
		MOV R5, #1 ; bien dem
		
lap2
		ADD R5, #1
		CMP R5, R4
		BLT chia
		BEQ xuLy
		BGT thoat2
xuLy
		ADD R2, R4
		B thoat2
chia
		UDIV R6, R4, R5
		MLS R7, R6, R5, R4
		CMP R7, #0
		BNE lap2
		B thoat2
		
thoat2
		ADD R3, #1
		CMP R3, #5
		BLE tongSoNT
		BX LR
		ENDP
RESET_HANDLE
main	PROC
		LDR R0, =chuoi
		MOV R1, #0 ; tong cac so chia het cho 8
		MOV R2, #0 ; tong cac so nguyen to
		MOV R3, #1 ; bien dem
		BL tongChiaHet8
		LDR R0, =chuoi
		MOV R3, #1
		BL tongSoNT
		NOP
		ENDP
		END