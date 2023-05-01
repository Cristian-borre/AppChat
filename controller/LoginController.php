<?php
    $valid['success']=array('success'=>false,'mensaje'=>"",'url'=>"");
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        include '../core/Database.php';

        $sql = "SELECT * FROM usuarios WHERE username='$username'";
        $stmt = $con->prepare($sql);
        $stmt->execute([$username]);
        if($stmt->rowCount() === 1){
            $user = $stmt->fetch();
            if($user['username'] === $username){
                if(password_verify($password, $user['password'])){
                    $valid['success']=true;
                    $valid['mensaje']= "Bienvenido!! $username";
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['lastname'] = $user['lastname'];
                    $_SESSION['img'] = $user['img'];
                    $_SESSION['id'] = $user['id'];
                    $valid['url']='../view/home.php';
                }else{
                    $valid['success']=false;
                    $valid['mensaje']= "Contraseña incorrecta!!";
                    $valid['url']='../view/login.php';
                }
            }else{
                $valid['success']=false;
                $valid['mensaje']='El usuario no existe!!';
                $valid['url']='../view/login.php';
            }
        }else{
            $valid['success']=false;
            $valid['mensaje']='El usuario no existe!!';
            $valid['url']='../view/login.php';
        }
    }else{
        $valid['success']=false;
        $valid['mensaje']='Hubo un error!!';
        $valid['url']='../view/login.php';
    }
    echo json_encode($valid);
?>