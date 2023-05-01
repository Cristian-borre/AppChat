const signup=async ()=>{
    var name = document.querySelector("#Inputname").value;
        lastname = document.querySelector("#InputLastname").value;
        username = document.querySelector("#InputUsername").value;
        password = document.querySelector("#InputPassword").value;
        img = document.querySelector("#InputPicture").value;
        
    if(name.trim()===''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Campo Name no puede quedar vacio',
        })
        return;
    }
    if(lastname.trim()===''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Campo Lastname no puede quedar vacio',
        })
        return;
    }
    if(username.trim()===''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Campo Username no puede quedar vacio',
        })
        return;
    }
    if(password.trim()===''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Campo Password no puede quedar vacio',
        })
        return;
    }
    const form = document.querySelector(".signup form");
    const datos = new FormData(form);
    datos.append("name",name);
    datos.append("lastname",lastname);
    datos.append("username",username);
    datos.append("password",password);
    datos.append("img",img);

    var respuesta = await fetch("../controller/SignupController.php",{
        method:'POST',
        enctype: 'multipart/form-data',
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