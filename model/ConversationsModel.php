<?php
    class ConversationsModel{
        
        public static function GetAllConversations($user_id){
            include '../core/Database.php';
            $sql = "SELECT * FROM conversation WHERE user_1=? OR user_2=?
                    ORDER BY conversation_id DESC";
            $stmt = $con->prepare($sql);
            $stmt->execute([$user_id, $user_id]);
            if($stmt->rowCount() > 0){
                $conversations = $stmt->fetchAll();
                $user_data = [];
                foreach($conversations as $conversation){
                    if($conversation['user_1'] == $user_id){
                        $sql2 = "SELECT id,name,lastname,username,img,fecha FROM usuarios WHERE id=?";
                        $stmt2 = $con->prepare($sql2);
                        $stmt2->execute([$conversation['user_2']]);
                    }else{
                        $sql2 = "SELECT id,name,lastname,username,img,fecha FROM usuarios WHERE id=?";
                        $stmt2 = $con->prepare($sql2);
                        $stmt2->execute([$conversation['user_1']]);
                    }
                    $Allconversation = $stmt2->fetchAll();
                    array_push($user_data,$Allconversation[0]);
                }
                return $user_data;
            }else{
                $conversations = [];
                return $conversations;
            }
        }
    }
?>