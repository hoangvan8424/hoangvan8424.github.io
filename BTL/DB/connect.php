<?php

 try{

    $connect = mysql_connect("localhost", "root", "") or die("can't connect database");
    mysql_select_db("htnshop");
    mysql_set_charset('utf8', $connect);
   
    
}catch(PDOException $e){
    echo $e->getMessage();
}   

?>