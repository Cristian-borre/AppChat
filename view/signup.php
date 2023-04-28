<?php 
    namespace View;
    require_once(__DIR__.'../../vendor/autoload.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="m-0 row justify-content-center align-items-center">
    <div class="signup col-auto h-auto shadow-lg p-5 rounded-5">
        <div>
            <form action="./home">
                <div class="head">
                    <h1 class="title text-center m-0 mb-3 p-0">Register</h1>
                </div>
                <div class="body">
                    <div class="row g-2 mb-4 mt-4">
                        <div class="col form-floating">
                            <input type="text" class="form-control" placeholder="Name" id="Inputname">
                            <label for="Inputname">Name</label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control" placeholder="Last name" id="InputLastname">
                            <label for="InputLastname">Last name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" placeholder="Username" id="InputUsername">
                        <label for="InputUsername">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" placeholder="Password" id="InputPassword">
                        <label for="InputPassword">Password</label>
                    </div>
                    <div class="mb-4">
                        <label for="InputPicture" class="text-start form-label fs-5">Picture</label>
                        <input type="file" class="form-control" placeholder="Picture" id="InputPicture">
                    </div>
                </div>
                <div class="footer text-center">
                    <button type="submit" class=" btn btn-dark mb-3 fs-5 w-75 mt-3" >Sign Up</button>
                    <p>Ya tienes cuenta?? <a href="./login">SignIn now</a></p>
                </div>
            </form>
        </div>
    </div>    
    <script src="./assets/js/signup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>