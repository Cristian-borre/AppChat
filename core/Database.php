<?php
    $user = "root";
    $pass = "1048066232";
    $host = "localhost";
    $ddbb = "chatapp";

    try{
        $con = new PDO("mysql:dbname=$ddbb;host=$host;",$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "excepcion controlada ".$e->getMessage();
    }
?>