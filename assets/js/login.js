const login=async ()=>{
    var username = document.querySelector("#InputUsername").value;
         password = document.querySelector("#InputPassword").value;

    if(username.trim()==''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Campo Username no puede quedar vacio',
        })
        return;
    }
    if(password.trim()==''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Campo Password no puede quedar vacio',
        })
        return;
    }

    const datos = new FormData();
    datos.append("username",username);
    datos.append("password",password);

    var respuesta = await fetch("../controller/LoginController.php",{
        method:'POST',
        body:datos
    })

    var resultado = await respuesta.json();

    if(resultado.success==true){
        Swal.fire({
            icon:'success',
            title:'Exito!!',
            text:resultado.mensaje
        }).then(function() {
            window.location.href = resultado.url;
        });
    }else{
        Swal.fire({
            icon:'error',
            title:'Error!!',
            text:resultado.mensaje
        }).then(function() {
            window.location.href = resultado.url;
        });
    }
}