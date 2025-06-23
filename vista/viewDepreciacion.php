    <!-- end: Sidebar -->
   
    <?php
    require '../configuracion/config.php';  // las configuraciones

    // Contenido principal de la página
    ?>

   
    <!-- start: Main -->
    <main class="bg-light">
    <div class="p-2">
         <!-- start: Navbar -->
         <nav class="px-3 py-2 bg-white rounded shadow">
            <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
            <h5 class="fw-bold mb-0 me-auto">TABLAS DE DEPRECIACION POR ANTIGUEDAD Y ESTADOS DE CONSERVACION SEGUN EL MATERIAL ESTRUCTURAL PREDOMINANTE </h5>
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
        
             <div class="col-md-3">
                <select class="form-select" id="materialPredominante" name="materialPredominante" required>
                    <option value="" selected disabled>-- Clasificacion --</option>
                    <option value="Casa Habitacion">Casa Habitacion</option>
                    <option value="Tienda, Depositos">Tienda, Deposito</option>
                    <option value="Centros de Recreacion o Esparcimiento">Edificios </option>
                    <option value="Clinica, Hospital,Cine, Colegio, Taller">Colegios</option>
                </select>
                </div>
             <button 
                    class="btn btn-success rounded-pill ms-2" 
                    data-bs-toggle="modal" 
                    data-bs-target="#addYearModal"
                    id="addRusticoButton">
                    <i class="fa-solid fa-circle-plus" ></i> Agregar Nueva lista
                </button>  

        </div> 
        <br>
            
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h6 class="text-center">TABLA DE DEPRECIACION POR ANTIGUEDAD Y ESTADO DE CONSERVACION SEGUN MATERIAL ESTRUCTURAL PREDOMINANTE</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered custom-table small text center">
                        <thead>
                            <tr>
                                <th>ANTIGUEDAD HASTA</th>
                                <th>MATERIAL</th>
                                <th>MUY BUENO</th>
                                <th>BUENO</th>
                                <th>REGULAR </th>
                                <th>MALO</th>
                            </tr>
                        </thead>
                        <tbody id="tablaDepreciacion">
                            <!-- Filas generadas dinámicamente -->                          
                                
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-1"></div>
            
        </div>           



<!-- Modal para agregar nueva fila -->
<div class="modal fade" id="addYearModal" tabindex="-1" aria-labelledby="addYearModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addYearModalLabel">AGREGAR VALOR DE LA DEPRECIACION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      
      <div class="modal-body">
        <form id="formAgregarDepreciacion">

            <div class="row g-4">

                <!-- Año para ingresar UIT -->
                <div class="col-md-3">
                <label for="anioDepreciacion" class="form-label fw-bold">Selecciona el año para ingresar el UIT</label>
                </div>
                <div class="col-md-3">
                <select class="form-select" id="anioDepreciacion" name="anioDepreciacion" required>
                    <option value="" selected disabled>-- Seleccionar año --</option>
                    <option value="5">Hasta 05 años</option>
                    <option value="10">Hasta 10 años</option>
                    <option value="15">Hasta 15 años</option>
                    <option value="20">Hasta 20 años</option>
                    <option value="25">Hasta 25 años</option>
                    <option value="30">Hasta 30 años</option>
                    <option value="35">Hasta 35 años</option>
                    <option value="40">Hasta 40 años</option>
                    <option value="45">Hasta 45 años</option>
                    <option value="50">Hasta 50 años</option>
                </select>
                </div>

                <!-- Material estructural predominante -->
                <div class="col-md-3">
                <label for="materialPredominante" class="form-label fw-bold">Material Estructural Predominante</label>
                </div>
                <div class="col-md-3">
                <select class="form-select" id="materialPredominante" name="materialPredominante" required>
                    <option value="" selected disabled>-- Material Construcción --</option>
                    <option value="Concreto">Concreto</option>
                    <option value="Ladrillo">Ladrillo</option>
                    <option value="Adobe">Adobe (Quincha, Madera)</option>
                </select>
                </div>

                <!-- Valores por estado de conservación -->
                <div class="col-md-2">
                <label for="muyBueno" class="form-label fw-bold">Muy Bueno</label>
                <input type="number" class="form-control" id="muyBueno" name="muyBueno" step="any" required>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <label for="bueno" class="form-label fw-bold">Bueno</label>
                <input type="number" class="form-control" id="bueno" name="bueno" step="any" required>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <label for="regular" class="form-label fw-bold">Regular</label>
                <input type="number" class="form-control" id="regular" name="regular" step="any" required>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <label for="malo" class="form-label fw-bold">Malo</label>
                <input type="number" class="form-control" id="malo" name="malo" step="any" required>
                </div>

                <!-- Botones -->
                <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </div>

            </form>
        </div>
      </div>
    </div>
  </div>
</div>
 <script>
     const base_url="<?=BASE_URL?>";//AQUI ENVIAMOS LAS DIRECCIONES A JS
</script>
<!-- Script personalizado-->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/script-msm.js"></script>


<script src="js/viewDepreciacion.js"></script>


<?php
    require 'template/header.php';  // Incluye el header

    // Contenido principal de la página
    ?>

<?php
    require 'template/footer.php';  // Incluye el header

    // Contenido principal de la página
    ?>
        