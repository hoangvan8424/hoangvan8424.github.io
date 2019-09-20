		AREA	RESET, DATA, READONLY
		DCD 0x20001000 	; stack pointer value when stack is empty
		DCD Start 	; reset vector
	
		AREA	HOANG, CODE, READONLY
		ENTRY 		;Khai bao diem vao chuong trinh

Start 
		MOV R2, #0 ; sum =0
		MOV R3, #1 ; i = 1
	
LOOP
		CMP R3, #9   ; N =5
		BGT STOP ; go to STOP if R3 > 5
		ADD R2, R3
		ADD R3, #1
		B	LOOP
STOP	B	STOP
	
		END ; ket thuc chuong trinh
