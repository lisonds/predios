
/*ESTE VA SER EL QUE CAPTURA FORMULARIO */
if (document.querySelector("#formRegistroPredio")) {//AQUI se valida si existe el id formulario en html
    let frmPredio=document.querySelector("#formRegistroPredio");//
    frmPredio.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardarPredio();//lamar funcion guardar
    }

    async function btnGuardarPredio() {
        //extraer datos de cada input
        let strCodigo=document.querySelector("#codigoValor").value;
        let strDenomidado=document.querySelector("#predioDenominado").value;
        let strSector=document.querySelector("#sector").value;
        let strDistrito=document.querySelector("#distrito").value;
        let strProvincia=document.querySelector("#provincia").value;
        let strDepartaamento=document.querySelector("#departamento").value;
        let strCodPredial=document.querySelector("#codigoPredial").value;
        let strCodCatastral=document.querySelector("#codigoCatastral").value;

        if (strCodigo==""||strDenomidado==""||strSector==""||strDistrito==""
            ||strProvincia==""||strDepartaamento==""||strCodPredial==""||strCodCatastral==""
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Todo Los datos Son Inportantes",
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            return;
        }
        try {
            const data=new FormData(frmPredio);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/predio_control.php?predio=agregar_predio",{
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
                  
                  frmPredio.reset();
                  //salir del modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistroPredio'));
                    modal.hide();

                    document.querySelector("#tablaPredios").innerHTML = ""; // Limpiar la tabla para mosttrar de manera dinamica
                    buscarCodigo(strCodigo); // Llamar a la función para cargar la tabla actualizada
                    
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

