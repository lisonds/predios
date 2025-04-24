document.addEventListener('DOMContentLoaded', function () {
    const yearSelect = document.getElementById('yearSelect');
    const formAgregarAnio = document.getElementById('formAgregarAnio');
    const tablaArancelarios = document.getElementById('tablaArancelarios');

    // Cargar años disponibles al iniciar la página
    fetchYears();

    // Evento para cargar datos cuando se selecciona un año
    yearSelect.addEventListener('change', function () {
        const selectedYear = this.value;
        if (selectedYear) {
            loadDataByYear(selectedYear);
        }
    });

    // Evento para manejar el envío del formulario del modal
    formAgregarAnio.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        // Convertir los datos del formulario a un objeto JSON
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        // Enviar los datos al servidor para agregar un nuevo año
        fetch('../controlador/arancelarios_control.php?option=addYear', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(result => {
                if (result.status) {
                    alert(result.msg); // Mostrar mensaje de éxito
                    $('#addYearModal').modal('hide'); // Cerrar el modal
                    formAgregarAnio.reset(); // Limpiar el formulario
                    fetchYears(); // Actualizar el selector de años
                } else {
                    alert(result.msg); // Mostrar mensaje de error
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al guardar los datos.');
            });
    });

    

        // Función para cargar los datos de un año específico
        // Función para cargar los datos de un año específico
        function loadData(year) {
        fetch(`../controlador/arancelarios_control.php?option=getDataByYear&year=${year}`)
            .then(response => response.json())
            .then(result => {
                const tableBody = document.getElementById('tablaArancelarios');
                tableBody.innerHTML = ''; // Limpiar la tabla
    
                if (result.status && result.data.length > 0) {
                    // Generar las filas de la tabla
                    result.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${row.categoria}</td>
                            <td>${row.muros_columnas}</td>
                            <td>${row.techos}</td>
                            <td>${row.pisos}</td>
                            <td>${row.puertas_ventanas}</td>
                            <td>${row.revestimientos}</td>
                            <td>${row.banos}</td>
                            <td>${row.instalaciones}</td>
                        `;
                        tableBody.appendChild(tr);
                    });
                } else {
                    // Mostrar mensaje si no hay datos disponibles
                    const tr = document.createElement('tr');
                    tr.innerHTML = '<td colspan="8" class="text-center">No hay datos disponibles para este año.</td>';
                    tableBody.appendChild(tr);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al cargar los datos.');
            });
        }
    
        // Cargar datos del año seleccionado inicialmente
        document.addEventListener('DOMContentLoaded', function () {
            const yearSelect = document.getElementById('yearSelect');
            const initialYear = yearSelect.value;
            if (initialYear) {
                loadData(initialYear);
            }
        });
});



