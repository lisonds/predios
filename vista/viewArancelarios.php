

    <?php
    require 'template/header.php';  // Incluye el header
    require '../configuracion/config.php';  // las configuraciones
    ?>

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">ADMINISTRAR ARANCELARIOS</h5>
                <div class="dropdown me-3 d-none d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-notification-line"></i>
                    </div>
                    <div class="dropdown-menu fx-dropdown-menu">
                        <h5 class="p-3 bg-indigo text-light">Notificaciones</h5>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">Tulio Ore</span>
                        <img class="navbar-profile-image" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->

            <div class="container mt-5">
                <!-- Selector de Año y Botón Agregar Año -->
                <div class="input-group mb-4" style="max-width: 600px; margin: auto;">
                    <select class="form-select rounded-pill" id="year-selector" onchange="loadData(this.value)">
                        <?php foreach ($years as $year): ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button 
                        class="btn btn-success rounded-pill ms-2" 
                        data-bs-toggle="modal" 
                        data-bs-target="#addYearModal">
                        Agregar Año
                    </button>
                </div>

                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-bordered custom-table">
                        <thead class="table-primary">
                            <tr>
                                <th>CATEGORÍA</th>
                                <th>Muros y Columnas</th>
                                <th>Techos</th>
                                <th>Pisos</th>
                                <th>Puertas y Ventanas</th>
                                <th>Revestimiento</th>
                                <th>Baños</th>
                                <th>Instalaciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaArancelarios">
                            <!-- Filas generadas dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal para Agregar Año -->
            <div class="modal fade" id="addYearModal" tabindex="-1" aria-labelledby="addYearModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addYearModalLabel">Agregar Nuevo Año</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAgregarAnio">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nuevo_anio" class="form-label fw-bold">Nuevo Año</label>
                                        <input type="number" class="form-control" id="nuevo_anio" name="nuevo_anio" placeholder="Ej: 2024" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="categoria" class="form-label fw-bold">Categoría</label>
                                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ej: A, B, C" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="muros_columnas" class="form-label fw-bold">Muros y Columnas</label>
                                        <input type="number" step="0.01" class="form-control" id="muros_columnas" name="muros_columnas" placeholder="Ej: 603.35" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="techos" class="form-label fw-bold">Techos</label>
                                        <input type="number" step="0.01" class="form-control" id="techos" name="techos" placeholder="Ej: 313.72" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pisos" class="form-label fw-bold">Pisos</label>
                                        <input type="number" step="0.01" class="form-control" id="pisos" name="pisos" placeholder="Ej: 222.60" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="puertas_ventanas" class="form-label fw-bold">Puertas y Ventanas</label>
                                        <input type="number" step="0.01" class="form-control" id="puertas_ventanas" name="puertas_ventanas" placeholder="Ej: 238.13" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="revestimiento" class="form-label fw-bold">Revestimiento</label>
                                        <input type="number" step="0.01" class="form-control" id="revestimiento" name="revestimiento" placeholder="Ej: 300.49" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="banos" class="form-label fw-bold">Baños</label>
                                        <input type="number" step="0.01" class="form-control" id="banos" name="banos" placeholder="Ej: 106.57" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="instalaciones" class="form-label fw-bold">Instalaciones</label>
                                        <input type="number" step="0.01" class="form-control" id="instalaciones" name="instalaciones" placeholder="Ej: 379.76" required>
                                    </div>
                                </div>
                                <div class="mt-4 text-end">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end: Main -->

    <!-- Script para cargar datos dinámicamente -->
    <script>
        function loadData(year) {
            fetch(`arancelarios_control.php?action=loadData&year=${year}`)
                .then(response => response.json())
                .then(data => {
                    let table = '';
                    data.forEach(row => {
                        table += '<tr>';
                        table += `<td>${row.categoria}</td>`;
                        table += `<td>${row.muros_columnas.toFixed(2)}</td>`;
                        table += `<td>${row.techos.toFixed(2)}</td>`;
                        table += `<td>${row.pisos.toFixed(2)}</td>`;
                        table += `<td>${row.puertas_ventanas.toFixed(2)}</td>`;
                        table += `<td>${row.revestimiento.toFixed(2)}</td>`;
                        table += `<td>${row.banos.toFixed(2)}</td>`;
                        table += `<td>${row.instalaciones.toFixed(2)}</td>`;
                        table += '</tr>';
                    });
                    document.getElementById('tablaArancelarios').innerHTML = table;
                });
        }

        window.onload = () => {
            const defaultYear = document.getElementById('year-selector').value;
            loadData(defaultYear);
        };
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/script-msm.js"></script>
    <script src="js/view-arancelarios.js"></script>
    <script src="../assets/js/script-general.js"></script>
</body>
</html>