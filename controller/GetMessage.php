<?php 

session_start();
if(isset($_SESSION['username'])){
    if(isset($_POST['id_2'])){
        include '../core/Database.php';

        $id_1 = $_SESSION['id'];
        $id_2 = $_POST['id_2'];
        $opened = 0;

        $sql = "SELECT * FROM chats WHERE to_id=? AND from_id=? ORDER BY chat_id ASC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id_1,$id_2]);

        if($stmt->rowCount() > 0){
            $chats = $stmt->fetchAll();

            foreach($chats as $chat){
                if($chat['opened'] == 0){
                    $opened = 1;
                    $chat_id = $chat['chat_id'];

                    $sql2 = "UPDATE chats SET opened = ? WHERE chat_id = ?";
                    $stmt2= $con->prepare($sql2);
                    $stmt2->execute([$opened,$chat_id])
                    ?>
                        <div class="chat incoming">
                            <img src="../upload/<?=$chat['img']?>" width="50" height="50" alt="">
                            <div class="details">
                                <p><?=$chat['message']?></p>
                            </div>
                        </div>
                    <?php
                }
            }
        }
    }
}else{
    header('Location: ../view/login.php');
    exit;
}