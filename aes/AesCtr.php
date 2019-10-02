<?php

Class AesCtr extends Aes
{

    /**
     * @param plaintext khối đầu vào
     * @param password  dùng để tạo key
     * @param nBits     số bit dùng để tạo key (128, 192, or 256)
     * @return          chuỗi sau khi được mã hóa
     */
    public static function encrypt($plaintext, $password, $nBits)
    {
        if($plaintext==null || $password==null) {
            return null;
        }
        else {
            $blockSize = 16; // kích thước của khối đầu vào 128 bit = 16 byte (Nb = 4)
            if (!($nBits == 128 || $nBits == 192 || $nBits == 256)) return ''; // kích thước của key 128 bit|192 bit|256 bit (16 byte|24 byte|32 byte)
            $nBytes = $nBits / 8; // nBytes = 16 || 24 || 32
            $pwBytes = array();

            // chuyển qua bảng mã ASCII (ord)
            for ($i = 0; $i < $nBytes; $i++)
            {
                $pwBytes[$i] = ord(substr($password, $i, 1)) & 0xff;
            }

            $key = Aes::cipher($pwBytes, Aes::keyExpansion($pwBytes));

            $key = array_merge($key, array_slice($key, 0, $nBytes - 16));

            $counterBlock = array();
            $nonce = floor(microtime(true) * 1000); // timestamp: milliseconds since 1-Jan-1970
            $nonceMs = $nonce % 1000;
            $nonceSec = floor($nonce / 1000);
            $nonceRnd = floor(rand(0, 0xffff));

            for ($i = 0; $i < 2; $i++) $counterBlock[$i] = self::urs($nonceMs, $i * 8) & 0xff;
            for ($i = 0; $i < 2; $i++) $counterBlock[$i + 2] = self::urs($nonceRnd, $i * 8) & 0xff;
            for ($i = 0; $i < 4; $i++) $counterBlock[$i + 4] = self::urs($nonceSec, $i * 8) & 0xff;

            // chuyển sang text
            $ctrTxt = '';
            for ($i = 0; $i < 8; $i++) $ctrTxt .= chr($counterBlock[$i]);

            // tạo ra key cho mỗi vòng lặp
            $keySchedule = Aes::keyExpansion($key);
            $blockCount = ceil(strlen($plaintext) / $blockSize); // chia plaintext thành các khối mỗi khối 16 byte
            $ciphertxt = array();
            for ($b = 0; $b < $blockCount; $b++) 
            {

                for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c] = self::urs($b, $c * 8) & 0xff;
                for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c - 4] = self::urs($b / 0x100000000, $c * 8);

                $cipherCntr = Aes::cipher($counterBlock, $keySchedule);

                // block size is giảm ở khối cuối cùng
                $blockLength = $b < $blockCount - 1 ? $blockSize : (strlen($plaintext) - 1) % $blockSize + 1;
                $cipherByte = array();

                for ($i = 0; $i < $blockLength; $i++) // -- xor plaintext with ciphered --
                { 
                    $cipherByte[$i] = $cipherCntr[$i] ^ ord(substr($plaintext, $b * $blockSize + $i, 1));
                    $cipherByte[$i] = chr($cipherByte[$i]);
                }
                $ciphertxt[$b] = implode('', $cipherByte); //Nối phần tử mảng $cipherByte thành chuỗi
            }

            $ciphertext = $ctrTxt . implode('', $ciphertxt);
            $ciphertext = base64_encode($ciphertext);
            return $ciphertext;
        }
        
    }


    /**
     * @param ciphertext chuỗi dùng để giải mã
     * @param password   password dùng để tạo key
     * @param nBits      số bit dùng để tại key (128, 192, or 256)
     * @return           chuỗi sau khi được giải mã
     */
    public static function decrypt($ciphertext, $password, $nBits)
    {
        $blockSize = 16; // kích thước của khối ciphertext =  16 bytes hay 128 bits (Nb=4)
        if (!($nBits == 128 || $nBits == 192 || $nBits == 256)) return '';
        $ciphertext = base64_decode($ciphertext); //base64_decode: hàm giải mã

        $nBytes = $nBits / 8; // nBytes = 16 || 24 || 32
        $pwBytes = array();
        for ($i = 0; $i < $nBytes; $i++)
            $pwBytes[$i] = ord(substr($password, $i, 1)) & 0xff;
        $key = Aes::cipher($pwBytes, Aes::keyExpansion($pwBytes));
        $key = array_merge($key, array_slice($key, 0, $nBytes - 16)); // mở rộng khóa thành 16/24/32 bytes

        $counterBlock = array();
        $ctrTxt = substr($ciphertext, 0, 8);
        for ($i = 0; $i < 8; $i++) $counterBlock[$i] = ord(substr($ctrTxt, $i, 1)); // chuyển qua bảng mã ASCII (return number)

        // tạo key
        $keySchedule = Aes::keyExpansion($key);

        // tách bản mã thành các khối 16 bytes (bỏ qua 8 byte ban đầu)
        $nBlocks = ceil((strlen($ciphertext) - 8) / $blockSize);
        $ct = array();
        for ($b = 0; $b < $nBlocks; $b++) $ct[$b] = substr($ciphertext, 8 + $b * $blockSize, 16);
        $ciphertext = $ct;

        // plaintext sẽ được tạo ra theo từng khối
        $plaintxt = array();

        for ($b = 0; $b < $nBlocks; $b++) {
            // đặt counter ở 8 bytes cuối counter block
            for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c] = self::urs($b, $c * 8) & 0xff;
            for ($c = 0; $c < 4; $c++) $counterBlock[15 - $c - 4] = self::urs(($b + 1) / 0x100000000 - 1, $c * 8) & 0xff;

            $cipherCntr = Aes::cipher($counterBlock, $keySchedule);

            $plaintxtByte = array();
            for ($i = 0; $i < strlen($ciphertext[$b]); $i++) {
                // -- plaintext xor ciphered theo từng bytes
                $plaintxtByte[$i] = $cipherCntr[$i] ^ ord(substr($ciphertext[$b], $i, 1));
                $plaintxtByte[$i] = chr($plaintxtByte[$i]);

            }
            $plaintxt[$b] = implode('', $plaintxtByte);
        }

        $plaintext = implode('', $plaintxt);

        return $plaintext;
    }


    /*
     * Hàm dịch chuyển các bit sang bên phải
     *
     * @param a  là số được dịch chuyển (độ dài 32 bits)
     * @param b  số bit được dịch chuyển sang phải (0..31)
     */
    private static function urs($a, $b)
    {
        $a &= 0xffffffff;
        $b &= 0x1f;
        if ($a & 0x80000000 && $b > 0) { // nếu là bit trái nhất
            $a = ($a >> 1) & 0x7fffffff; //   dịch chuyển sang phải 1 bit
            $a = $a >> ($b - 1);
        } else {
            $a = ($a >> $b);
        }
        return $a;
    }

}