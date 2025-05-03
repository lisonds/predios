 <!-- end: Sidebar -->
    <?php
    require 'template/footer.php';  // Incluye el header

    // Contenido principal de la página
    ?>
    <?php
    require '../configuracion/config.php';  // las configuraciones

    // Contenido principal de la página
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
                    data-bs-target="#addYearModal"
                    id="addArancelarioButton">
                    Agregar nueva Lista 
                </button>            

            </div>
              

        
            <!-- Tabla -->
<div class="table-responsive">
    <table class="table table-bordered custom-table small text center">
        <thead>
            
            <tr>
                <th rowspan="2" class="text-center align-middle">CATEGORÍA</th>
                <th colspan="2" class="text-center">ESTRUCTURAS</th>
                <th colspan="3" class="text-center">ACABADOS</th>
                <th rowspan="2" class="text-center align-middle">INSTALACIONES </th>
            </tr>
            <tr>
                <th>MUROS Y COLUMNAS </th>
                <th>TECHOS </th>
                <th>PISOS </th>
                <th>PUERTAS Y VENTANAS </th>
                <th>REVESTIMIENTOS </th>
                
            </tr>
        </thead>
        <tbody id="tablaArancelarios">
            <!-- Filas generadas dinámicamente -->
        </tbody>
    </table>
</div>

            <!-- Modal para Agregar Año -->
<!-- Modal para Agregar Año -->
<div class="modal fade" id="addYearModal" tabindex="-1" aria-labelledby="addYearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addYearModalLabel">REGISTRAR NUEVA LISTA</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarAnio">
                    <div class="row g-3">
                        <!-- Selector de Año -->
                        <div class="col-md-6">
                            <label for="anioSelect" class="form-label fw-bold">Selecciona Año:</label>
                            <select id="anioSelect" name="anioSelect" class="form-select" required>
                                <?php
                                $currentYear = date("Y");
                                $startYear = 2010;
                                for ($year = $currentYear; $year >= $startYear; $year--) {
                                    echo "<option value='$year'>$year</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Selector de Categoría -->
                        <div class="col-md-6">
                            <label for="categoriaSelect" class="form-label fw-bold">Categoria</label>
                            <div class="input-group">
                                <select class="form-select" id="categoriaSelect" name="categoriaSelect">
                                    <option value="" selected disabled>Seleccione Categoria</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">F</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                            
                                </select>
                            </div>
                        </div>
                        

                        <!-- Campos para los valores -->
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
                            <label for="revestimientos" class="form-label fw-bold">Revestimientos</label>
                            <input type="number" step="0.01" class="form-control" id="revestimientos" name="revestimientos" placeholder="Ej: 300.49" required>
                        </div>
                        <div class="col-md-6">
                            <label for="banos" class="form-label fw-bold">Baños</label>
                            <input type="number" step="0.01" class="form-control" id="banos" name="banos" placeholder="Ej: 106.57" required>
                        </div>
                        <div class="col-md-6">
                            <label for="instalaciones" class="form-label fw-bold">Instalaciones </label>
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

    <script>
     const base_url="<?=BASE_URL?>";//AQUI ENVIAMOS LAS DIRECCIONES A JS
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/script-msm.js"></script>
        <script src="js/view-arancelarios.js"></script>
   
<?php
    require 'template/header.php';  // Incluye el header

    // Contenido principal de la página
    ?>