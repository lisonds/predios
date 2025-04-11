document.addEventListener("DOMContentLoaded", () => {
    const inputElement = document.getElementById("searchInputPropietario");

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
     document.getElementById("tablaPropietarios").innerHTML = '';

     let formData = new FormData();
     formData.append('codigo', item);
     try {
         let resp = await fetch(`${base_url}/controlador/propietarios_control.php?propietario=busca_codigo`, {
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


if (document.querySelector("#generateCodigo")) {
    // Verificar si el botón existe
    const generateCodigo = document.getElementById("generateCodigo");

    if (generateCodigo) { 
        // Añadir el evento click al botón
        generateCodigo.addEventListener("click", () => {
            GenerarCod(); // Llamar a la función para generar el código
        });
    } else {
        console.warn("El botón con ID 'generateCodigo' no existe en el DOM.");
    }

    // Función asincrónica para generar el código
    async function GenerarCod() {
        try {
            // Llamada al servidor para obtener el JSON con el código generado
            let resp = await fetch(base_url + "/controlador/propietarios_control.php?propietario=generateCodigo");
            let json = await resp.json();

            // Verificar el estado de la respuesta
            if (json.status) {
                Swal.fire({
                    title: "Código Generado",
                    text: json.msg+" "+json.data.nuevo_codigo,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1800
                });

                // Asignar el código generado al campo de texto
                const searchInput = document.getElementById("searchInputPropietario");
                if (searchInput) {
                    searchInput.value = json.data.nuevo_codigo; // Asignar el código obtenido
                }
            } else {
                Swal.fire({
                    title: "Error",
                    text: json.msg || "No se pudo generar el código.",
                    icon: "error"
                });
            }
        } catch (error) {
            console.error("Error al generar el código:", error);
            Swal.fire({
                title: "Error",
                text: "Hubo un problema al conectar con el servidor.",
                icon: "error"
            });
        }
    }
}


/*DEL BUSCAR CODIGO SELECCIONADO VA AGREGAR AL MODAL PARA REGISTRAR PREDIO*/
document.getElementById('addPropietarioButton').addEventListener('click', function () {
    // Obtener el valor del input
    const codigo = document.getElementById('searchInputPropietario').value;

    // Mostrar el valor en el modal
    document.getElementById('codigoPropietario').textContent = codigo;
    // Actualiza el input oculto con el código para enviarlo
    document.getElementById('codigoGenerado').value = codigo;
});


async function buscarDNI() {
    const dni = document.getElementById('dni').value.trim();

    if (!/^\d{8}$/.test(dni)) {
        document.getElementById('resultado').innerHTML = "<p style='color: red;'>DNI inválido</p>";
        return;
    }

    try {
        const response = await fetch(`../../controlador/api_buscarXdni.php?dni=${dni}`);
        const data = await response.json();

        if (data.error) {
            alert(data.error);
        } else {
            // Asignar los valores obtenidos a los campos del formulario
            document.getElementById('nombres').value = data.nombres || "";
            document.getElementById('apellido_p').value = data.apellidoPaterno || "";
            document.getElementById('apellido_m').value = data.apellidoMaterno || "";
            Swal.fire({
                title: "Te faltan generar " + (1000 - Number(data.digitoVerificador)),
                text: "Solo puedes buscar 1000 DNIs",
                icon: "success",
                showConfirmButton: false,
                timer: 1800
            });
            
        }
    } catch (error) {
        console.error('Error al buscar DNI:', error);
        alert("Error al consultar la API.");
    }
}

//INGRESAR VALORES EN EL MODAL Y GUARDAR EN EL BASE DE DATOS 
if (document.querySelector("#formRegistroPropietarios")) {//AQUI se valida si existe el id formulario en html
    let frmPropietarios=document.querySelector("#formRegistroPropietarios");//
    frmPropietarios.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardarPropietarios();//lamar funcion guardar
    }

    async function btnGuardarPropietarios() {
        //extraer datos de cada input
        let strCodigo=document.querySelector("#codigoGenerado").value;
        let tip_contribuyente=document.querySelector("#contribuyente").value;
        let R_social=document.querySelector("#R_social").value;
        let dni=document.querySelector("#dni").value;
        let nombre=document.querySelector("#nombres").value;
        let apellidoP=document.querySelector("#apellido_p").value;
        let apellidoM=document.querySelector("#apellido_m").value;
        let direccion=document.querySelector("#direccion").value;
        let distrito=document.querySelector("#distrito").value;
        let provincia=document.querySelector("#provincia").value;
        let departamento=document.querySelector("#departamento").value;
        if (strCodigo==""||tip_contribuyente==""||R_social==""||dni==""
            ||nombre==""||apellidoP==""||apellidoM==""||direccion==""
            ||distrito==""||provincia==""||departamento==""
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
            const data=new FormData(formRegistroPropietarios);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            let resp=await fetch(base_url+"/controlador/propietarios_control.php?propietario=agregar_propietario",{
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
                  var modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistroPropietario'));
                    modal.hide();

                    document.querySelector("#tablaPropietarios").innerHTML = ""; // Limpiar la tabla para mosttrar de manera dinamica
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
