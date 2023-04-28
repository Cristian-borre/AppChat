const login=()=>{
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
}