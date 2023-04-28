<?php
namespace Core;
require_once(__DIR__.'../../vendor/autoload.php');
use PDO,PDOException;

class Database extends PDO{
    public static $data;
    function __construct(){
        if($_SERVER['HTTP_HOST'] == 'localhost' || substr($_SERVER['HTTP_HOST'],0,3) == '10.' || substr($_SERVER['HTTP_HOST'],0,7) == '192.168') {
			$this->user = "root";
			$this->pass = "1048066232";
			$this->host = "127.0.0.1";
			$this->ddbb = "chatapp";
			$this->port = "3306";
		} 
    }
    function Connect(){
        try{
            $data = new PDO("mysql:dbname={$this->ddbb};host={$this->host};port={$this->port};",$this->user,$this->pass);
            $data->exec("SET NAMES utf8");
            $data->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            Core::redir('Excepcion controlada', $e->getMessage(),'./login');
        }
    }
    static function Disconnect(){
        $data = null;
        $stmt = null;
    }
}
?>