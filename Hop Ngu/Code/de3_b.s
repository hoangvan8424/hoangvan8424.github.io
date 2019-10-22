; Tong cac so duong trong ma tran
; Tim uoc chung lon nhat cua mot chuoi so
		AREA RESET, DATA, READONLY
		EXPORT _VECTOR
_VECTOR
		DCD 0x20001000
		DCD RESET_HANDLE
		AREA MYDATA, DATA, READONLY

chuoiSo DCD 4,8,6,3,7

		AREA MYCODE, CODE, READONLY
		ENTRY
		
RESET_HANDLE
main	PROC
		MOV R8, #0
		MOV R9, #0
		LDR R0, =chuoiSo

		LDR R1, [R0]
lap
		LDR R2, [R0, #4]!
		CMP R1, R2
		BLT nhoHon
		MOV R3, R2
		B chia
nhoHon
		MOV R3, R1
chia	
		UDIV R4, R1, R3
		UDIV R5, R2, R3
		MLS R6, R4, R3, R1
		MLS R7, R5, R3, R2
		CMP R6, R7
		BEQ bang
		BNE khongBang
bang
		CMP R6, #0
		BEQ ucln
		BNE khongBang
khongBang
		SUB R3, #1
		CMP R3, #1
		BEQ ucln
		BNE chia
ucln
		MOV R9, R3
		ADD R8, #1
		CMP R8, #4
		BEQ thoat
		BNE lap
thoat
		NOP
		ENDP
		END
		