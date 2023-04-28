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
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="contenedor col-auto h-auto shadow-lg p-3 rounded-5">
        <div>
            <header class="header d-flex align-items-center mb-4 justify-content-between">
                <div class="content d-flex pt-3 pb-3">
                    <img src="./img/icon.jpg" width="80" alt="">
                    <div class="details pt-3">
                        <span class="px-2 fs-5 fw-semibold">Cristian Borre</span>
                        <p class="px-3 fs-6">Activo Ahora</p>
                    </div>
                </div>
                <div>
                    <a href="./login" class="btn btn-dark bx bxs-log-in fs-5"></a>
                </div>
            </header>
            <div class="search input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar un chat o inicia uno nuevo">
                <button class="btn btn-dark"><i class="bx bx-search"></i></button>
            </div>
            <div class="user-list mb-2">
                <a href="./chat" class="d-flex mt-4 justify-content-between align-items-center">
                    <div class="content d-flex mb-2">
                        <img src="./img/icon2.jpg" width="50" height="50" alt="">
                        <div class="details">
                            <span class="px-2 text-black fw-semibold">Cristian Borre</span>
                            <p class="px-2">Esto es una prueba</p>
                        </div>
                    </div>
                    <div class="status mb-3 bx bxs-circle"></div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>