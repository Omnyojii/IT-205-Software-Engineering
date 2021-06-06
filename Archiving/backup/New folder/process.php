<?php

    $mysql_server = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_db = "sis"; 

    $conn = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
    if($conn->connect_error){
        echo "ERROR - 404";
    }else{
        echo "Connection Successful";
    }
?>