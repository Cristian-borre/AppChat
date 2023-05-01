<?php
    $valid['success']=array('success'=>false,'mensaje'=>"",'url'=>"");

    if(isset($_POST['name']) && isset($_POST['lastname']) &&
    isset($_POST['username']) && isset($_POST['password'])){

        $username = $_POST['username'];
        $img = $_POST['img'];
        include '../core/Database.php';

        $sql = "SELECT username FROM usuarios WHERE username = '$username'";
        $stmt = $con->prepare($sql);
        $stmt->execute([$username]);
        if($stmt->rowCount() > 0){
            $valid['success'] = false;
            $valid['mensaje'] = "El username $username ya existe!!";
            $valid['url']='../view/signup.php';
        }else{

            if(isset($_FILES['img'])){
                $img_name = $_FILES['img']['name'];
                $tmp_name = $_FILES['img']['tmp_name'];

                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);

                $allowed_exs = ["png","jpg","jpeg"];

                if(in_array($img_ext, $allowed_exs) === true){
                    $new_img_name = $username.$img_name;
                    $img_upload_path = '../upload/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);

                    if(isset($new_img_name)){
                        include '../model/UsuariosModel.php';
                        $usuarios = new UsuariosModel();
                        $usuarios->name=$_POST['name'];
                        $usuarios->lastname=$_POST['lastname'];
                        $usuarios->username=$_POST['username'];
                        $usuarios->password=password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $usuarios->img=$new_img_name;
                        if($usuarios->AddUsuariosimg()){
                            $valid['success'] = true;
                            $valid['mensaje'] = "Usuario registrado correctamente!!";
                            $valid['url']='../view/login.php';
                        }else{
                            $valid['success'] = false;
                            $valid['mensaje'] = "Hubo un error al registrar el usuario!!";
                            $valid['url']='../view/signup.php';
                        }
                    }else{
                        include '../model/UsuariosModel.php';
                        $usuarios = new UsuariosModel();
                        $usuarios->name=$_POST['name'];
                        $usuarios->lastname=$_POST['lastname'];
                        $usuarios->username=$_POST['username'];
                        $usuarios->password=password_hash($_POST['password'], PASSWORD_BCRYPT);
                        if($usuarios->AddUsuarios()){
                            $valid['success'] = true;
                            $valid['mensaje'] = "Usuario registrado correctamente!!";
                            $valid['url']='../view/login.php';
                        }else{
                            $valid['success'] = false;
                            $valid['mensaje'] = "Hubo un error al registrar el usuario!!";
                            $valid['url']='../view/signup.php';
                        }
                    }
                }else{
                    $valid['success'] = false;
                    $valid['mensaje'] = "No puedes usar este tipo de archivo!!";
                    $valid['url']='../view/signup.php';
                }
            }else{
                $valid['success'] = false;
                $valid['mensaje'] = "Null";
                $valid['url']='../view/signup.php';
            }
        }
    }

    echo json_encode($valid);
?>