
/*PARA EXTRAR LOS DATOS A LA TABLA AL SELECCIONAR MATERIAL PREDOMINANTE*/
document.getElementById("materialPredominante").addEventListener("change", function () {
    const MatPredominante = this.value;

    if (MatPredominante !== "0") {

        dataPorMatPredominante(MatPredominante);
        
        // Aquí puedes hacer lo que necesites con el valor seleccionado
        // Por ejemplo: cargar datos, filtrar información, etc.
    } 
});

async function dataPorMatPredominante(item) {
     

    let formData = new FormData();
    formData.append('matPredominante', item);

    try {
        let resp = await fetch(base_url + "/controlador/ValorDepreciacion_control.php?data=extraer_data_clasificacion", {
            method: 'POST',
            body: formData
        });

        json= await resp.json(); //le conveertimos a json.
            if(json.status){ //el estatus cuando tienen datos biene verdadero
                let data=json.data;//a data asignamos los datos
                // Limpiar el contenido de la tabla antes de llenarla
                document.querySelector("#tablaDepreciacion").innerHTML = "";
                data.forEach(item => { //iteramos por cantidad de datos
                    let newtr=document.createElement("tr");
                    newtr.id="row_"+item.iidDepreciacion;
                    newtr.innerHTML=`<tr>
                                        
                                        <td>De ${item.aniomin} Hasta ${item.aniomax}</td>
                                        <td>${item.material}</td>
                                        <td>${item.muyBueno}</td>
                                        <td>${item.bueno}</td>
                                        <td>${item.regular}</td>
                                        <td>${item.malo}</td>
                                        
                                        
                                    </tr>`;
                    document.querySelector("#tablaDepreciacion").appendChild(newtr);//asigna el segmento de html dentro de id
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



/*SE VA GUARDAR EL FORMULARIO QUE CAPTURA EN EL BASE DE DATOS*/
if (document.querySelector("#formAgregarDepreciacion")) {//AQUI se valida si existe el id formulario en html
    let frmValorDepreciacion=document.querySelector("#formAgregarDepreciacion");//
    frmValorDepreciacion.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardarDepreciacion();//lamar funcion guardar
    }
    async function btnGuardarDepreciacion() {
        //extraer datos de cada input
             // Crear FormData a partir del formulario
            const formData = new FormData(frmValorDepreciacion);

            // Añadir input externo al formulario
            const valorClasificacion = document.getElementById("materialPredominante")?.value || "";
            formData.append('clasificacion', valorClasificacion);
            
            try {
                let resp = await fetch(`${base_url}/controlador/ValorDepreciacion_control.php?data=agregar_datos_depreciacion`, {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: formData
                });

                const responseText = await resp.text();
                const json = JSON.parse(responseText);

                if (json.status) {
                    
                    Swal.fire({
                        icon: "success",
                        title: json.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                    dataPorMatPredominante(valorClasificacion );

                    // Limpiar el formulario
                   

                    // Recargar las tablas con el año actual
                    //const anio = document.getElementById("anioArancelarioR").value;
                    //SeleccionarAnio(anio);
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
                    text: `Ocurrió un error: ${error.message}`
                });
            }
    }
}

/*FIN DEL FORMULARIO QUE SE VA GUARDAR */



