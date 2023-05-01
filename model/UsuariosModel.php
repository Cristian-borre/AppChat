<?php

    Class UsuariosModel{
        static $tableName = "usuarios";
        function __construct(){
            $this->name = "";
            $this->lastname = "";
            $this->username = "";
            $this->password = "";
            $this->img = "";
        }
        Public function AddUsuariosimg(){
            include '../core/Database.php';
            $bool = false;
            try{
                $con->beginTransaction();
                $stmt = $con->prepare("INSERT INTO ".self::$tableName." (name,lastname,username,password,img) VALUES (:name,:lastname,:username,:password,:img)");
                $stmt->bindParam(':name',$this->name ,PDO::PARAM_STR);
                $stmt->bindParam(':lastname',$this->lastname ,PDO::PARAM_STR);
                $stmt->bindParam(':username',$this->username ,PDO::PARAM_STR);
                $stmt->bindParam(':password',$this->password ,PDO::PARAM_STR);
                $stmt->bindParam(':img',$this->img ,PDO::PARAM_STR);
                if($stmt->execute()){
                    $con->commit();
                    $bool = true;
                }else{
                    $bool = false;
                }
            }catch(PDOException $e){
                $con->rollBack();
                echo "Excepcion controlada: ".$e->getMessage();
            }
            return $bool;
        }
        Public function AddUsuarios(){
            include '../core/Database.php';
            $bool = false;
            try{
                $con->beginTransaction();
                $stmt = $con->prepare("INSERT INTO ".self::$tableName." (name,lastname,username,password) VALUES (:name,:lastname,:username,:password)");
                $stmt->bindParam(':name',$this->name ,PDO::PARAM_STR);
                $stmt->bindParam(':lastname',$this->lastname ,PDO::PARAM_STR);
                $stmt->bindParam(':username',$this->username ,PDO::PARAM_STR);
                $stmt->bindParam(':password',$this->password ,PDO::PARAM_STR);
                if($stmt->execute()){
                    $con->commit();
                    $bool = true;
                }else{
                    $bool = false;
                }
            }catch(PDOException $e){
                $con->rollBack();
                echo "Excepcion controlada: ".$e->getMessage();
            }
            return $bool;
        }
        public function GetAllUsuarios($sql){
            include '../core/Database.php';
            $stmt = $con->prepare($sql);
            $stmt->execute([$sql]);
            if($stmt->rowCount() === 1){
                $user = $stmt->fetch();
                return $user;
            }else{
                $user = [];
                return $user;
            }
        }
    }
?>