<?php 
namespace Core;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;

class Core {
	   
	public static function Sanitizar($sql){
		$str = preg_replace('/\x00|<[^>]*>?/', '', $sql);
    	return htmlspecialchars(str_replace(["'", '"'], ['&#39;', '&#34;'], $str));
	}
	public static function Serializer($Msj,$Data,$Status){
		return json_encode(array('msj'=>$Msj,'data'=>$Data,'status'=>$Status)); 
	}
	public static function ExecuteQuery($sql){
		$Database = new Database();
		$con = $Database->Connect();
		$sql = self::Sanitizar($sql);
		try {
			if (!is_null($con) || !empty($con) ){
				$query = $con->prepare($sql);
				if($query->execute()){
					if($query->rowCount() > 0){
						$data = $query->fetchAll(PDO::FETCH_OBJ);
					}else {
						return false;
					}	
				}  
			}
		} catch(PDOException $ex){
			$data = "Excepcion controlada: ".$ex->getMessage();
		}
		return $data;	
	}
	public static function redir($url){
		echo "<script> window.location='".$url."';</script>";
	}
	public static function HashPassword($Pass){
        return password_hash($Pass, PASSWORD_BCRYPT);
    }
    public static function HashVerifyPassword($Pass,$Hash){
         return  password_verify($Pass,$Hash);
    }
	public static function ExecuteOneQuery($sql){
		$Database = new Database();
		$con = $Database->Connect();
		$sql = self::Sanitizar($sql);
		try {
			if (!is_null($con) || !empty($con) ){
				$query = $con->prepare($sql);
				if($query->execute()){
					if($query->rowCount() > 0){
						$data = $query->fetchAll(PDO::FETCH_ASSOC);
					}else {
						return false;
					}	
				}  
			}
		} catch(PDOException $ex){
			$data = "Excepcion controlada: ".$ex->getMessage();
		}
		return $data;	

	}
}