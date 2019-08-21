<?php
header('Content-Type: text/html; charset=utf-8');
    require("../DB/connect.php");
    try{
      if(isset($_POST['sb'])){
          $hoten = $_POST['hoten'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $repassword = $_POST['repassword'];
          $gioitinh = $_POST['gioitinh'];
          $day = $_POST['day'];
          $month = $_POST['month'];
          $year = $_POST['year'];
          $ngaysinh=  $year . '-' . $month . '-' . $day;
          
          $check_sql = "select email from `htnshop`.`nguoidung` where email='$email'";
          $query=mysql_query($check_sql);
          if(mysql_num_rows($query) == 0)
          {
              $sql= " INSERT INTO `htnshop`.`nguoidung`(`hoten`, `password`, `ngaysinh`, `gioitinh`, `email`)
                      VALUES ('$hoten','$password','$ngaysinh','$gioitinh','$email') ";
             $count =  mysql_query($sql);
             if($count)
             {
               echo "<script type=\"text/javascript\">
                      alert(\"Đăng ký tài khoản thành công! Mời bạn quay trở lại trang chủ để đăng nhập\");
                      window.history.back();
                     </script>";
             }
             else
             {
                 echo "Có lỗi xảy ra";
             }
          }
          else
          {
              echo "<script type=\"text/javascript\">
                    alert(\"Email đã tồn tại!\");
                    window.history.back();
                   </script>";
          }   

      }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    

?>