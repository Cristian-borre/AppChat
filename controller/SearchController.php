<?php
session_start();

if(isset($_SESSION['username'])){
    if(isset($_POST['key'])){
        include '../core/Database.php';
        include '../controller/LastChats.php';
        include '../controller/TimeAgoController.php';

        $key = "%{$_POST['key']}%";
        $sql = "SELECT * FROM usuarios WHERE username LIKE ? or name LIKE ? ORDER BY username, name ASC";
        $stmt = $con->prepare($sql);
        $stmt->execute([$key, $key]);
        if($stmt->rowCount() > 0){ 
            $users = $stmt->fetchAll();
                foreach($users as $user){
                    if($user['id'] == $_SESSION['id']) continue;
                ?>
                    <a href="chat.php?user=<?=$user['username']?>" class="d-flex mt-4 justify-content-between align-items-center">
                        <div class="content d-flex mb-2">
                            <img src="../upload/<?=$user['img']?>" width="50" height="50" alt="">
                            <div class="details">
                                <span class="px-2 text-black fw-semibold"><?=$user['name'],' ',$user['lastname']?></span>
                                <p class="px-2"><?php echo LastChat($_SESSION['id'], $user['id']) ?></p>
                            </div>
                        </div>
                        <?php if(last_seen($user['fecha']) == 'active'){ ?>
                            <div class="status_online mb-3 bx bxs-circle"></div>
                        <?php }else{ ?>
                            <div class="status_offline mb-3 bx bxs-circle"></div>
                        <?php }?>
                    </a>
                <?php }
        }else{ ?>
            <div class="alert alert-info text-center">
                <i class="bx bxs-user-x d-block fs-big"></i>
                El usuario "<?=htmlspecialchars($_POST['key'])?>"
                No existe
            </div>
        <?php }
    }
}else{
    header("Location: ../view/login.php");
    exit;
}
?>