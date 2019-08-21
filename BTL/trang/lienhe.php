<?php 
header('Content-Type: text/html; charset=utf-8');
    require("../DB/connect.php");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_POST['sb'])){
          $hoten = $_POST['hoten'];
          $email = $_POST['email'];
          $noidung = $_POST['noidung'];
          

          $sql= " INSERT INTO lienhe(hoten, email, noidung, ngaylh)
                    VALUES ('$hoten','$email','$noidung', '".date("Y-m-d H:i:s")."')";
           $count =  mysql_query($sql);
           if($count)
           {
             echo "<script type=\"text/javascript\">
                    alert(\"Cảm ơn bạn đã gửi phản hồi! Chúng tôi sẽ liên hệ sớm nhất có thể\");
                    window.history.back();
                   </script>";
           }
           else
           {
               echo "Phản hồi của bạn gửi đi thất bại. Hãy thử lại!";
           }
    }
            

      
 ?>