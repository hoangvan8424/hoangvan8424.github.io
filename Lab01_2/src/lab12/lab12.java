package lab12;

import javacard.framework.*;

public class lab12 extends Applet
{
	private static final byte INS_INSERT = (byte)0x00;
	private static final byte INS_PRINT = (byte)0x01;
	
	private static byte[] id, name, dateOfBirth;
	private static short[] position;
	
	short i, j;
	short idLen, nameLen, dobLen, dataLen;
	
	public static void install(byte[] bArray, short bOffset, byte bLength) 
	{
		new lab12().register(bArray, (short) (bOffset + 1), bArray[bOffset]);
		id = new byte[5];
		name = new byte[50];
		dateOfBirth = new byte[4];
		position = new short[2];
	}

	public void process(APDU apdu)
	{
		if (selectingApplet())
		{
			return;
		}

		apdu.setIncomingAndReceive();
		byte[] buf = apdu.getBuffer();
		dataLen = (short)(buf[ISO7816.OFFSET_LC]&0xff);
		
		switch (buf[ISO7816.OFFSET_INS])
		{
		case INS_INSERT:
			j = (short)0;
			short index = (short)(ISO7816.OFFSET_CDATA);
			
			for(i=index; i<(short)(index + dataLen + 1); i++) {
				if(buf[i] == (byte)0x5F) {
					position[j] = i;
					j++;
				}
			}
			
			idLen = (short)(position[0] - index);
			nameLen = (short)(position[1] - position[0] - 1);
			dobLen = (short)(dataLen + index - position[1] - 1);
			
			j = (short)0;
			for(i=index; i<position[0]; i++) {
				id[j] = buf[i];
				j++;
			}
			
			j= (short)0;
			for(i = (short)(position[0]+1);i<position[1];i++) {
				name[j] = buf[i];
				j++;
			}
			
			j=(short)0;
			for(i = (short)(position[1]+1);i<=(short)(index+dataLen);i++) {
				dateOfBirth[j] = buf[i];
				j++;
			}
			
			break;
		case INS_PRINT:
			short totalLen = (short)(idLen + nameLen + dobLen);
			apdu.setOutgoing();
			apdu.setOutgoingLength(totalLen);
			
			apdu.sendBytesLong(id, (short)0, idLen);
			apdu.sendBytesLong(name, (short)0, nameLen);
			apdu.sendBytesLong(dateOfBirth, (short)0, dobLen);
			break;
			
		default:
			ISOException.throwIt(ISO7816.SW_INS_NOT_SUPPORTED);
		}
	}

}
