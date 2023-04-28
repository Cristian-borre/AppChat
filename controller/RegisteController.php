<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDOException;
use Core\Core;
use Model\UsuarioModel;
try{
    $valido['success']=array('success'=> false,'mensaje'=>'');
    if(!is_null($_POST['name']) && !is_null($_POST['lastname']) && !is_null($_POST['username'])
    && !is_null($_POST['password']) && !is_null($_POST['img'])){
        $sql = UsuarioModel::GetAllUsuario("SELECT * FROM usuarios WHERE username=:username");
        if(!$sql){
            $user = new UsuarioModel();
            $user->name = Core::Sanitizar($_POST['name']);
            $user->lastname = Core::Sanitizar($_POST['lastname']);
            $user->username = Core::Sanitizar($_POST['username']);
            $user->password = Core::HashPassword($_POST['password']);
            $user->img = Core::Sanitizar($_POST['img']);
            if($user->AddUsuario()){
                $valido['success']=true;
                $valido['mensaje']="Usuario registrado correctamente!";
            }else{
                $valido['success']=false;
                $valido['mensaje']="Usuario no fue registrado!!";
            }
        }else{
            $valido['success']=false;
            $valido['mensaje']="Usuario ya existe!!";
        }
    }else{
        $valido['success']=false;
        $valido['mensaje']="No se guardo, hubo un posible error o campos nulos";
    }
    echo json_encode($valido);
}catch(PDOException $e){
    Core::alert('Excepcion controlada ', $e->getMessage(),'./login');
}

?>