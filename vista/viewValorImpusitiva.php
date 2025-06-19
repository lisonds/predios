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
            <h5 class="fw-bold mb-0 me-auto">VALOR IMPUSITIVA TRIBUTARIA</h5>
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
                <h6 class="text-center">UNIDAD IMPUSITIVA TRIBUTARIA - UIT</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered custom-table small text center">
                        <thead>
                            <tr>
                                <th>AÑO</th>
                                <th>UIT</th>
                                <th>BASE LEGAL</th>
                                <th>VALOR MINIO DE PAGO</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody id="tablaValorMinimo">
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
        <h5 class="modal-title" id="addYearModalLabel">AGREGAR VALOR IMPUSITIVA TRIBUTARIA - UIT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      
      <div class="modal-body">
        <form id="formAgregarValorImpusitiva">

        <div class="row g-3">
            <!-- selector de año -->
             <div class="col-md-2"></div>
            <div class="col-md-4">
              <label for="anioImpusitivaR" class="form-label fw-bold">Selecciona Año que va ingresar el UIT</label> </div>
              <div class="col-md-4">
              <select class="form-select" id="anioImpusitivaR" name="anioImpusitivaR" required>
              <option value="0" selected disabled>-- seleccionar año --</option>
                <?php
                  $currentYear = date("Y");
                  $startYear = 2010;
                  for ($y = $currentYear; $y >= $startYear; $y--) {
                    echo "<option value='$y'>$y</option>";
                  }
                ?>
              </select>
            </div>
          
            <!-- selector de altura -->
            <div class="col-md-2"></div>
        
            <div class="col-md-2"></div>
            <div class="col-md-3">
              <label for="uit" class="form-label fw-bold">UIT - año</label>
              <input type="number" class="form-control" id="uit" name="uit" step="any" required>
            </div>
            <div class="col-md-5">
              <label for="BaseLegal" class="form-label fw-bold">Base Legal</label>
              <input type="text" class="form-control" id="BaseLegal" name="BaseLegal" step="any" required>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <label for="valorstatic" class="form-label fw-bold">Valor Por Defecto 0.6 %</label>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="valorstatic" name="valorstatic" step="any" required value="0.006">
            </div>

            
           
        
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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


<script src="js/viewValorImpusitiva.js"></script>


<?php
    require 'template/header.php';  // Incluye el header

    // Contenido principal de la página
    ?>

<?php
    require 'template/footer.php';  // Incluye el header

    // Contenido principal de la página
    ?>
        