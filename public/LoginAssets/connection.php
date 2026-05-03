<?php 
    $servername = '127.0.0.1';
    $email = "root";
    $password = "root";
    $db_name = "users";  
    $conn = new mysqli($servername, $email, $password, $db_name, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo " ";

?>