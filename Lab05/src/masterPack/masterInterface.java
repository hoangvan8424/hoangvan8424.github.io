package masterPack;

import javacard.framework.Shareable;

public interface masterInterface extends Shareable
{
	public short getArray(byte[] array);
	public byte tinhDiem(byte diemToan, byte diemVan);
}
