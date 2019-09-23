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
        <form id="encryption" method="POST" enctype="multipart/form-data">
            <h2 class="text-success">Encryption</h2>
            <label>Key</label>
            <input class="pl-2" id="key" type="text" name="key1" placeholder="Enter Key"> <br>

            <label>Plaintext</label>
            <input class="pl-2" id="plaintext" type="text" name="plaintext" placeholder="Enter Plaintext">

            <div class="btn">
                <button class="btn btn-success" id="btn-encryt" type="button" name="btn-encryt">Encrypt</button>
                <!-- <textarea id="cipher" name="cipher"></textarea> -->
            </div>
<!--             <div class="time">
                <label>Time: </label></span>
            </div> -->
        </form>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn-encryt").click(function(){
                    var key = $("#key").val();
                    var plaintext = $("#plaintext").val();
                    // alert($plaintext);
                    $.ajax({
                        type: "POST",
                        url: "process.php",
                        data:{key : key, plaintext : plaintext},
                        cache: false,
                        success: function(result) {
                            alert(result);
                            // window.location.reload();
                        
                        }
                    });
                    
                });
            });
        </script>
        
        <form id="decryption" method="POST" enctype="multipart/form-data">
            <h2>Decryption</h2>
            <label>Key</label>
            <input class="pl-2" id="key2" type="text" name="key2" placeholder="Enter Key"> <br>

            <label>Ciphertext</label>
            <input class="pl-2" id="ciphertext" type="text" name="ciphertext" placeholder="Enter Ciphertext">

            <div class="btn">
                <button class="btn btn-dark" id="btn-decr" type="button" value="Decrypt" name="btn-decr">Decrypt</button>
                <!-- <textarea name="plain"></textarea> -->
            </div>
            <!-- <div class="time">
                <label>Time: </label><span>s</span>
            </div>  -->
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn-decr").click(function(){
                    var key = $("#key2").val();
                    var ciphertext = $("#ciphertext").val();
                    $.ajax({
                        type: "POST",
                        url: "process.php",
                        data:{keydecry : key, ciphertext : ciphertext},
                        cache: false,
                        success: function(result) {
                            alert(result);
                            // window.location.reload();
                        
                        }
                    });
                });
            });
        </script>
        
    </div>

    
</body>
</html>