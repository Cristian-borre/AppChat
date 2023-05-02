<?php
session_start();

if(isset($_SESSION['username'])){
    include '../core/Database.php';
    $id = $_SESSION['id'];
    $sql = "UPDATE usuarios SET fecha = NOW() WHERE id = '$id'";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
}else{
    header("Location: ../login.php");
    exit;
}
?>