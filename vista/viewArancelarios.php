 <?php
    require 'template/header.php';  // Incluye el header
    require '../configuracion/config.php';  // las configuraciones
    ?>
$conexion->close();
    ?>
    <?php 
    $currentYear = date("Y"); // Año actual
    $startYear = 2010; // Año de inicio
    ?>

    <!-- start: Main -->
    <main class="bg-light">

        <div class="p-2">
        <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">LISTA DE VALORES ARANCELARIOS DE EDIFICACIONES</h5>
                <div class="dropdown me-3 d-none d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-notification-line"></i>
                    </div>
                    <div class="dropdown-menu fx-dropdown-menu">
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
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
                        <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>
                        
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->
            <br>

            <div class="info-row">
                    <!-- Selector de año -->
                    <div class="year-select">
                        <label for="yearSelect" class="year-label">Selecciona Año:</label>
                        <select id="yearSelect" name="yearSelect" class="form-select form-select-sm">
                            <?php for ($year = $currentYear; $year >= $startYear; $year--): ?>
                                <option value="<?php echo $year; ?>" <?php echo ($year == $currentYear) ? 'selected' : ''; ?>>
                                    <?php echo $year; ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                <button 
                    class="btn btn-success rounded-pill ms-2" 
                    data-bs-toggle="modal" 
                    data-bs-target="#addYearModal">
                    Agregar nueva Lista 
                </button>            

            </div>
              

        

            <!-- Tabla -->
            <div class="table-responsive">
                <table class="table table-bordered custom-table">
                    <thead class="table-primary">
                        <tr>
                            <th>Categoria</th>
                            <th>Muros y Columnas</th>
                            <th>Techos</th>
                            <th>Pisos</th>
                            <th>Puertas y Ventanas</th>
                            <th>Revestimientos</th>
                            <th>Baños</th>
                            <th>Instalaciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaArancelarios">
                        <!-- Filas generadas dinámicamente -->
                    </tbody>
                </table>
            </div>

            <!-- Modal para Agregar Año -->
            <div class="modal fade" id="addYearModal" tabindex="-1" aria-labelledby="addYearModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addYearModalLabel">REGISTRAR NUEVA LISTA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAgregarAnio">
                                <div class="row g-3">
                                    <!-- Campo para el año -->
                                    <div class="col-md-12">
                                        <label for="nuevo_anio" class="form-label fw-bold">Nuevo Año</label>
                                        <input type="number" class="form-control" id="nuevo_anio" name="nuevo_anio" placeholder="Ej: 2024" required>
                                    </div>

                                    <!-- Campos para cada categoría -->
                                    <?php
                                    $categorias = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
                                    foreach ($categorias as $categoria) {
                                        echo '<div class="col-md-12">';
                                        echo '<h6 class="fw-bold mt-3">Categoría ' . $categoria . '</h6>';
                                        echo '<div class="row g-3">';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="muros_columnas_' . $categoria . '" class="form-label">Muros y Columnas</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="muros_columnas_' . $categoria . '" name="muros_columnas[' . $categoria . ']" placeholder="Ej: 603.35" required>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="techos_' . $categoria . '" class="form-label">Techos</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="techos_' . $categoria . '" name="techos[' . $categoria . ']" placeholder="Ej: 313.72" required>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="pisos_' . $categoria . '" class="form-label">Pisos</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="pisos_' . $categoria . '" name="pisos[' . $categoria . ']" placeholder="Ej: 222.60" required>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="puertas_ventanas_' . $categoria . '" class="form-label">Puertas y Ventanas</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="puertas_ventanas_' . $categoria . '" name="puertas_ventanas[' . $categoria . ']" placeholder="Ej: 238.13" required>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="revestimientos_' . $categoria . '" class="form-label">Revestimientos</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="revestimientos_' . $categoria . '" name="revestimientos[' . $categoria . ']" placeholder="Ej: 300.49" required>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="banos_' . $categoria . '" class="form-label">Baños</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="banos_' . $categoria . '" name="banos[' . $categoria . ']" placeholder="Ej: 106.57" required>';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<label for="instalaciones_' . $categoria . '" class="form-label">Instalaciones eléctricas y sanitarias</label>';
                                        echo '<input type="number" step="0.01" class="form-control" id="instalaciones_' . $categoria . '" name="instalaciones[' . $categoria . ']" placeholder="Ej: 379.76" required>';
                                        echo '</div>';
                                        echo '</div>'; // Cierre de row
                                        echo '</div>'; // Cierre de col-md-12
                                    }
                                    ?>
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

    <script>
     const base_url="<?=BASE_URL?>";//AQUI ENVIAMOS LAS DIRECCIONES A JS
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/script-msm.js"></script>
    <script src="js/view-arancelarios.js"></script>
    <script src="../assets/js/script-general.js"></script>
</body>
</html>