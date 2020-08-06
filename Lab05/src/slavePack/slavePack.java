package slavePack;

import javacard.framework.*;
import masterPack.masterInterface;
public class slavePack extends Applet
{
	final static byte[] serverAID = new byte[]{0x11, 0x22, 0x33, 0x44, 0x55, 0x11, 0x00};
	
	public static void install(byte[] bArray, short bOffset, byte bLength) 
	{
		new slavePack().register(bArray, (short) (bOffset + 1), bArray[bOffset]);
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
			AID masterAID = JCSystem.lookupAID(serverAID, (short)0, (byte)serverAID.length);
			masterInterface sio = (masterInterface)(JCSystem.getAppletShareableInterfaceObject(masterAID, (byte)0x00));
			
			byte diemToan = (byte)0x08;
			byte diemVan = (byte)0x09;
			byte diemTB = sio.tinhDiem(diemToan, diemVan);
			buf[0] = diemTB;
			apdu.setOutgoingAndSend((short)0, (short)(1));
			break;
		default:
			ISOException.throwIt(ISO7816.SW_INS_NOT_SUPPORTED);
		}
	}

}
