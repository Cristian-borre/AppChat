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
    if(img.trim()===''){
        Swal.fire({
            icon:'error',
            title:'ERROR',
            text:'Seleccione una imagen',
        })
        return;
    }

    const datos = new FormData();
    datos.append("name",name);
    datos.append("lastname",lastname);
    datos.append("username",username);
    datos.append("password",password);
    datos.append("img",img);

    var respuesta= await fetch("./register",{
        method:'POST',
        body:datos
    })

    var resultado = await respuesta.json();

    if(resultado.success==true){
        Swal.fire({
            icon:'success',
            title:'Exito!!',
            text:resultado.mensaje
        })
    }else{
        Swal.fire({
            icon:'error',
            title:'Error!!',
            text:resultado.mensaje
        })
    }
}