<?php
    function GetChat($id_1,$id_2){
        include '../core/Database.php';
        $sql = 'SELECT * FROM chats WHERE (from_id=? AND to_id=?) OR (to_id=? AND from_id=?) ORDER BY chat_id ASC';
        $stmt = $con->prepare($sql);
        $stmt->execute([$id_1,$id_2,$id_1,$id_2]);
        if($stmt->rowCount() > 0){
            $chats = $stmt->fetchAll();
            return $chats;
        }else{
            $chats = [];
            return $chats;
        }
    }
?>