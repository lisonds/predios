document.addEventListener("DOMContentLoaded", () => {
  const inputElement = document.getElementById("yearSelect");

  if (inputElement) {
      inputElement.addEventListener("change", function () {
          const anioSeleccionado = this.value;

          // Llama a tu función que carga las tablas con los datos del año seleccionado
          SeleccionarAnio(anioSeleccionado);
      });
  }
});


async function SeleccionarAnio(anio) {
    const tablas = {
        'Cultivo Limpio': document.getElementById("tablaCultivoLimpio"),
        'Cultivo Permanente': document.getElementById("tablaCultivoPermanente"),
        'Pastos Naturales': document.getElementById("tablaPastosNaturales")
    };

    // Limpiar todas las tablas
    for (const key in tablas) {
        tablas[key].innerHTML = '';
    }

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

        if (json.status) {
            let datos = json.data;
            Object.keys(datos).forEach(grupo => {
                let tabla = tablas[grupo];
                if (tabla && datos[grupo].length > 0) {
                    datos[grupo].forEach(item => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${item.altitud}</td>
                            <td>${item.alta}</td>
                            <td>${item.media}</td>
                            <td>${item.baja}</td>
                            <td>${item.grupo_tierra}</td>
                        `;
                        tabla.appendChild(row);
                    });
                } else if (tabla) {
                    tabla.innerHTML = `<tr><td colspan="5" style="text-align: center;">No hay datos registrados para el año ${anio}</td></tr>`;
                }
            });
        } else {
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
            text: `Se produjo un error al obtener los datos: ${error.message}`
        });
    }
}




/*DEL BUSCAR CODIGO SELECCIONADO VA AGREGAR AL MODAL PARA REGISTRAR LISTA DE VALORES ARANCELARIOS*/
document.getElementById('addRusticoButton').addEventListener('click', function () {
  // Obtener el valor del input
  const anio = document.getElementById('yearSelect').value;

  // Mostrar el valor en el modal
  //document.getElementById('anioSelect').textContent = anio;
  // Actualiza el input oculto con el código para enviarlo
  //document.getElementById('anioSelect').value = anio;
});

/*ESTE VA SER EL QUE CAPTURA FORMULARIO */
///console.log("llego aqui.....");
if (document.querySelector("#formAgregarFila")) {//AQUI se valida si existe el id formulario en html
  let frmArancelarios=document.querySelector("#formAgregarFila");//
  frmArancelarios.onsubmit=function(e){//ejecutar al dar btn guardar
      e.preventDefault();//evitar que se recargue cuando damos el btn guardar
      btnGuardarRustico();//lamar funcion guardar
  }

  async function btnGuardarRustico() {
    let stranioArancelarioR = document.querySelector("#anioArancelarioR").value;
    let strAltitud = document.querySelector("#altitud").value;
    let strValorAlta = document.querySelector("#valorAlta").value;
    let strValorMedia = document.querySelector("#valorMedia").value;
    let strValorBaja = document.querySelector("#valorBaja").value;
    let strGrupoTierra = document.querySelector("#grupoTierra").value;

    if (
        stranioArancelarioR === "" || strAltitud === "" ||
        strValorAlta === "" || strValorMedia === "" ||
        strValorBaja === "" || strGrupoTierra === ""
    ) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Todos los campos son obligatorios"
        });
        return;
    }

    try {
        const data = new FormData(document.querySelector("#formAgregarFila"));

        let resp = await fetch(`${base_url}/controlador/TerrenoRustico_control.php?data=agregar_datos_rustico`, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: data
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

            // Agregar la nueva fila a la tabla correspondiente
            const tablaIdMap = {
                'Cultivo Limpio': 'tablaCultivoLimpio',
                'Cultivo Permanente': 'tablaCultivoPermanente',
                'Pastos Naturales': 'tablaPastosNaturales'
            };

            const tabla = document.getElementById(tablaIdMap[strGrupoTierra]);
            if (tabla) {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${strAltitud}</td>
                    <td>${strValorAlta}</td>
                    <td>${strValorMedia}</td>
                    <td>${strValorBaja}</td>
                    <td>${strGrupoTierra}</td>
                `;
                tabla.appendChild(row);
            }

            // Limpiar formulario
            document.querySelector("#formAgregarFila").reset();

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
            title: "Error en la conexión",
            text: error
        });
    }
}

}


