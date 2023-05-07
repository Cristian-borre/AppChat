<?php
    function LastChat($id_1,$id_2){
        include '../core/Database.php';
        $sql = 'SELECT * FROM chats WHERE (from_id=? AND to_id=?) OR (to_id=? AND from_id=?) ORDER BY chat_id DESC LIMIT 1';
        $stmt = $con->prepare($sql);
        $stmt->execute([$id_1,$id_2,$id_1,$id_2]);
        if($stmt->rowCount() > 0){
            $chat = $stmt->fetch();
            if($chat['from_id'] == $_SESSION['id']){
                return 'you: '.$chat['message'];
            }else{
                return $chat['message'];
            }
        }else{
            $chat = '';
            return $chat;
        }
    }
?>