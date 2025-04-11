if (document.querySelector("#tblbodyUsuarios")) {
    async function getUsuario() {
        try {//ningun mensaje debe anteceder
            let resp= await fetch(base_url+"/controlador/login_control.php?op=login");//de este url se saca el json
            json= await resp.json(); //le conveertimos a json.
            if(json.status){ //el estatus cuando tienen datos biene verdadero
                let data=json.data;//a data asignamos los datos
                data.forEach(item => { //iteramos por cantidad de datos
                    let newtr=document.createElement("tr");
                    newtr.id="row_"+item.idtb_usuario;
                    newtr.innerHTML=`<tr>
                                        <td>${item.idtb_usuario}</td>
                                        <td>${item.codigo}</td>
                                        <td>${item.correo}</td>
                                        <td>${item.usuario}</td>
                                        <td>${item.password}</td>
                                        <td>${item.options}</td>
                                        
                                        
                                    </tr>`;
                    document.querySelector("#tblbodyUsuarios").appendChild(newtr);//asigna el segmento de html dentro de id
                });
                
            }
            
        } catch (error) {
            console.error("Ocurrió un error:", error);
        }
    }
    
    getUsuario();
    }


if (document.querySelector("#formRegistroUsuario")) {//AQUI se valida si existe el id formulario en html
    let frmRegistro=document.querySelector("#formRegistroUsuario");//
    frmRegistro.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardar();//lamar funcion guardar
    }
    async function btnGuardar() {
        //extraer datos de cada input
        let strCodigo=document.querySelector("#codigoUsuario").value;
        let strCorreo=document.querySelector("#correoUsuario").value;
        let strUsuario=document.querySelector("#nombreUsuario").value;
        let strContrasenia=document.querySelector("#contrasenaUsuario").value;

        if (strCodigo==""||strCorreo==""||strUsuario==""||strContrasenia=="") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "completar los datos",
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            return;
        }
        try {
            const data=new FormData(frmRegistro);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/login_control.php?op=register",{
                method:'POST',//mandar post
                mode:'cors',
                cache:'no-cache',// para que no guarde en cache
                body: data
            });//con este codigo se mando un POST  AL ESE URL 
            const responseText = await resp.text(); // Leer como texto primero LO QUE deberia retornar en json
                   
            // Intenta convertir el texto a JSON
            const json = JSON.parse(responseText);
            
            if(json.status){//el mensaje de error se debe mostrar en SWALLLL
                Swal.fire({//mostrar mensaje
                    icon: "success",
                    title: json.msg,//aqui vamos mostrar mensaje
                    showConfirmButton: false,
                    timer: 1500
                  });
                  
                  frmRegistro.reset();
                  //salir del modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistroUsuario'));
                    modal.hide();

                    document.querySelector("#tblbodyUsuarios").innerHTML = ""; // Limpiar la tabla para mosttrar de manera dinamica
                    getUsuario(); // Llamar a la función para cargar la tabla actualizada
                    
                    //location.reload();//volver a cargar la pagina para ver los resultados 

            }else{
               
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: json.msg,
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
            }
            



        } catch (error) {
            console.log("Ocurrio un Error: "+error);
        }
    }
}


/*Para editar Formulario de  modal */
document.addEventListener('click', async function(e) {///a qui se esta llamando a la funcion asincrona tener en cuenta
    if (e.target.matches('[data-bs-target="#modalEditarUsuario"]')) {
        
        
        // Obtener el ID de usuario y colocarlo en el campo oculto
        const idUsuario = e.target.getAttribute('data-idusuario');
        
        // Crear el objeto FormData
        let formData = new FormData();
        formData.append('idUsuario', idUsuario);

        try {
            let resp = await fetch(base_url + "/controlador/login_control.php?op=verUsuario", {
                method: 'POST',    // Enviar con el método POST
                mode: 'cors',
                cache: 'no-cache', // No guardar en caché
                body: formData
            });
            json=await resp.json();
            if(json.status){
                document.querySelector("#codigoUsuarioEditra").value=json.data.codigo;
                document.querySelector("#correoUsuarioEditar").value=json.data.correo;
                document.querySelector("#nombreUsuarioEditar").value=json.data.usuario;
                document.querySelector("#passwordEditar").value=json.data.password;
                document.querySelector("#idtb_usuario").value=json.data.idtb_usuario;
            }else{
                window.location=base_url+'vista/user.php';
            }
        } catch (error) {
            
        }
    }
});


//formulario para editar mensajes llenados
if (document.querySelector("#formEditarUsuario")) {//AQUI se valida si existe el id formulario en html
    let frmEditar=document.querySelector("#formEditarUsuario");//
    frmEditar.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnEditar();//lamar funcion guardar
    }
    async function btnEditar() {
        //extraer datos de cada input
        let strCodigo=document.querySelector("#codigoUsuarioEditra").value;
        let strCorreo=document.querySelector("#correoUsuarioEditar").value;
        let strUsuario=document.querySelector("#nombreUsuarioEditar").value;
        let strContrasenia=document.querySelector("#passwordEditar").value;
        let id=document.querySelector("#idtb_usuario").value;

        if (strCodigo==""||strCorreo==""||strUsuario==""||strContrasenia==""||id=="") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "completar los datos",
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            return;
        }
        try {
            const data=new FormData(formEditarUsuario);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/login_control.php?op=editar",{
                method:'POST',//mandar post
                mode:'cors',
                cache:'no-cache',// para que no guarde en cache
                body: data
            });//con este codigo se mando un POST  AL ESE URL 
            const responseText = await resp.text(); // Leer como texto primero LO QUE deberia retornar en json
                   
            // Intenta convertir el texto a JSON
            const json = JSON.parse(responseText);
            
            if(json.status){//el mensaje de error se debe mostrar en SWALLLL
                Swal.fire({//mostrar mensaje
                    icon: "success",
                    title: json.msg,//aqui vamos mostrar mensaje
                    showConfirmButton: false,
                    timer: 1800
                  });
                  
                  
                  //salir del modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarUsuario'));
                    modal.hide();

                    document.querySelector("#tblbodyUsuarios").innerHTML = "";// Limpiar la tabla para mosttrar de manera dinamica
                    getUsuario(); // Llamar a la función para cargar la tabla actualizada
                    
                    //location.reload();//volver a cargar la pagina para ver los resultados 

            }else{
               
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: json.msg,
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
            }
            



        } catch (error) {
            console.log("Ocurrio un Error: "+error);
        }
    }
}


function UpdateUsuario(item){
    
    Swal.fire({
      title: "Desea Eliminar?",
      text: "Esta Informacion Se Eliminara!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Eliminar!"
    }).then((result) => {
      if (result.isConfirmed) {
        eliminarUsuario(item);
      }
    });
  }



  async function eliminarUsuario(item) {
    let formData = new FormData();
    formData.append('idUsuario', item);
  
    try {
      let resp = await fetch(`${base_url}/controlador/login_control.php?op=userEliminar`, {
        method: 'POST', // Enviar con el método POST
        mode: 'cors',
        cache: 'no-cache', // No guardar en caché
        body: formData
      });
  
      // Verificar que la respuesta sea válida
      if (!resp.ok) {
        throw new Error(`Error en la solicitud: ${resp.status}`);
      }
  
      let json = await resp.json(); // Convertir la respuesta a JSON
  
      if (json.status) {
        Swal.fire({
          title: "Eliminado",
          text: json.msg,
          icon: "success"
        });
  
        // Actualizar la tabla de usuarios
        document.querySelector("#tblbodyUsuarios").innerHTML = ""; // Limpiar la tabla
        getUsuario(); // Recargar datos dinámicamente
      } else {
        Swal.fire({
          title: "Error",
          text: json.msg,
          icon: "error"
        });
      }
    } catch (error) {
      Swal.fire({
        title: "Error",
        text: `Se produjo un error al eliminar el usuario: ${error.message}`,
        icon: "error"
      });
    }
  }
  //PARA HACER EL LOGIN CORRESPONDIENTE
  //formulario para editar mensajes llenados
if (document.querySelector("#formLogin")) {//AQUI se valida si existe el id formulario en html
    let frmLogin=document.querySelector("#formLogin");//
    frmLogin.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnLogin();//lamar funcion guardar
    }
    async function btnLogin() {
        //extraer datos de cada input
        let strUsername=document.querySelector("#usernameLogin").value;
        let strPassword=document.querySelector("#passwordLogin").value;
        

        if (strUsername==""||strPassword=="") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Debe completar los datos",
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            return;
        }
        try {
            const data=new FormData(frmLogin);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/login_control.php?op=IngresarLogin",{
                method:'POST',//mandar post
                mode:'cors',
                cache:'no-cache',// para que no guarde en cache
                body: data
            });//con este codigo se mando un POST  AL ESE URL 
            /********** */
            const responseText = await resp.text(); // Leer como texto primero LO QUE deberia retornar en json
                   
            // Intenta convertir el texto a JSON
            const json = JSON.parse(responseText);
            
            if(json.status){//el mensaje de error se debe mostrar en SWALLLL
                Swal.fire({//mostrar mensaje
                    icon: "success",
                    title: json.msg,//aqui vamos mostrar mensaje
                    showConfirmButton: false,
                    timer: 1800
                  }).then(() => {
                                
                    // Redirigir a user.php
                    window.location.href = base_url+"/vista/index.php";
                });

            }else{
               
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: json.msg,
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
            }
            



        } catch (error) {
            console.log("Ocurrio un Error: "+error);
        }
    }
}

  