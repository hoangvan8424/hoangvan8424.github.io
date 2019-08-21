<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    require("../DB/connect.php");
    if(isset($_POST['sb']))
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "select email,password,phanquyen from nguoidung where email= '$email' AND password='$password'";
      $query=mysql_query($sql);
      $row = mysql_fetch_array($query);
      

      if(mysql_num_rows($query) == 0)
      {
        echo "<script type=\"text/javascript\">
              alert(\"không tồn tại $email trong hệ thống hoặc mật khẩu sai\");
              window.history.back();
              </script>";
      }
      else
      {
        $check= "SELECT maND,hoten,phanquyen FROM nguoidung WHERE email ='$email' AND password='$password'";
        $checkten=mysql_query($check);
        $result = mysql_fetch_array($checkten);
       
        $_SESSION['user']['hoten'] = $result['hoten'];
        $_SESSION['user']['quyen'] = $result['phanquyen'];
        $_SESSION['user']['ID'] = $result['maND'];

        $hoten = $_SESSION['user']['hoten'];
        $id  = $_SESSION['user']['ID'];
        echo "<script type=\"text/javascript\">
                alert(\"Chào mừng $hoten đến với HTNSHOP!\");
                window.history.back();
               </script>";
    }
    
       
  }

    
?>