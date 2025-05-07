    <!-- end: Sidebar -->
    <?php
    require 'template/footer.php';  // Incluye el header

    // Contenido principal de la página
    ?>
    <?php
    require '../configuracion/config.php';  // las configuraciones

    // Contenido principal de la página
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
            <h5 class="fw-bold mb-0 me-auto">LISTA DE VALORES ARANCELARIOS DE TERRENOS RUSTICOS</h5>
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
        <br>
            
        <div class="row">
            <div class="col-md-6">
                <h6 class="text-center">TIERRAS APTAS PARA CULTIVO EN LIMPIO</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered custom-table small text center">
                        <thead>
                            <tr>
                                <th>ALTITUD</th>
                                <th>ALTA</th>
                                <th>MEDIA</th>
                                <th>BAJA</th>
                            </tr>
                        </thead>
                        <tbody id="tablaCultivoLimpio">
                            <!-- Filas generadas dinámicamente -->                          
                                
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h6 class="text-center">TIERRAS APTAS PARA CULTIVO PERMANENTE</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered custom-table small text center">
                        <thead>
                            <tr>
                                <th>ALTITUD</th>
                                <th>ALTA</th>
                                <th>MEDIA</th>
                                <th>BAJA</th>
                            </tr>
                        </thead>
                        <tbody id="tablaCultivoPermanente">
                            <!-- Filas generadas dinámicamente -->
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6 class="text-center">TIERRAS APTAS PARA PASTOS</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered custom-table small text center"">
                        <thead>
                            <tr>
                                <th>ALTITUD</th>
                                <th>ALTA</th>
                                <th>MEDIA</th>
                                <th>BAJA</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPastos">
                            <!-- Filas generadas dinámicamente -->

                        </tbody>
                    </table>
                </div>
            </div>           

            <div class="col-md-6">
                <h6 class="text-center">TIERRAS ARIDAS</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered custom-table small text center"">
                        <thead>
                            <tr>
                                <th>ALTITUD</th>
                                <th>ALTA</th>
                                <th>MEDIA</th>
                                <th>BAJA</th>
                            </tr>
                        </thead>
                        <tbody id="tablaTierrasAridas">
                            <!-- Filas generadas dinámicamente -->

                        </tbody>
                    </table>
                </div>
            </div>           



<!-- Modal para agregar nueva fila -->
<div class="modal fade" id="addYearModal" tabindex="-1" aria-labelledby="addYearModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="addYearModalLabel">AGREGAR VALOR ARANCELARIO DE TERRENO RUSTICO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formAgregarFila">

        <div class="row g-3">
            <!-- selector de año -->
            <div class="col-md-6">
              <label for="anioArancelarioR" class="form-label fw-bold">Selecciona Año</label>
              <select class="form-select" id="anioArancelarioR" name="anioArancelarioR" required>
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

        

            <div class="col-md-6">
                <label for="altitud" class="form-label fw-bold">Altitud</label>
                <select name="altitud" id="altitud" class="form-select" required>
                    <option value="">Seleccione un rango</option>
                    <option value="500 m.s.n.m - 2000 m.s.n.m">500 m.s.n.m - 2000 m.s.n.m</option>
                    <option value="2001 m.s.n.m - 3000 m.s.n.m">2001 m.s.n.m - 3000 m.s.n.m</option>
                    <option value="3001 m.s.n.m - 4000 m.s.n.m">3001 m.s.n.m - 4000 m.s.n.m</option>
                    <option value="4001 m.s.n.m a más">4001 m.s.n.m a más</option>
                </select>
            </div>


            <div class="col-md-2">
              <label for="valorAlta" class="form-label fw-bold">Alta</label>
              <input type="number" class="form-control" id="valorAlta" name="valorAlta" required>
            </div>
            <div class="col-md-2">
              <label for="valorMedia" class="form-label fw-bold">Media</label>
              <input type="number" class="form-control" id="valorMedia" name="valorMedia" required>
            </div>
            <div class="col-md-2">
              <label for="valorBaja" class="form-label fw-bold">Baja</label>
              <input type="number" class="form-control" id="valorBaja" name="valorBaja" required>
            </div>
            <div class="col-md-6">
              <label for="grupoTierra" class="form-label fw-bold">Grupo de tierras</label>
              <select class="form-select" id="grupoTierra" name="grupoTierra" required>
                <option value="limpio">Tierras aptas para cultivo limpio</option>
                <option value="permanente">Tierras aptas para cultivo permanente</option>
                <option value="pastos">Tierras aptas para pastos</option>
                <option value="eriazas">Tierras eriazas</option>
              </select>
            </div>
        
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>




<?php
    require 'template/header.php';  // Incluye el header

    // Contenido principal de la página
    ?>
        