; dem so phan tu am, duong trong ma tran
; tong cac so chia het cho 6 trong ma tran
		AREA RESET, DATA, READONLY
		DCD 0x20001000
		DCD RESET_HANDLE
		
		AREA MYDATA, DATA, READONLY
maTran	DCD -1,2,0
		DCD 6,12,-5
		DCD -3,6,2
		
		AREA MYCODE, CODE, READONLY
		ENTRY

demPhanTu	PROC
		LDR R5, [R0], #4
		CMP R5, #0
		BLT soAm
		BGT soDuong
		BEQ thoat
soAm
		ADD R1, #1
		B thoat
soDuong
		ADD R2, #1
		B thoat
thoat
		ADD R4, #1
		CMP R4, #9
		BLE demPhanTu
		BX LR
		ENDP
tongChiaHet6	PROC
		LDR R5, [R0], #4
		MOV R6, #6
chiaDu
		UDIV R7, R5, R6
		MLS R8, R7, R6, R5
		CMP R8, #0
		BEQ xuLy
		B thoat2
xuLy
		ADD R3, R5
thoat2
		ADD R4, #1
		CMP R4, #9
		BLE tongChiaHet6
		BX LR
		
		ENDP
		
RESET_HANDLE
main	PROC
		LDR R0, =maTran
		MOV R1, #0 ; so phan tu am
		MOV R2, #0 ; so phan tu duong
		MOV R3, #0 ; tong cac so chia het cho 6
		MOV R4, #1 ; bien dem
		BL demPhanTu
		LDR R0, =maTran
		MOV R4, #1
		BL tongChiaHet6
		NOP
		ENDP
		END