package lab06;

import javacard.framework.*;
import javacard.security.*;
import javacardx.crypto.*;

public class lab06 extends Applet
{
	private MessageDigest sha;
	private byte[] m1, m2, m3;

	private lab06()
	{
		sha = MessageDigest.getInstance(MessageDigest.ALG_SHA, false);
		m1 = new byte[]{0x01, 0x02};
		m2 = new byte[] {0x03, 0x04, 0x05};
		m3 = new byte[] {0x06, 0x07};
	}
	public static void install(byte[] bArray, short bOffset, byte bLength) 
	{
		new lab06().register(bArray, (short) (bOffset + 1), bArray[bOffset]);
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
		case (byte)0x00:
			sha.update(m1, (short)0, (short)m1.length);
			sha.update(m2, (short)0, (short)m2.length);
			short ret = sha.doFinal(m3, (short)0, (short)m3.length, buf, (short)0);
			break;
		default:
			ISOException.throwIt(ISO7816.SW_INS_NOT_SUPPORTED);
		}
	}

}
