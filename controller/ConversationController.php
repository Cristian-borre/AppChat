<?php
    class ConversationController{
        public static function GetAllConversation($user_id){
            include '../model/ConversationsModel.php';
            try{
                return ConversationsModel::GetAllConversations($user_id);
            }catch(PDOException $e){
                echo "Excepcion controlada ". $e->getMessage();
            }
        }
    }
?>