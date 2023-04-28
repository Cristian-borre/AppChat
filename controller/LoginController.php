<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDOException;
use Core\Core;
use Model\UsuarioModel;

try{
   
}catch(PDOException $ex){
   Core::redir("Excepcion controlada",$ex->getMessage(),'./home');
}
?>