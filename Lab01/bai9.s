;Tim UCLN 2 so trc, luu o R1
;BCNN = (A x B) chia UCLN
;Ket qua BCNN luu o R7

;Khai bao doan du lieu
		AREA	RESET, DATA, READONLY
		DCD 0x20001000 ; stack pointer value when stack is empty
		DCD Start ; reset vector

bienA 	DCD	12
bienB 	DCD 8

;Khai bao doan ma lenh
		AREA	HOANG, CODE, READONLY
		ENTRY ;Khai bao diem vao chuong trinh
		EXPORT Start

Start
;Bat dau doan code (Diem vao chuong trinh)
		LDR R1, bienA
		LDR R2, bienB
		MOV R3, #0 ; bien temp
	
TimUCLN 	
		B	tinhPhanDu
tiepTuc
		MOV R3, R1   ; gan temp = phan du
		MOV R1, R2
		MOV R2, R3
		CMP R2, #0
		BNE TimUCLN	
		B TinhBCNN
	
tinhPhanDu
		SUB R1, R2
		CMP R1, R2
		BHS tinhPhanDu
		B	tiepTuc

TinhBCNN
		LDR R4, bienA   ; lay lai gia tri bien A
		LDR R5, bienB	; lay lai gia tri bien B
		MUL R6, R4, R5	; R6 = R4 x R5
		SDIV R7, R6, R1	; R7 = R6/R1
	
STOP	B	STOP
	
		END ; ket thuc chuong trinh
