<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AES in PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="aes">
        <h1 class="text-center text-info">AES CIPHER</h1>
        <form id="encryption" name="form-encrypt" method="POST" enctype="multipart/form-data">
            <h2 class="text-success">Encryption</h2>
            <label>Plaintext</label>
            <input class="pl-2" id="plaintext" type="text" name="plaintext" placeholder="Enter Plaintext">
            <div id="n-plaintext" class="text-center">
            </div>

            <label>Key</label>
            <input class="pl-2 mt-4" id="key1" type="text" name="key1" placeholder="Enter Key">
            <div id="n-key1" class="text-center">

            </div>
            <label class="length">Length Of Key</label>
            <select id="bit1" class="mt-4">
                <option value="128">128 Bit</option>
                <option value="192">192 Bit</option>
                <option value="256">256 Bit</option>
            </select>
            <div class="btn">
                <button class="btn btn-success" id="btn-encryt" type="button" name="btn-encryt">Encrypt</button>
            </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn-encryt").click(function(){
                    var form = document.forms['form-encrypt'];
                    var key = $("#key1").val();
                    var plaintext = $("#plaintext").val();
                    var bit = $("#bit1").val();
                    if(plaintext == '') {
                        $("#n-plaintext").html('<span class="text-danger">Plaint text can not be empty!</span>');
                        form['plaintext'].focus();
                        return false;
                    }
                    else {
                        $("#n-plaintext").html('');
                    }
                    if(key=='') {
                        $("#n-key1").html('<span class="text-danger">Key can not be empty!</span>');
                        form['key1'].focus();
                        return false;
                    }
                    else {
                        $("#n-key1").html('');
                    }
                    if(plaintext!=null && key!=null) {
                        $.ajax({
                            type: "POST",
                            url: "process.php",
                            data:{key : key, plaintext : plaintext, bit : bit},
                            cache: false,
                            success: function(result) {
                                alert(result);
                                // window.location.reload();
                            }
                        });
                        $("#key1").val(key);
                        $("#plaintext").val(plaintext);
                    }
                });
            });

        </script>
        
        <form id="decryption" name="form-decrypt" method="POST" enctype="multipart/form-data">
            <h2>Decryption</h2>
            <label>Ciphertext</label>
            <input class="pl-2" id="ciphertext" type="text" name="ciphertext" placeholder="Enter Ciphertext">
            <div id="n-ciphertext" class="text-center">
            </div>

            <label>Key</label>
            <input class="pl-2 mt-4" id="key2" type="text" name="key2" placeholder="Enter Key">
            <div id="n-key2" class="text-center">
            </div>

            <label class="length">Length Of Key</label>
            <select id="bit2" class="mt-4">
                <option value="128">128 Bit</option>
                <option value="192">192 Bit</option>
                <option value="256">256 Bit</option>
            </select>

            <div class="btn">
                <button class="btn btn-dark" id="btn-decr" type="button" value="Decrypt" name="btn-decr">Decrypt</button>
            </div>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn-decr").click(function(){
                    var form = document.forms['form-decrypt'];
                    var key = $("#key2").val();
                    var ciphertext = $("#ciphertext").val();
                    var bit = $("#bit2").val();

                    if(ciphertext == '') {
                        $("#n-ciphertext").html('<span class="text-danger">Ciphertext can not be empty!</span>');
                        form['ciphertext'].focus();
                        return false;
                    }
                    else {
                        $("#n-ciphertext").html('');
                    }
                    if(key=='') {
                        $("#n-key2").html('<span class="text-danger">Key can not be empty!</span>');
                        form['key2'].focus();
                        return false;
                    }
                    else {
                        $("#n-key2").html('');
                    }
                    if(ciphertext!=null && key!=null) {
                        $.ajax({
                            type: "POST",
                            url: "process.php",
                            data:{keydecry : key, ciphertext : ciphertext, bit : bit},
                            cache: false,
                            success: function(result) {
                                alert(result);
                            }
                        });
                        $("#key2").val(key);
                        $("#ciphertext").val(ciphertext);
                    }
                });
            });
        </script>
        
    </div>

</body>
</html>