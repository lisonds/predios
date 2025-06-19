
document.addEventListener("DOMContentLoaded", function() {
            // Este código se ejecuta cuando el DOM ya ha sido cargado
            getExtraeranio();
            getMostrarDator();
            // Aquí va cualquier otra función o código que desees ejecutar
});
/*se extrae toda la tabla  los datos ingresador  */
async function getMostrarDator(){
    try {
    const resp = await fetch(`${base_url}/controlador/ValorImpusitiva_control.php?data=extraer_data`);
     json= await resp.json(); //le conveertimos a json.
            if(json.status){ //el estatus cuando tienen datos biene verdadero
                let data=json.data;//a data asignamos los datos
                // Limpiar el contenido de la tabla antes de llenarla
                document.querySelector("#tablaValorMinimo").innerHTML = "";
                data.forEach(item => { //iteramos por cantidad de datos
                    let newtr=document.createElement("tr");
                    newtr.id="row_"+item.idImpusitiva_Tributaria;
                    newtr.innerHTML=`<tr>
                                        
                                        <td>${item.anio}</td>
                                        <td>${item.UIT}</td>
                                        <td>${item.base_Legal}</td>
                                        <td>${item.Observaciones}</td>
                                        <td>${item.options}</td>
                                        
                                        
                                    </tr>`;
                    document.querySelector("#tablaValorMinimo").appendChild(newtr);//asigna el segmento de html dentro de id
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
/*se extrae datos  lara la lista desplegable */
async function getExtraeranio() {
     try {
        const resp = await fetch(`${base_url}/controlador/ValorImpusitiva_control.php?data=extraer_anio`);
        const data = await resp.json();

        const select = document.getElementById("yearSelect");
        select.innerHTML = ''; // Limpia las opciones anteriores

        // Opción por defecto
        const defaultOption = document.createElement("option");
        defaultOption.value = "0";
        defaultOption.textContent = "Año";
        defaultOption.selected = true;
        select.appendChild(defaultOption);

        if (data.status) {
            data.data.forEach(item => {
                // Si el backend devuelve objetos con clave 'año_registro'
                const year = item.anio ?? item; // usa solo 'item' si solo vienen años como números
                const option = document.createElement("option");
                option.value = year;
                option.textContent = year;
                select.appendChild(option);
            });
        } else {
            // Si no hay datos, podrías mostrar un mensaje o dejar solo la opción por defecto
            console.warn(data.msg);
        }
    } catch (error) {
        Swal.fire({
            title: "Error",
            text: `Se produjo un error : ${error.message}`,
            icon: "error"
        });
    }
}


/*PARA EXTRAR LOS DATOS A LA TABLA AL SELECCIONAR EL ANIO*/
document.getElementById("yearSelect").addEventListener("change", function () {
    const añoSeleccionado = this.value;

    if (añoSeleccionado !== "0") {

        dataPorAnioSelect(añoSeleccionado);
        
        // Aquí puedes hacer lo que necesites con el valor seleccionado
        // Por ejemplo: cargar datos, filtrar información, etc.
    } 
});

async function dataPorAnioSelect(item) {
      // Limpiamos las tablas
    document.getElementById("tablaCultivoLimpio").innerHTML = '';
    document.getElementById("tablaCultivoPermanente").innerHTML = '';
    document.getElementById("tablaPastos").innerHTML = '';
    document.getElementById("tablaTierrasAridas").innerHTML = '';

    let formData = new FormData();
    formData.append('anio', item);

    try {
        let resp = await fetch(base_url + "/controlador/TerrenoRustico_control.php?data=extraer_data_anio", {
            method: 'POST',
            body: formData
        });

        let json = await resp.json();

        if (json.status) {
            const data = json.data;

            // Función para agregar filas a la tabla
            const insertarFilas = (lista, tbodyId) => {
                const tbody = document.getElementById(tbodyId);
                if (!lista || lista.length === 0) return;

                lista.forEach(fila => {
                    const tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${fila.altura_terreno}</td>
                        <td>${fila.alta}</td>
                        <td>${fila.media}</td>
                        <td>${fila.baja}</td>
                    `;
                    tbody.appendChild(tr);
                });
            };

            // Insertar según tipo de tierra
            insertarFilas(data["Tierras aptas para cultivo limpio"], 'tablaCultivoLimpio');
            insertarFilas(data["Tierras aptas para cultivo permanente"], 'tablaCultivoPermanente');
            insertarFilas(data["Tierras aptas para pastos"], 'tablaPastos');
            insertarFilas(data["Tierras eriazas"], 'tablaTierrasAridas');

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
            text: `Se produjo un error : ${error.message}`,
            icon: "error"
        });
    }
}



/*SE VA GUARDAR EL FORMULARIO QUE CAPTURA EN EL BASE DE DATOS*/
if (document.querySelector("#formAgregarValorImpusitiva")) {//AQUI se valida si existe el id formulario en html
    let frmValorImpusitiva=document.querySelector("#formAgregarValorImpusitiva");//
    frmValorImpusitiva.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardarValorImpusitiva();//lamar funcion guardar
    }
    async function btnGuardarValorImpusitiva() {
        //extraer datos de cada input
       
        
            const formData=new FormData(frmValorImpusitiva);//a qui le mandamos todo el objeto del formulario por que tienen todo los elementos del frm
            const añoSeleccionado= formData.get("anioImpusitivaR");
            try {
                let resp = await fetch(`${base_url}/controlador/ValorImpusitiva_control.php?data=agregar_datos_uit`, {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: formData
                });

                const responseText = await resp.text();
                const json = JSON.parse(responseText);

                if (json.status) {
                    dataPorAnioSelect(añoSeleccionado);
                    Swal.fire({
                        icon: "success",
                        title: json.msg,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    getMostrarDator();

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








async function SeleccionarAnio(anio) {
    // Limpiar todas las tablas
    document.getElementById("tablaCultivoLimpio").innerHTML = "";
    document.getElementById("tablaCultivoPermanente").innerHTML = "";
    document.getElementById("tablaOtroGrupo").innerHTML = "";

    try {
        const formData = new FormData();
        formData.append('anio', anio);

        const resp = await fetch(`${base_url}/controlador/TerrenoRustico_control.php?data=obtener_datos_por_anio`, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });

        const json = await resp.json();

        if (json.status && Array.isArray(json.data)) {
            json.data.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${item.altitud}</td>
                    <td>${item.alta}</td>
                    <td>${item.media}</td>
                    <td>${item.baja}</td>
                    <td>${item.grupo_tierra}</td>
                `;

                switch (item.grupo_tierra.toLowerCase()) {
                    case "cultivo limpio":
                        document.getElementById("tablaCultivoLimpio").appendChild(row);
                        break;
                    case "cultivo permanente":
                        document.getElementById("tablaCultivoPermanente").appendChild(row);
                        break;
                    default:
                        document.getElementById("tablaOtroGrupo").appendChild(row);
                        break;
                }
            });
        } else {
            const mensaje = `<tr><td colspan="5" style="text-align: center;">No hay datos para el año ${anio}</td></tr>`;
            document.getElementById("tablaCultivoLimpio").innerHTML = mensaje;
            document.getElementById("tablaCultivoPermanente").innerHTML = mensaje;
            document.getElementById("tablaOtroGrupo").innerHTML = mensaje;

            Swal.fire({
                icon: "info",
                title: "Sin datos",
                text: `No se encontraron registros para el año ${anio}`
            });
        }
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: `Error al obtener datos: ${error.message}`
        });
    }
}




