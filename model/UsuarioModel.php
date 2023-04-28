<?php
    namespace Model;
    require_once(__DIR__.'../../vendor/autoload.php');
    use PDO,PDOException;
    use Core\Database;
    use Core\Core;

    class UsuarioModel{

        static $tableName = "usuarios";

        function __construct(){
            $this->id="";
            $this->name="";
            $this->lastname="";
            $this->username="";
            $this->password="";
            $this->img="";
        }

        public function AddUsuario(){
            $bool = false;
            try {
                $Database = new Database();
                $con = $Database->Connect();
                $con->beginTransaction();
                $stmt = $con->prepare("INSERT INTO ".self::$TableName." (name,lastname,username,password,img)VALUES(:name,:lastname,:username,:password,:img)");
                $stmt->bindParam(':name',  $this->name,PDO::PARAM_STR);
                $stmt->bindParam(':lastname',  $this->lastname,PDO::PARAM_STR);
                $stmt->bindParam(':username',  $this->username,PDO::PARAM_STR);
                $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
                $stmt->bindParam(':img', $this->img, PDO::PARAM_STR);
                if($stmt->execute()){
                    $con->commit();
                    $bool = true;            
                } else {
                    $bool = false;   
                }
            }catch(PDOException $ex){
                $con->rollBack();
                echo "Excepcion controlada: ".$ex->getMessage();
            }
            finally{
                Database::Disconnect();
            }
            return $bool;  
        }
        public function UpdateUsuario(){
            $bool = false;
            try {
                $Database = new Database();
                $con = $Database->Connect();
                $con->beginTransaction();
                $stmt = $con->prepare("UPDATE ".self::$TableName." SET name=:name,lastname=:lastname,username=:username,password=:password,img=:img where id=:id");
                $stmt->bindParam(':id', $this->id,PDO::PARAM_INT);
                $stmt->bindParam(':name',  $this->name,PDO::PARAM_STR);
                $stmt->bindParam(':lastname',  $this->lastname,PDO::PARAM_STR);
                $stmt->bindParam(':username',  $this->username,PDO::PARAM_STR);
                $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
                $stmt->bindParam(':img', $this->img, PDO::PARAM_STR);
                if($stmt->execute()){
                    $con->commit();
                    $bool = true;            
                } else {
                    $bool = false;   
                }
            }catch(PDOException $ex){
                $con->rollBack();
                error_log("Excepcion controlada: ".$ex->getMessage());
            }
            finally{
                Database::Disconnect();
            }
            return $bool; 
        }
        public function GetAllUsuario($sql){
            return Core::ExecuteQuery($sql);
        }
        public function Login(){
            try {
                $Sw = self::GetUserLogin($this->username ,$this->password);
                if($Sw!=null || $Sw!=false){
                    $sw = true;        
                }else if($Sw==false || ($Sw==null)){   
                    $sw = false;                                                            
                }
            } catch(PDOException $ex){
                return "Excepcion controlada: ".$ex->getMessage();
            }
            return $sw;
        }
        public function GetUserLogin($username,$password){
            $user =  self::GetByUsername($username);
            try {
                if($user){             
                $password = Core::HashVerifyPassword($password,$user->password);
                    if($password){
                        return self::GetByUsername($username);
                    } 
                }
            } catch(PDOException $ex){
                return "Excepcion controlada: ".$ex->getMessage();
            }
            return false;
        }
        public static function GetByUsername($username){
            $Database = new Database();
            $con = $Database->Connect();
            $sql = "select * from ".self::$TableName." where username=:username";
            $sql = Core::Sanitizar($sql);
            try {
                if (!is_null($con) || !empty($con) ){
                    $query = $con->prepare($sql);
                    $query->bindParam(':username',$username,PDO::PARAM_STR);
                    if($query->execute()){
                        if($query->rowCount() > 0){
                            $data = $query->fetch(PDO::FETCH_OBJ);
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
        public function GetById($id){
            $Database = new Database();
            $con = $Database->Connect();
            $sql = "select * from ".self::$TableName." where id=:id";
            $sql = Core::Sanitizar($sql);
            try {
                if (!is_null($con) || !empty($con) ){
                    $query = $con->prepare($sql);
                    $query->bindParam(':id',$id,PDO::PARAM_INT);
                    if($query->execute()){
                        if($query->rowCount() > 0){
                            $data = $query->fetchObject(self::class);
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
?>