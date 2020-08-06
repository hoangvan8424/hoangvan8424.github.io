package lab03_Transaction;

import javacard.framework.*;

public class Applet1 extends Applet
{
	final static byte INS_TRANSACTION 	= (byte)0x00;
	final static byte INS_SEND			= (byte)0x01;
	
	public static byte[] buffer1, buffer2;

	public static void install(byte[] bArray, short bOffset, byte bLength) 
	{
		new Applet1().register(bArray, (short) (bOffset + 1), bArray[bOffset]);
		buffer1 = new byte[32];
		buffer2 = new byte[32];
		for(short i = 0; i < 32; i++) {
			buffer1[i] =  (byte)i;
		}
	}

	public void process(APDU apdu)
	{
		if (selectingApplet())
		{
			return;
		}

		byte[] buf = apdu.getBuffer();
		apdu.setIncomingAndReceive();
		
		switch (buf[ISO7816.OFFSET_INS])
		{
		case INS_TRANSACTION:
			JCSystem.beginTransaction();
			for(short i = 0; i < 32; i++) {
				buffer2[i] = buffer1[i];
				if(i==(short)5) {
					JCSystem.abortTransaction();
					JCSystem.beginTransaction();
				}
			}
			JCSystem.commitTransaction();
			break;
		case INS_SEND:
			apdu.setOutgoing();
			apdu.setOutgoingLength((short)32);
			apdu.sendBytesLong(buffer2, (short)0, (short)32);
			break;
		default:
			ISOException.throwIt(ISO7816.SW_INS_NOT_SUPPORTED);
		}
	}

}
