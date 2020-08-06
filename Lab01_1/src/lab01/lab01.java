package lab01;

import javacard.framework.*;

public class lab01 extends Applet
{
	private static byte[] name = {'H', 'O', 'A', 'N', 'G', ' ', 'V', 'A', 'N', ' ', 'T', 'H', 'A', 'I'};
	private static byte[] birthday = {18, 11, 98};

	public static void install(byte[] bArray, short bOffset, byte bLength) 
	{
		new lab01().register(bArray, (short) (bOffset + 1), bArray[bOffset]);
	}

	public void process(APDU apdu)
	{
		if (selectingApplet())
		{
			return;
		}

		byte[] buf = apdu.getBuffer();
		apdu.setIncomingAndReceive(); // ghi du lieu vao bo dem
		switch (buf[ISO7816.OFFSET_INS])
		{
		case (byte)0x00:
			
			short nameLen = (short)name.length;
			short birthdayLen = (short)birthday.length;
			short totalLen = (short)(nameLen+birthdayLen);
			
			apdu.setOutgoing(); //phan hoi
			apdu.setOutgoingLength(totalLen); // kich thuoc du lieu phan hoi
			
			Util.arrayCopy(name, (short)0, buf, (short)0, nameLen);
			apdu.sendBytes((short)0, nameLen);
			
			Util.arrayCopy(birthday, (short)0, buf, (short)0, birthdayLen);
			apdu.sendBytes((short)0, birthdayLen);
			
			
			break;
		default:
			ISOException.throwIt(ISO7816.SW_INS_NOT_SUPPORTED);
		}
	}

}
