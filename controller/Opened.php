<?php
function opend($id_1,$chats){
    foreach($chats as $chat){
        if($chat['opened'] == 0){
            include '../core/Database.php';
            $opened = 1;
            $chat_id = $chat['chat_id'];
            $sql = "UPDATE chats SET opened = ? WHERE from_id = ? AND chat_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$opened,$id_1,$chat_id]);
        }
    }
}
?>