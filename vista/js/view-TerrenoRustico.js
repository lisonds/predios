document.getElementById('addRusticoButton').addEventListener('click', function () {
    const anio = document.getElementById('yearSelect').value;
    document.getElementById('anioArancelarioR').value = anio;
});

document.addEventListener("DOMContentLoaded", () => {
    const inputElement = document.getElementById("yearSelect");

    if (inputElement) {
        inputElement.addEventListener("change", function () {
            const anioSeleccionado = this.value;
            SeleccionarAnio(anioSeleccionado);
        });
    }

    // Botón guardar del formulario
    if (document.querySelector("#formAgregarFila")) {
        let frmArancelarios = document.querySelector("#formAgregarFila");

        frmArancelarios.onsubmit = function (e) {
            e.preventDefault();
            btnGuardarRustico();
        };

        async function btnGuardarRustico() {
            let formData = new FormData(frmArancelarios);

            try {
                let resp = await fetch(`${base_url}/controlador/TerrenoRustico_control.php?data=agregar_datos_rustico`, {
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

                    // Limpiar el formulario
                    frmArancelarios.reset();

                    // Recargar las tablas con el año actual
                    const anio = document.getElementById("anioArancelarioR").value;
                    SeleccionarAnio(anio);
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
});


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


