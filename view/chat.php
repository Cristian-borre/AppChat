<?php 
    namespace View;
    require_once(__DIR__.'../../vendor/autoload.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="contenedor col-auto h-auto shadow-lg p-2 rounded-5">
        <div>
            <header class="chat-head d-flex content align-items-center">
                <a href="./home" class="bx bx-left-arrow-alt fs-3 text-black px-3"></a>
                <img src="./img/icon2.jpg" width="60" height="60" alt="">
                <div class="details mt-3">
                    <span class="px-2 fw-semibold">Cristian Borre</span>
                    <p class="px-2">Activo Ahora</p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, vel nostrum aliquam repellendus recusandae veritatis dolore rem fuga aspernatur totam quasi ipsa saepe! Ipsum voluptas ducimus illo, laborum quas aspernatur velit officia recusandae facilis nisi, odit corporis. Magnam recusandae labore autem maxime consectetur tempore, amet accusantium. Libero illum nostrum nihil.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./img/icon2.jpg" width="50" height="50" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste corporis maxime a fugiat deserunt, atque veniam, dicta totam cum inventore animi velit suscipit consequuntur eligendi?</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, vel nostrum aliquam repellendus recusandae veritatis dolore rem fuga aspernatur totam quasi ipsa saepe! Ipsum voluptas ducimus illo, laborum quas aspernatur velit officia recusandae facilis nisi, odit corporis. Magnam recusandae labore autem maxime consectetur tempore, amet accusantium. Libero illum nostrum nihil.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./img/icon2.jpg" width="50" height="50" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste corporis maxime a fugiat deserunt, atque veniam, dicta totam cum inventore animi velit suscipit consequuntur eligendi?</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, vel nostrum aliquam repellendus recusandae veritatis dolore rem fuga aspernatur totam quasi ipsa saepe! Ipsum voluptas ducimus illo, laborum quas aspernatur velit officia recusandae facilis nisi, odit corporis. Magnam recusandae labore autem maxime consectetur tempore, amet accusantium. Libero illum nostrum nihil.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./img/icon2.jpg" width="50" height="50" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste corporis maxime a fugiat deserunt, atque veniam, dicta totam cum inventore animi velit suscipit consequuntur eligendi?</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, vel nostrum aliquam repellendus recusandae veritatis dolore rem fuga aspernatur totam quasi ipsa saepe! Ipsum voluptas ducimus illo, laborum quas aspernatur velit officia recusandae facilis nisi, odit corporis. Magnam recusandae labore autem maxime consectetur tempore, amet accusantium. Libero illum nostrum nihil.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./img/icon2.jpg" width="50" height="50" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste corporis maxime a fugiat deserunt, atque veniam, dicta totam cum inventore animi velit suscipit consequuntur eligendi?</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, vel nostrum aliquam repellendus recusandae veritatis dolore rem fuga aspernatur totam quasi ipsa saepe! Ipsum voluptas ducimus illo, laborum quas aspernatur velit officia recusandae facilis nisi, odit corporis. Magnam recusandae labore autem maxime consectetur tempore, amet accusantium. Libero illum nostrum nihil.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="./img/icon2.jpg" width="50" height="50" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste corporis maxime a fugiat deserunt, atque veniam, dicta totam cum inventore animi velit suscipit consequuntur eligendi?</p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing-area">
                <div class="input-group mb-2 mt-3 mx-right-3">
                    <input type="text" class="form-control" placeholder="Escribe un mensaje aqui..">
                    <button class="btn fs-5 btn-dark bx bx-paper-plane"></button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>