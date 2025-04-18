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
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
    ?>
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">PREDIOS POR CODIGO</h5>
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
            <div class="container mt-5">
            <!-- Buscador compacto -->
                <div class="input-group mb-4" style="max-width: 300px; margin: auto;">
                    <input 
                        type="text" 
                        id="searchInputPredio" 
                        class="form-control rounded-pill" 
                        placeholder="Ingrese código" 
                        aria-label="Buscar código"
                        value="<?php echo htmlspecialchars($codigo); ?>">
                    <button 
                        class="btn btn-primary rounded-pill ms-2" 
                        id="searchButton">
                        <i class="ri-search-line">Buscar</i>
                    </button>
                    
                </div>

                <!-- Botón para agregar predio -->
                <button 
                    class="btn btn-success mb-3" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalRegistroPredio" 
                    id="addPredioButton">
                    <i class="fa-solid fa-plus">Agregar Predio</i>
                    
                </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalRegistroPredio" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">REGISTRAR PREDIO DEL CODIGO <span id="codigoPredio" class="text-primary fw-bold"></span> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formRegistroPredio">
                                        <!-- Código Predial (oculto) -->
                                        <input type="hidden" id="codigoValor" name="codigoValor">

                                        <!-- Predio Denominado -->
                                        <div class="row g-3">
                                            <!-- Predio Denominado -->
                                            <div class="col-md-8">
                                                <label for="predioDenominado" class="form-label fw-bold">Predio Denominado</label>
                                                <input type="text" class="form-control" id="predioDenominado" name="predioDenominado" placeholder="Ingrese el nombre del predio" required>
                                            </div>

                                            <!-- Sector -->
                                            <div class="col-md-4">
                                                <label for="sector" class="form-label fw-bold">Sector</label>
                                                <input type="text" class="form-control" id="sector" name="sector" placeholder="Ingrese el sector" required>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-3">
                                            <!-- Distrito -->
                                            <div class="col-md-4">
                                                <label for="distrito" class="form-label fw-bold">Distrito</label>
                                                <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Ingrese el distrito" required>
                                            </div>

                                            <!-- Provincia -->
                                            <div class="col-md-4">
                                                <label for="provincia" class="form-label fw-bold">Provincia</label>
                                                <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Ingrese la provincia" required>
                                            </div>

                                            <!-- Departamento -->
                                            <div class="col-md-4">
                                                <label for="departamento" class="form-label fw-bold">Departamento</label>
                                                <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingrese el departamento" required>
                                            </div>
                                        </div>

                                        <!-- Código Predial y Código Catastral (en la misma fila) -->
                                        <div class="row g-3">
                                            <!-- Código Predial -->
                                            <div class="col-md-6">
                                                <label for="codigoPredial" class="form-label fw-bold">Código Predial</label>
                                                <input type="text" class="form-control" id="codigoPredial" name="codigoPredial" placeholder="Ingrese el código predial" required>
                                            </div>

                                            <!-- Código Catastral -->
                                            <div class="col-md-6">
                                                <label for="codigoCatastral" class="form-label fw-bold">Código Catastral</label>
                                                <input type="text" class="form-control" id="codigoCatastral" name="codigoCatastral" placeholder="Ingrese el código catastral" required>
                                            </div>
                                        </div>

                                        <!-- Botón para guardar -->
                                        <div class="mt-4 text-end">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>



                <!-- Tabla -->
                <div class="table-responsive">
                    <table class="table table-bordered custom-table">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>+</th>
                                <th>Predio Denominado</th>
                                <th>Acción</th>
                                
                            </tr>
                        </thead>
                        <tbody id="tablaPredios">
                            <!-- Filas generadas dinámicamente  por JS-->
                        </tbody>
                    </table>
                </div>
            </div>
            
                
                <!-- INICIAR MODAL PARA EDITAR -->
            <div class="modal fade" id="modalEditarPredio" tabindex="-1" aria-labelledby="modalEditarPredioLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarPredioLabel">Editar Predio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarPredio">
                                <!-- Código Predial (oculto) -->
                                <input type="hidden" id="idPredioEdit" name="idpredio">

                                <!-- Información del predio -->
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label for="predioDenominado" class="form-label fw-bold">Predio Denominado</label>
                                        <input type="text" class="form-control" id="predioDenominadoEdit" name="predioDenominadoEdit" placeholder="Ingrese el nombre del predio" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sector" class="form-label fw-bold">Sector</label>
                                        <input type="text" class="form-control" id="sectorEdit" name="sectorEdit" placeholder="Ingrese el sector" required>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="distrito" class="form-label fw-bold">Distrito</label>
                                        <input type="text" class="form-control" id="distritoEdit" name="distritoEdit" placeholder="Ingrese el distrito" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="provincia" class="form-label fw-bold">Provincia</label>
                                        <input type="text" class="form-control" id="provinciaEdit" name="provinciaEdit" placeholder="Ingrese la provincia" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="departamento" class="form-label fw-bold">Departamento</label>
                                        <input type="text" class="form-control" id="departamentoEdit" name="departamentoEdit" placeholder="Ingrese el departamento" required>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="codigoPredial" class="form-label fw-bold">Código Predial</label>
                                        <input type="text" class="form-control" id="codigoPredialEdit" name="codigoPredialEdit" placeholder="Ingrese el código predial" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="codigoCatastral" class="form-label fw-bold">Código Catastral</label>
                                        <input type="text" class="form-control" id="codigoCatastralEdit" name="codigoCatastralEdit" placeholder="Ingrese el código catastral" required>
                                    </div>
                                </div>

                                <!-- Botones -->
                                <div class="mt-4 text-end">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


                    <!--modal final-->
            </div>
        </div>
    </main>
    <!-- end: Main -->

 <!-- end: Sidebar -->
 <script>
     const base_url="<?=BASE_URL?>";//AQUI ENVIAMOS LAS DIRECCIONES A JS
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/script-msm.js"></script>
<script src="js/view-predios.js"></script>
<script src="../assets/js/script-general.js"></script>

 <?php
    require 'template/header.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>