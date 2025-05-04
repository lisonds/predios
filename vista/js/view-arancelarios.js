document.addEventListener("DOMContentLoaded", () => {
    const inputElement = document.getElementById("selectAnio");

    if (inputElement) {
        // Variable para almacenar el número ingresado como cadena
        let anioIngresado = "";

        // Evento al quitar el foco (cuando el cursor deja de parpadear)
        inputElement.addEventListener("blur", function () {
            // Permitir solo números y rellenar con ceros a la izquierda
            this.value = this.value.replace(/\D/g, '').padStart(6, '0');

            // Actualizar la variable como una cadena
            numeroIngresado = String(this.value); // Aseguramos que sea una cadena
            

            // Llamar a la función buscarCodigo con la cadena
            SeleccionarAnio(anioIngresado);
        });
    }
});

async function SeleccionarAnio(item) {
    // Limpiar la tabla antes de cargar nuevos datos
    document.getElementById("tablaArancelarios").innerHTML = '';

    try {
        let formData = new FormData();
        formData.append('anio', item);

        let resp = await fetch(`${base_url}/controlador/arancelarios_control.php?data=obtener_datos_por_anio`, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });

        let json = await resp.json();

        if (json.status) {
            let data = json.data;

            if (data.length > 0) {
                data.forEach(item => {
                    let newRow = document.createElement("tr");
                    newRow.innerHTML = `
                        <td>${item.categoria}</td>
                        <td>${item["Muros y Columnas"]}</td>
                        <td>${item.Techos}</td>
                        <td>${item.Pisos}</td>
                        <td>${item["Puertas y Ventanas"]}</td>
                        <td>${item.Revestimientos}</td>
                        <td>${item.Baños}</td>
                        <td>${item.Instalaciones}</td>
                    `;
                    document.getElementById("tablaArancelarios").appendChild(newRow);
                });
            } else {
                Swal.fire({
                    icon: "info",
                    title: "Sin datos",
                    text: "No hay datos disponibles para este año"
                });
            }
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: json.msg
            });
        }
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: `Se produjo un error: ${error.message}`
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
                  
                 

            }else{
               
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: json.msg,
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
            }
            


            
        } catch (error) {
            Swal.fire({
                icon: "error",
                title: "Oops error Try Cach",
                text: error,
                footer: '<a href="#">Why do I have this issue?</a>'
              });
            
        }
    }
}


