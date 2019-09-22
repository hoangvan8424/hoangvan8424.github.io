<?php
    require('Aes.php'); // AES PHP implementation
    require('AesCtr.php'); // AES Counter Mode implementation 

    $timer = microtime(true);

    // initialise password & plaintext if not set in post array
    $pw = empty($_POST['pw']) ? '' : $_POST['pw'];

    $pt = empty($_POST['pt']) ? '' : $_POST['pt'];

    $cipher = empty($_POST['cipher']) ? '' : $_POST['cipher'];

    // perform encryption/decryption as required
    $encr = empty($_POST['btn-encr']) ? '' : AesCtr::encrypt($pt, $pw, 256);
    
    $decr = empty($_POST['btn-decr']) ? ''  : AesCtr::decrypt($cipher, $pw, 256);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AES in PHP test harness</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="aes">
        <form method="POST" action="">

            <label>Key</label>
            <input id="key1" type="text" name="pw" size="80">
            <input id="key2" type="text" name="key" size="80" value="<?= $pw; ?>"><br>

            <label>Plaintext</label>
            <input  type="text" name="pt">
            <input id="plaintext" type="text" name="plaintext" size="80" value="<?= $pt; ?>"><br>

            <div class="btn">
                <button type="button" name="btn-encr" value="Encrypt" onclick="myFunction()">Encrypt</button>
                <textarea name="cipher"><?= $encr ?></textarea>

                <button type="button" name="btn-decr" value="Decrypt">Decrypt</button>
                <textarea name="plain"><?= htmlspecialchars($decr) ?></textarea>
            </div>
            
        </form>
        
    </div>

    <script type="text/javascript">
        document.getElementById("key2").style.display = "none";
        document.getElementById("plaintext").style.display = "none";
        function myFunction() {
            document.getElementById("key1").style.display = "none";
            document.getElementById("key2").style.display = "inline-block";
        }
    </script>

</body>
</html>