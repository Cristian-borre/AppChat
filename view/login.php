<?php
    session_start();

    if(!isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="login col-auto h-auto text-center shadow-lg p-5 rounded-5">
        <div>
            <form>
                <div class="head">
                    <h1 class="title m-0 mb-3 p-0">Login</h1>
                </div>
                <div class="body">
                    <div class="mb-4 mt-4 form-floating">
                        <input type="text" class="form-control" placeholder="Username" id="InputUsername">
                        <label for="InputUsername">Username</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <input type="password" class="form-control" placeholder="Password" id="InputPassword">
                        <label for="InputPassword">Password</label>
                    </div>
                </div>
                <div class="footer">
                    <button type="button" class="btn btn-dark mb-3 fs-5 w-75 mt-3" onclick="login()">Sign In</button>
                    <p>No tienes cuenta?? <a href="signup.php">SignUp now</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    }else{
        header('Location: home.php');
        exit;
    }
?>