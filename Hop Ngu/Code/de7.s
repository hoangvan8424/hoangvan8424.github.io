; gia tri lon nhat, nho nhat cua so chan trong chuoi so
; tong cac so nguyen to trong chuoi so
		AREA RESET, DATA, READONLY
		DCD 0x20001000
		DCD RESET_HANDLE
		
		AREA MYDATA, DATA, READONLY
chuoi	DCD 3,2,5,7,10,6
		AREA MYCODE, CODE, READONLY
		ENTRY
max_min	PROC
		LDR R5, [R0], #4
chia
		MOV R6, #2
		UDIV R7, R5, R6
		MLS R8, R7, R6, R5
		CMP R8, #0
		BEQ xuLy
		B thoat
xuLy
		CMP R9, #0
		BEQ gan
		CMP R5, R1
		BGT max
soSanh
		CMP R5, R2
		BLT min
		B thoat
max
		MOV R1, R5
		B soSanh
min
		MOV R2, R5
		B thoat
gan
		MOV R1, R5
		MOV R2, R5
		ADD R9, #1
thoat
		ADD R4, #1
		CMP R4, #6
		BLE max_min
		BX LR
		ENDP
		
sumSNT	PROC
		LDR R5, [R0], #4
		MOV R6, #1
lap
		ADD R6, #1
		CMP R6, R5
		BLT chiaDu
		BGT thoat2
		BEQ cong
chiaDu
		UDIV R7, R5, R6
		MLS R8, R7, R6, R5
		CMP R8, #0
		BEQ thoat2
		B lap
cong
		ADD R3, R5
		B thoat2
		
thoat2
		ADD R4, #1
		CMP R4, #6
		BLE sumSNT
		BX LR
		ENDP

RESET_HANDLE
main	PROC
		LDR R0, =chuoi
		MOV R1, #0 ; max
		MOV R2, #0 ; min
		MOV R3, #0 ; tong so nguyen to
		MOV R4, #1 ; bien dem
		MOV R9, #0 ; bien check
		BL max_min
		LDR R0, =chuoi
		MOV R4, #1 ; bien dem
		BL sumSNT
		NOP
		ENDP
		END