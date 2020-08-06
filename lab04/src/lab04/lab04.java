package lab04;

import javacard.framework.*;

public class lab04 extends Applet
{
	private static final byte INS_INSERT = (byte)0x00;
	private static final byte INS_PRINT = (byte)0x01;
	private static final byte INS_EDIT = (byte)0x03;
	private static final byte INS_DEL = (byte)0x04;
	
	private static byte[] diemThi, sinhVien;
	private static byte soMon = (byte)0x09;
	
	short index, i, j, dataLen, position;

	public static void install(byte[] bArray, short bOffset, byte bLength) 
	{
		new lab04();
	}

	private lab04()
	{
		diemThi = new byte[(short)(2*soMon)];
		sinhVien = new byte[]{'S', 'V', '0', '1'};
		register();
	}
	
	public void process(APDU apdu)
	{
		if (selectingApplet())
		{
			return;
		}
		
		apdu.setIncomingAndReceive();

		byte[] buf = apdu.getBuffer();
		switch (buf[ISO7816.OFFSET_INS])
		{
		case INS_INSERT:
			index = (short)ISO7816.OFFSET_CDATA;
			j = (short)0;
			dataLen = (short)(buf[ISO7816.OFFSET_LC]);
			
			
			for(i=index;i<(short)(index+dataLen);i=(short)(i+2)) {
				diemThi[j] = buf[i];
				diemThi[(short)(j+1)] = buf[(short)(i+1)];
				j = (short)(j+2);
			}
			apdu.setOutgoing();
			apdu.setOutgoingLength(dataLen);
			apdu.sendBytesLong(diemThi, (short)0, (short)(dataLen));
			break;
		case INS_PRINT:
			apdu.setOutgoing();
			apdu.setOutgoingLength(dataLen);
			apdu.sendBytesLong(diemThi, (short)0, dataLen);
			break;
		case INS_EDIT:
			j = (short)0;
			
			for(i=0;i<dataLen;i = (short)(i+2)) {
				if(diemThi[i] == buf[ISO7816.OFFSET_CDATA]) {
					diemThi[(short)(i+1)] = buf[(short)(ISO7816.OFFSET_CDATA+1)];
				}
			}
			apdu.setOutgoing();
			apdu.setOutgoingLength(dataLen);
			apdu.sendBytesLong(diemThi, (short)0, dataLen);
			break;
		case INS_DEL:
			for(i=0;i<dataLen;i = (short)(i+2)) {
				if(diemThi[i] == buf[ISO7816.OFFSET_CDATA]) {
					position = i;
					break;
				}
			}
			
			for(i=position;i<dataLen;i++) {
				if(i==(short)(dataLen-2)) {
					break;
				}
				else {
					diemThi[i] = diemThi[(short)(i+2)];
				}
				
			}
			dataLen = (short)(dataLen-2);
			apdu.setOutgoing();
			apdu.setOutgoingLength((short)dataLen);
			apdu.sendBytesLong(diemThi, (short)0, (short)dataLen);
				
			break;
		default:
			ISOException.throwIt(ISO7816.SW_INS_NOT_SUPPORTED);
		}
	}

}
