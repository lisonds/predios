document.addEventListener("DOMContentLoaded", () => {
    const inputElement = document.getElementById("searchInputPredio");

    if (inputElement) {
        // Variable para almacenar el número ingresado como cadena
        let numeroIngresado = "";

        // Evento al quitar el foco (cuando el cursor deja de parpadear)
        inputElement.addEventListener("blur", function () {
            // Permitir solo números y rellenar con ceros a la izquierda
            this.value = this.value.replace(/\D/g, '').padStart(6, '0');

            // Actualizar la variable como una cadena
            numeroIngresado = String(this.value); // Aseguramos que sea una cadena
            

            // Llamar a la función buscarCodigo con la cadena
            buscarCodigo(numeroIngresado);
        });
    }
});

async function buscarCodigo(item) {
    //limipiamos la tabla 
    document.getElementById("tablaPredios").innerHTML = '';

    let formData = new FormData();
    formData.append('codigo', item);
    try {
        let resp = await fetch(`${base_url}/controlador/predio_control.php?predio=busca_codigo`, {
            method: 'POST', // Enviar con el método POST
            mode: 'cors',
            cache: 'no-cache', // No guardar en caché
            body: formData
          });
          // Convertimos la respuesta a JSON
            let json = await resp.json(); 

            // Verificamos el estado de la respuesta
            if (json.status) { 
                let data = json.data; // Asignamos los datos de la respuesta a `data`

                // Iteramos por cada elemento en `data`
                data.forEach(item => {
                    // Creamos una nueva fila
                    let newtr = document.createElement("tr");
                    newtr.id = "row_" + item.idpredios;

                    // Asignamos el contenido HTML a la fila
                    newtr.innerHTML = `
                        <td>${item.idpredios}</td>
                        <td>
                            <button 
                                class="btn btn-primary btn-sm" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#info${item.idpredios}" 
                                aria-expanded="false" 
                                aria-controls="info${item.idpredios}">
                                <i class="ri-menu-add-fill"></i>
                            </button>
                        </td>
                        <td style="text-transform: uppercase;">Predio Denominado ${item.denominado} en el Sector ${item.sector}</td>
                        <td>${item.options}</td>
                        
                        
                    `;

                    // Creamos la fila colapsable para la información extra
                    let collapseRow = document.createElement("tr");
                    collapseRow.className = "collapse";
                    collapseRow.id = `info${item.idpredios}`;
                    collapseRow.innerHTML = `
                        <td colspan="7" class="bg-light">
                            <div class="p-3 rounded border">
                                <!-- Diseño Vertical para Ubicación -->
                                <div class="d-flex flex-wrap gap-4 align-items-center">
                                    <div>
                                        <strong><i class="bi bi-geo-alt-fill"></i> En El Distrito de:</strong> 
                                        <span class="text-primary">${item.distrito}</span>
                                    </div>
                                    <div>
                                        <strong><i class="bi bi-map-fill"></i> Provincia de:</strong> 
                                        <span class="text-primary">${item.provincia}</span>
                                    </div>
                                    <div>
                                        <strong><i class="bi bi-globe"></i> Departamento de:</strong> 
                                        <span class="text-primary">${item.departamento}</span>
                                    </div>
                                </div>

                                <hr class="my-2">

                                <!-- Diseño Horizontal para los Códigos -->
                                <div class="d-flex flex-wrap gap-4">
                                    <div>
                                        <strong><i class="bi bi-key-fill"></i> Código Predial:</strong> 
                                        <span class="text-success">${item.cod_predial}</span>
                                    </div>
                                    <div>
                                        <strong><i class="bi bi-code-slash"></i> Código Catastral:</strong> 
                                        <span class="text-success">${item.cod_catastral}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    `;

                    // Agregamos ambas filas (principal y colapsable) a la tabla
                    let tableBody = document.querySelector("#tablaPredios");
                    tableBody.appendChild(newtr);
                    tableBody.appendChild(collapseRow);
                });
            }else{
                Swal.fire({
                    title: "Error",
                    text: json.msg,
                    icon: "error"
                  });
            }
    } catch (error) {
        Swal.fire({
            title: "Error",
            text: `Se produjo un error : ${error.message}`,
            icon: "error"
          });
    }
}

/*DEL BUSCAR CODIGO SELECCIONADO VA AGREGAR AL MODAL PARA REGISTRAR PREDIO*/
document.getElementById('addPredioButton').addEventListener('click', function () {
    // Obtener el valor del input
    const codigo = document.getElementById('searchInputPredio').value;

    // Mostrar el valor en el modal
    document.getElementById('codigoPredio').textContent = codigo;
    // Actualiza el input oculto con el código para enviarlo
    document.getElementById('codigoValor').value = codigo;
});

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

/*Para editar Formulario de  modal */
document.addEventListener('click', async function(e) {///a qui se esta llamando a la funcion asincrona tener en cuenta
    if (e.target.matches('[data-bs-target="#modalEditarPredio"]')) {
        // Obtener el ID de usuario y colocarlo en el campo oculto
        const idPredio = e.target.getAttribute('data-idpredio');
        // Crear el objeto FormData
        let formData = new FormData();
        formData.append('idPredio', idPredio);
        try {
            let resp = await fetch(base_url + "/controlador/predio_control.php?predio=verPredio", {
                method: 'POST',    // Enviar con el método POST
                mode: 'cors',
                cache: 'no-cache', // No guardar en caché
                body: formData
            });
            json=await resp.json();
            if (json.status) {
                // Asignar valores
                document.querySelector("#idPredioEdit").value = json.data.idpredios;
                document.querySelector("#predioDenominadoEdit").value = json.data.denominado;
                document.querySelector("#sectorEdit").value = json.data.sector;
                document.querySelector("#distritoEdit").value = json.data.distrito;
                document.querySelector("#provinciaEdit").value = json.data.provincia;
                document.querySelector("#departamentoEdit").value = json.data.departamento;
                document.querySelector("#codigoPredialEdit").value = json.data.cod_predial;
                document.querySelector("#codigoCatastralEdit").value = json.data.cod_catastral;
            
                            
            } else {
                console.error("Error: No se pudo cargar el predio.");
            }
        } catch (error) {
            console.error("Error en la solicitud:", error);
        }
    }
})
//para Editar Predios tenemos que llenar el formulario con los datos 
if (document.querySelector("#formEditarPredio")) {//AQUI se valida si existe el id formulario en html
    let frmEditar=document.querySelector("#formEditarPredio");//
    frmEditar.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnEditarPredio();//lamar funcion guardar
    }
    async function btnEditarPredio() {
        let strId=document.querySelector("#idPredioEdit").value;
        let strDenomidado=document.querySelector("#predioDenominadoEdit").value;
        let strSector=document.querySelector("#sectorEdit").value;
        let strDistrito=document.querySelector("#distritoEdit").value;
        let strProvincia=document.querySelector("#provinciaEdit").value;
        let strDepartaamento=document.querySelector("#departamentoEdit").value;
        let strCodPredial=document.querySelector("#codigoPredialEdit").value;
        let strCodCatastral=document.querySelector("#codigoCatastralEdit").value;

        if (strId==""||strDenomidado==""||strSector==""||strDistrito==""
            ||strProvincia==""||strDepartaamento==""||strCodPredial==""||strCodCatastral=="") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "completar los datos",
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            return;
        }
        try {
            const data=new FormData(formEditarPredio);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/predio_control.php?predio=UpDate",{
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
                  var modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarPredio'));
                    modal.hide();

                    document.querySelector("#tablaPredios").innerHTML = "";// Limpiar la tabla para mosttrar de manera dinamica
                    const valorInput = document.getElementById("searchInput").value;

                    // Guardar en una variable de tipo string
                    const textoIngresado = valorInput;
                    buscarCodigo(textoIngresado); // Llamar a la función para cargar la tabla actualizada
                    
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
            
        }
    }
}


function DeletePredio(item){
    
    Swal.fire({
      title: "Desea Eliminar Un Predio?",
      text: "Esta Informacion Se Eliminara!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Eliminar!"
    }).then((result) => {
      if (result.isConfirmed) {
        eliminarPredio(item);
      }
    });
  }
async function eliminarPredio(id){
    let formData = new FormData();
    formData.append('idPredios', id);
  
    try {
      let resp = await fetch(`${base_url}/controlador/predio_control.php?predio=Delete`, {
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
          title: "Predio Eliminado",
          text: json.msg,
          icon: "success"
        });
  
        // Actualizar la tabla de usuarios
        document.querySelector("#tablaPredios").innerHTML = "";// Limpiar la tabla para mosttrar de manera dinamica
        const valorInput = document.getElementById("searchInput").value;

        // Guardar en una variable de tipo string
        const textoIngresado = valorInput;
        buscarCodigo(textoIngresado); //
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
        text: `Se produjo un error al eliminar un Usuario: ${error.message}`,
        icon: "error"
      });
    }
}