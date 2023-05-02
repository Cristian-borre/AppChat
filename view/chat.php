<?php
    session_start();

    if(isset($_SESSION['username'])){

        include '../controller/UsuariosController.php';
        include '../controller/ChatController.php';
        include '../controller/TimeAgoController.php';

        if(!isset($_GET['user'])){
            header("Location: home.php");
            exit;
        }
        $chat = UsuariosController::GetAllUsuarios($_GET['user']);
        if(empty($chat)){
            header("Location: home.php");
            exit;
        }
        $Chats = GetChat($_SESSION['id'], $chat['id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="contenedor col-auto h-auto shadow-lg p-2 rounded-5">
        <div>
            <header class="chat-head d-flex content align-items-center">
                <a href="home.php" class="bx bx-left-arrow-alt fs-3 text-black px-3"></a>
                <img src="../upload/<?=$chat['img']?>" width="60" height="60" alt="">
                <div class="details mt-3">
                    <span class="px-2 fw-semibold"><?=$chat['name'],' ',$chat['lastname']?></span>
                    <?php if(last_seen($chat['fecha']) == 'active'){ ?>
                        <div class="d-flex">
                            <p class="mx-2">online</p>  
                            <div class="status_online mt-1 bx bxs-circle"></div>
                        </div>
                    <?php }else{ ?>
                        <p class="px-2"><?=$chat['fecha']?></p>
                    <?php }?>
                </div>
            </header>
            <div id="chat-box" class="chat-box">
                <?php if(!empty($Chats)){ 
                        foreach($Chats as $Chat){
                            if($Chat['from_id'] == $_SESSION['id']){ ?>
                                <div class="chat outgoing">
                                    <div class="details">
                                        <p><?=$Chat['message']?></p>
                                    </div>
                                </div>
                        <?php }else{ ?>
                            <div class="chat incoming">
                                <img src="../upload/<?=$chat['img']?>" width="50" height="50" alt="">
                                <div class="details">
                                    <p><?=$Chat['message']?></p>
                                </div>
                            </div>
                        <?php }
                        } ?>
                    <?php }else{ ?>
                        <div class="alert alert-info text-center fs-4" role="alert">
                            <i class="bx bxs-message-rounded d-block fs-big"></i>
                            No tienes mensajes, Inicia una conversacion!!
                        </div>
                    <?php } ?>
            </div>
            <form class="typing-area">
                <div class="input-group mb-2 mt-3 mx-right-3">
                    <input type="text" id="message" class="form-control" placeholder="Escribe un mensaje aqui..">
                    <button type="reset" class="btn fs-5 btn-dark bx bx-paper-plane" id="sendbtn"></button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var scrollDown = function(){
            let chatbox = document.getElementById('chat-box');
            chatbox.scrollTop = chatbox.scrollHeight;
        }

        scrollDown();

        $(document).ready(function(){
            $("#sendbtn").on('click',function(){
                message = $("#message").val();
                if(message === "") return;

                $.post('../controller/AddChatController.php',
                        {
                            message: message,
                            to_id: <?=$chat['id']?>
                        },
                        function(data, status){
                            $("#message").val();
                            $("#chat-box").append(data);
                            scrollDown();
                        })
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    }else{
        header('Location: login.php');
        exit;
    }
?>