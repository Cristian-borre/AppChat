<?php
    class UsuariosController{
        public static function GetAllUsuarios($username){
            include '../model/UsuariosModel.php';
            try{
                return UsuariosModel::GetAllUsuarios("SELECT * FROM usuarios WHERE username='$username'");
            }catch(PDOException $e){
                echo "Excepcion controlada ". $e->getMessage();
            }
        }
    }
?>