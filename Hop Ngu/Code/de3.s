; Tong cac so duong trong ma tran
; Tim uoc chung lon nhat cua mot chuoi so
		AREA RESET, DATA, READONLY
		EXPORT _VECTOR
_VECTOR
		DCD 0x20001000
		DCD RESET_HANDLE
		AREA MYDATA, DATA, READONLY
maTran	DCD -1,3,5
		DCD 2,4,-1
		DCD 0,-1,2

		AREA MYCODE, CODE, READONLY
		ENTRY
		
tinhTong	PROC
		LDR R4, [R0], #4
		CMP R4, #0
		BLT thoat
		BGT tong
		
tong
		ADD R1, R1, R4
		B thoat
thoat
		ADD R3, R3, #1
		CMP R3, #9
		BLE tinhTong
		BX LR
		ENDP
RESET_HANDLE
main	PROC
		LDR R0, =maTran
		MOV R1, #0 ; Tong cac so duong trong ma tran
		MOV R2, #0 ; UCLN
		MOV R3, #1 ; Bien dem
		BL tinhTong
		END
		