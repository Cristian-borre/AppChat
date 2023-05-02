<?php
session_start();
if(isset($_SESSION['username'])){
    if(isset($_POST['message']) && isset($_POST['to_id'])){
        include '../core/Database.php';
        $message = $_POST['message'];
        $to_id = $_POST['to_id'];
        $from_id = $_SESSION['id'];
        $sql = "INSERT INTO chats (from_id,to_id,message) VALUES (?,?,?)";
        $stmt = $con->prepare($sql);
        $res = $stmt->execute([$from_id,$to_id,$message]);
        if($res){
            $sql2 = "SELECT * FROM conversation WHERE (user_1 = ? AND user_2 = ?) OR (user_2 = ? AND user_1 = ?)";
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute([$from_id,$to_id,$from_id,$to_id]);
            define('TIMEZONE', 'America/Bogota');
            date_default_timezone_set(TIMEZONE);
            $time = date("h:i a");
            if($stmt2->rowCount() == 0){
                $sql3 = "INSERT INTO conversation (user_1,user_2) VALUES (?,?)";
                $stmt3 = $con->prepare($sql3);
                $stmt3->execute([$from_id,$to_id]);
            }
            ?>
            <div class="chat outgoing">
                <div class="details">
                    <p><?=$message?></p>
                </div>
            </div>
            <?php
        }
    }
}else{
    header("Location: ../login.php");
    exit;
}
?>