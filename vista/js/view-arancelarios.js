async function SeleccionarAnio(item) {
    //limipiamos la tabla 
    document.getElementById("tablaArancelarios").innerHTML = '';

    let formData = new FormData();
    formData.append('anio', item);
    //print_er
    try {
        let resp = await fetch(`${base_url}/controlador/propietarios_control.php?data=busca_anio`, {
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
                    newtr.id = "row_" + item.idpropietarios;

                    // Asignamos el contenido HTML a la fila
                    newtr.innerHTML = `
                        <td>${item.idpropietarios}</td>
                        <td>
                            <button 
                                class="btn btn-primary btn-sm" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#info${item.idpropietarios}" 
                                aria-expanded="false" 
                                aria-controls="info${item.idpropietarios}">
                                <i class="ri-menu-add-fill"></i>
                            </button>
                        </td>
                        <td style="text-transform: uppercase;">${item.nombre_completo}</td>
                        <td>${item.options}</td>
                        
                         `;

                    // Creamos la fila colapsable para la información extra
                    let collapseRow = document.createElement("tr");
                    collapseRow.className = "collapse";
                    collapseRow.id = `info${item.idpropietarios}`;
                    collapseRow.innerHTML = `
                        <td colspan="7" class="bg-light">
                            <div class="p-3 rounded border">
                                <!-- Diseño Vertical para Ubicación -->
                                <div class="d-flex flex-wrap gap-4 align-items-center">
                                    <div>
                                        <strong><i class="bi bi-geo-alt-fill"></i> Nombres:</strong> 
                                        <span class="text-primary">${item.direccion}</span>
                                    </div>
                                    
                                    
                                </div>

                                <hr class="my-2">

                                <!-- Diseño Horizontal para los Códigos -->
                                <div class="d-flex flex-wrap gap-4">
                                   <div>
                                        <strong><i class="bi bi-key-fill"></i> Distrito</strong> 
                                        <span class="text-success">${item.distrito}</span>
                                    </div>
                                    <div>
                                        <strong><i class="bi bi-key-fill"></i> Provincia</strong> 
                                        <span class="text-success">${item.provincia}</span>
                                    </div>
                                    <div>
                                        <strong><i class="bi bi-code-slash"></i> Departamento:</strong> 
                                        <span class="text-success">${item.departamento}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    `;

                    // Agregamos ambas filas (principal y colapsable) a la tabla
                    let tableBody = document.querySelector("#tablaPropietarios");
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



/*DEL BUSCAR CODIGO SELECCIONADO VA AGREGAR AL MODAL PARA REGISTRAR LISTA DE VALORES ARANCELARIOS*/
document.getElementById('addArancelarioButton').addEventListener('click', function () {
    // Obtener el valor del input
    const anio = document.getElementById('yearSelect').value;

    // Mostrar el valor en el modal
    //document.getElementById('anioSelect').textContent = anio;
    // Actualiza el input oculto con el código para enviarlo
    //document.getElementById('anioSelect').value = anio;
});

/*ESTE VA SER EL QUE CAPTURA FORMULARIO */
///console.log("llego aqui.....");
if (document.querySelector("#formAgregarAnio")) {//AQUI se valida si existe el id formulario en html
    let frmArancelarios=document.querySelector("#formAgregarAnio");//
    frmArancelarios.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardararancelario();//lamar funcion guardar
    }

    async function btnGuardararancelario() {
        //extraer datos de cada input
        let stranio=document.querySelector("#anioSelect").value;
        let strCategoria=document.querySelector("#categoriaSelect").value;
        let strmuros_columnas=document.querySelector("#muros_columnas").value;
        let strtechos=document.querySelector("#techos").value;
        let strpisos=document.querySelector("#pisos").value;
        let strpuertas_ventanas=document.querySelector("#puertas_ventanas").value;
        let strrevestimientos=document.querySelector("#revestimientos").value;
        let strbanos=document.querySelector("#banos").value;
        let strinstalaciones=document.querySelector("#instalaciones").value;

        if (stranio==""||strCategoria==""||strmuros_columnas==""||strtechos==""
            ||strpisos==""||strpuertas_ventanas==""||strrevestimientos==""||strbanos=="" || strinstalaciones==""
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Todo Los datos Son Importantes",
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            return;
        }
        try {
                        
            const data=new FormData(formAgregarAnio);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/arancelarios_control.php?data=agregar_datos_construccion",{
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
                  
                  frmArancelarios.reset();
                  //salir del modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById('addYearModal'));
                    modal.hide();

                    document.querySelector("#tablaArancelarios").innerHTML = ""; // Limpiar la tabla para mosttrar de manera dinamica
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


