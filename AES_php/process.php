<?php
	include('Aes.php'); // AES PHP implementation
    include('AesCtr.php'); // AES Counter Mode implementation 

	if(isset($_POST['key']) and isset($_POST['plaintext'])) {
		$timeStart = microtime(true);
		$key = $_POST['key'];
		$plaintext = $_POST['plaintext'];
		$encrypt = AesCtr::encrypt($plaintext, $key, 256);

		$time = round((microtime(true) - $timeStart)*1000, 4);

		echo $encrypt;

		echo '                       Time = '.$time.'ms';
		
	}

	if(isset($_POST['keydecry']) and isset($_POST['ciphertext'])) {
		$timeStart = microtime(true);
		$key = $_POST['keydecry'];
		$ciphertext = $_POST['ciphertext'];
		$decrypt = AesCtr::decrypt($ciphertext, $key, 256);
		$time = round((microtime(true) - $timeStart)*1000, 4);

		echo $decrypt;

		echo '                       Time = '.$time.'ms';
		
	}

?>