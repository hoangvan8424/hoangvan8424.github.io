<?php
    require('Aes.php'); // AES PHP implementation
    require('AesCtr.php'); // AES Counter Mode implementation 

    $timer = microtime(true);

    // initialise password & plaintext if not set in post array
    $pw = empty($_POST['pw']) ? 'hoang' : $_POST['pw'];

    $pt = empty($_POST['pt']) ? 'hoangvanthai' : $_POST['pt'];

    $cipher = empty($_POST['cipher']) ? '' : $_POST['cipher'];

    $plain  = empty($_POST['plain'])  ? '' : $_POST['plain'];

    // perform encryption/decryption as required
    $encr = empty($_POST['encr']) ? $cipher : AesCtr::encrypt($pt, $pw, 256);
    
    $decr = empty($_POST['decr']) ? $plain  : AesCtr::decrypt($cipher, $pw, 256);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AES in PHP test harness</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 400;
            font-size: 18px;


        }
        form {
            width: 1000px;
            height: 500px;
            margin: 0 auto;
            background-color: #f5f5f5;
            padding: 50px;
            border: 1px solid #000;
            border-right: 0;
            border-top: 0;
        }
        table {
            margin-top: 50px;
        }
        table tr td {
            padding-top: 10px;
            padding-right: 10px;
        }
        input {
            height: 28px;
            padding: 0 10px;
        }
        table tr button {
            width: 111px;
        }

    </style>
</head>
<body>
<form method="post">
    <table>
        <tr>
            <td>Password:</td>
            <td><input type="text" name="pw" size="80" value="<?= $pw ?>"></td>
        </tr>
        <tr>
            <td>Plaintext:</td>
            <td><input type="text" name="pt" size="80" value="<?= htmlspecialchars($pt) ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" name="encr" value="Encrypt it">Encrypt it</button></td>
            <td><input type="text" name="cipher" size="80" value="<?= $encr ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" name="decr" value="Decrypt it">Decrypt it</button></td>
            <td><input type="text" name="plain" size="80" value="<?= htmlspecialchars($decr) ?>"></td>
        </tr>
        <tr>
            <td>Time:</td>
            <td><p><?= round(microtime(true) - $timer, 3) ?>s</p></td>
        </tr>
    </table>
</form>



</body>
</html>