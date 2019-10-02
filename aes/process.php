<?php
	include('Aes.php');
    include('AesCtr.php');

	if(isset($_POST['key']) and isset($_POST['plaintext'])) {
		$key = $_POST['key'];
		$plaintext = $_POST['plaintext'];
		$bit = $_POST['bit'];
		if($key!=null and $plaintext!=null) {
            $timeStart = microtime(true);
            $encrypt = AesCtr::encrypt($plaintext, $key, $bit);
            $time = round((microtime(true) - $timeStart)*1000, 4);
            echo $encrypt;
            echo '                       Time = '.$time.'ms';
        }
		else {
		    echo 'Please enter full information!';
        }
	}

	if(isset($_POST['keydecry']) and isset($_POST['ciphertext'])) {
		$key = $_POST['keydecry'];
		$ciphertext = $_POST['ciphertext'];
		$bit = $_POST['bit'];
		if($ciphertext!=null and $key!=null) {

            $timeStart = microtime(true);
            $decrypt = AesCtr::decrypt($ciphertext, $key, $bit);
            $time = round((microtime(true) - $timeStart)*1000, 4);

            echo $decrypt;
            echo '                       Time = '.$time.'ms';
        }
		else {
            echo 'Please enter full information!';
        }
	}
?>