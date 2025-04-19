    <!-- end: Sidebar -->
    <?php
    require 'template/footer.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>
    <?php
    require '../configuracion/config.php';  // Carga las constantes

    $codigo = isset($_GET['idpredio']) ? $_GET['idpredio'] : '';
  
    
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    
    $predio = null;
    
    if (!empty($codigo)) {
        $stmt = $conexion->prepare("SELECT * FROM dbpredios.predios WHERE idpredios=?");
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            $predio = $resultado->fetch_assoc();
        }
    
        $stmt->close();
    }
    
    $conexion->close();
    ?>
    <?php 
    $currentYear = date("Y"); // Año actual
    $startYear = 1900; // Año de inicio
    ?>
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <?php if ($predio !== null): ?>
                <h5 class="fw-bold mb-0 me-auto">
                    INGRESAR INFORMACION ANUAL DEL PREDIO <?php echo strtoupper(htmlspecialchars($predio['denominado'])); ?>
                </h5>
                <?php else: ?>
                    <h5 class="fw-bold mb-0 me-auto text-danger">
                        ESTE PREDIO NO EXISTE.... .
                    </h5>
                <?php endif; ?>
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
            
            <div class="container">
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

                    <!-- Datos del predio -->
                    <div class="info-block">
                        <div class="info-label">Denominado</div>
                        <div class="info-data"><?php echo strtoupper(htmlspecialchars($predio['denominado'])); ?></div>
                    </div>

                    <div class="info-block">
                        <div class="info-label">Sector</div>
                        <div class="info-data"><?php echo strtoupper(htmlspecialchars($predio['sector'])); ?></div>
                    </div>

                    <div class="info-block">
                        <div class="info-label">Código Predial</div>
                        <div class="info-data"><?php echo strtoupper(htmlspecialchars($predio['cod_predial'])); ?></div>
                    </div>

                    <div class="info-block">
                        <div class="info-label">Código Catastral</div>
                        <div class="info-data"><?php echo strtoupper(htmlspecialchars($predio['cod_catastral'])); ?></div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button id="btnIngresar" class="btn btn-success shadow-sm" disabled>
                    <i class="ri-survey-fill me-1"></i> INGRESAR DATOS
                    </button>

                    <div class="toggle-container">
                        <input type="radio" name="tipoPredio" id="rural" class="btn-check" autocomplete="off">
                        <label class="btn-toggle" for="rural">PREDIO RURAL</label>

                        <input type="radio" name="tipoPredio" id="no-seleccionado" class="btn-check" autocomplete="off" checked>
                        <label class="btn-toggle" for="no-seleccionado">OFF</label>

                        <input type="radio" name="tipoPredio" id="urbano" class="btn-check" autocomplete="off">
                        <label class="btn-toggle" for="urbano">PREDIO URBANO</label>

                        <div class="slider-pill"></div>
                    </div>
                </div>
                </div>

                <div class="container">
                    <div class="info-row">
                    </div>
                </div>
                <!-- Modal Predio Rural -->
                <div class="modal fade" id="modalRural" tabindex="-1" aria-labelledby="modalPredioLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content rounded-4 shadow-lg">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalPredioLabel">
                        <i class="ri-survey-fill me-2"></i> FORMULARIO DE PREDIO RURAL
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formPredio">
                        <div class="row g-3">

                            <!-- AÑO -->
                            <div class="col-md-2">
                            <label for="anio" class="form-label">AÑO</label>
                                <input type="number" class="form-control" id="anio" name="anio">
                            </div>

                            <!-- TIPO DE TERRENO -->
                            <div class="col-md-3">
                            <label for="tipoTerreno" class="form-label">TIPO DE TERRENO</label>
                            <select class="form-select" id="tipoTerreno" name="tipoTerreno" required>
                                <option selected disabled>SELECCIONE...</option>
                                <option>LOTE</option>
                                <option>PARCELA</option>
                                <option>CHACRA</option>
                                <option>ESTABLO</option>
                                <option>HACIENDA</option>
                            </select>
                            </div>

                            <!-- USO DEL TERRENO -->
                            <div class="col-md-3">
                            <label for="usoTerreno" class="form-label">USO DEL TERRENO</label>
                            <select class="form-select" id="usoTerreno" name="usoTerreno" required>
                                <option selected disabled>SELECCIONE...</option>
                                <option>AGRÍCOLA</option>
                                <option>GANADERÍA</option>
                                <option>AVÍCOLA</option>
                                <option>FORESTAL</option>
                                <option>OTROS</option>
                            </select>
                            </div>

                            <!-- TIERRAS APTAS -->
                            <div class="col-md-4">
                            <label for="tierrasAptas" class="form-label">TIERRAS APTAS</label>
                            <select class="form-select" id="tierrasAptas" name="tierrasAptas" required>
                                <option selected disabled>SELECCIONE...</option>
                                <option>CULTIVO EN LIMPIO</option>
                                <option>CULTIVO PERMANENTE</option>
                                <option>PASTOS</option>
                                <option>TIERRAS ÁRIDAS</option>
                            </select>
                            </div>

                            <!-- ALTITUD DEL TERRENO -->
                            <div class="col-md-3">
                            <label for="altitud" class="form-label">ALTITUD DEL TERRENO</label>
                            <select class="form-select" id="altitud" name="altitud" required>
                                <option selected disabled>SELECCIONE...</option>
                                <option>500 m.s.n.m - 2000 m.s.n.m</option>
                                <option>2001 m.s.n.m - 3000 m.s.n.m</option>
                                <option>3001 m.s.n.m - 4000 m.s.n.m</option>
                                <option>4001 m.s.n.m - A MÁS</option>
                            </select>
                            </div>

                            <!-- CALIDAD AGROLÓGICA -->
                            <div class="col-md-3">
                            <label for="calidad" class="form-label">CALIDAD AGROLÓGICA</label>
                            <select class="form-select" id="calidad" name="calidad" required>
                                <option selected disabled>SELECCIONE...</option>
                                <option>ALTA</option>
                                <option>MEDIA</option>
                                <option>BAJA</option>
                            </select>
                            </div>

                            <!-- TOTAL DE HECTÁREAS -->
                            <div class="row align-items-end col-md-3">
                                <div class="col-md-12">
                                    <label for="hectareas" class="form-label">TOTAL DE HECTÁREAS</label>
                                    <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Ej: 10.5"  required>
                                </div>
                            </div>
                            <div class="row align-items-end col-md-3">
                            <div class="col-md-12">
                                <label class="form-label d-block">¿TIENE CONSTRUCCIÓN?</label>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Toggle acceso">
                                <input type="radio" class="btn-check" name="acceso" id="acceso-si" autocomplete="off">
                                <label class="btn btn-outline-success" for="acceso-si" onclick="mostrarConstruccion(true)">SÍ</label>

                                <input type="radio" class="btn-check" name="acceso" id="acceso-no" autocomplete="off" checked>
                                <label class="btn btn-outline-danger" for="acceso-no" onclick="mostrarConstruccion(false)">NO</label>
                                </div>

                                
                            </div>
                            </div>
                            <!-- Collapse PARA AGREGAR EL CONSTRUCCION -->
                            <div class="collapse mt-2" id="contenidoConstruccion">
                                <h5 class="modal-title" id="modalPredioLabel">
                                    <i class="ri-survey-fill me-2"></i> Ingresando Datos de Construccion
                                </h5>
                                <div class="alert alert-info p-2">
                                    <div class="row g-3">
                                    <div class="col-md-3">
                                            <label for="clasPredio" class="form-label">Clasificacion del Predio</label>
                                            <select class="form-select" id="clasPredio" name="clasPredio" required>
                                                <option selected disabled>SELECCIONE...</option>
                                                <option>Casa Habitacion</option>
                                                <option>Tienda, Depositos</option>
                                                <option>Centros de Recreacion o Esparcimiento</option>
                                                <option>Clinica, Hospital,Cine, Colegio, Taller.</option>                        
                                            </select>
                                        </div>
                                        <!-- TIPO DE TERRENO -->
                                        <div class="col-md-3">
                                            <label for="MaterialCons" class="form-label">Material de Construccion</label>
                                            <select class="form-select" id="MaterialCons" name="MaterialCons" required>
                                                <option selected disabled>SELECCIONE...</option>
                                                <option>Concreto</option>
                                                <option>Ladrillo</option>
                                                <option>Adobe (Quincha, Madera)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="EstConservacion" class="form-label">Material de Construccion</label>
                                            <select class="form-select" id="EstConservacion" name="EstConservacion" required>
                                                <option selected disabled>SELECCIONE...</option>
                                                <option>Muy Bueno</option>
                                                <option>Bueno</option>
                                                <option>Regular</option>
                                                <option>Malo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tipoUso" class="form-label">Tipo de Uso</label>
                                            <select class="form-select" id="tipoUso" name="tipoUso" required>
                                                <option selected disabled>SELECCIONE...</option>
                                                <option>Unifamiliar</option>
                                                <option>Multifamiliar</option>
                                                <option>Almacen</option>
                                                <option>Deposito</option>
                                                <option>Tienda</option>
                                                <option>Oficina</option>
                                                <option>Servicios</option>
                                                <option>Estractiva</option>
                                                <option>Manofactura</option>
                                                <option>Deportivo</option>
                                                <option>Cultural</option>
                                                <option>Diversion</option>

                                            </select>
                                        </div>
                                        <div class="container mt-5">
                                        <div class="d-flex align-items-center gap-3 mb-3">
                                            <button id="agregarFila" class="btn btn-primary">Agregar Fila</button>
                                            <button id="quitarFila" class="btn btn-danger">Quitar Última Fila</button>
                                            <h2 class="mb-0">Formulario de Datos de Construcción</h2>
                                        </div>

                                            

                                            <!-- Tabla donde se agregarán las filas -->
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Bloque</th>
                                                        <th>Piso</th>
                                                        <th>Año de Construcción</th>
                                                        <th class="igual-ancho">Muro</th>
                                                        <th class="igual-ancho">Techo</th>
                                                        <th class="igual-ancho">Pisos</th>
                                                        <th class="igual-ancho">Puerta-Ventana</th>
                                                        <th class="igual-ancho">Revestimiento</th>
                                                        <th class="igual-ancho">Baño</th>
                                                        <th class="igual-ancho">Instalaciones Eléctricas</th>
                                                        <th>Área Construida (m²)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaCuerpo">
                                                    <!-- Aquí se agregarán las filas -->
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                        <button type="submit" form="formPredio" class="btn btn-success">GUARDAR</button>
                    </div>
                    </div>
                </div>
                </div>


                <!-- Modal Predio Urbano -->
                <div class="modal fade" id="modalUrbano" tabindex="-1" aria-labelledby="modalPredioLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content rounded-4 shadow-lg">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="modalPredioLabel">
                            <i class="ri-survey-fill me-2"></i> FORMULARIO DE PREDIO URBANO
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <div class="modal-body">
                            <form id="formPredio">
                            <div class="row g-3">

                                <!-- AÑO -->
                                <div class="col-md-4">
                                <label for="anio" class="form-label">AÑO</label>
                                <input type="number" class="form-control" id="anio" name="anio" readonly>
                                </div>

                                <!-- TIPO DE TERRENO -->
                                <div class="col-md-4">
                                <label for="tipoTerreno" class="form-label">TIPO DE TERRENO</label>
                                <select class="form-select" id="tipoTerreno" name="tipoTerreno" required>
                                    <option selected disabled>SELECCIONE...</option>
                                    <option>LOTE</option>
                                    <option>PARCELA</option>
                                    <option>CHACRA</option>
                                    <option>ESTABLO</option>
                                    <option>HACIENDA</option>
                                </select>
                                </div>

                                <!-- USO DEL TERRENO -->
                                <div class="col-md-4">
                                <label for="usoTerreno" class="form-label">USO DEL TERRENO</label>
                                <select class="form-select" id="usoTerreno" name="usoTerreno" required>
                                    <option selected disabled>SELECCIONE...</option>
                                    <option>AGRÍCOLA</option>
                                    <option>GANADERÍA</option>
                                    <option>AVÍCOLA</option>
                                    <option>FORESTAL</option>
                                    <option>OTROS</option>
                                </select>
                                </div>

                                <!-- TIERRAS APTAS -->
                                <div class="col-md-6">
                                <label for="tierrasAptas" class="form-label">TIERRAS APTAS</label>
                                <select class="form-select" id="tierrasAptas" name="tierrasAptas" required>
                                    <option selected disabled>SELECCIONE...</option>
                                    <option>CULTIVO EN LIMPIO</option>
                                    <option>CULTIVO PERMANENTE</option>
                                    <option>PASTOS</option>
                                    <option>TIERRAS ÁRIDAS</option>
                                </select>
                                </div>

                                <!-- ALTITUD DEL TERRENO -->
                                <div class="col-md-6">
                                <label for="altitud" class="form-label">ALTITUD DEL TERRENO</label>
                                <select class="form-select" id="altitud" name="altitud" required>
                                    <option selected disabled>SELECCIONE...</option>
                                    <option>500 m.s.n.m - 2000 m.s.n.m</option>
                                    <option>2001 m.s.n.m - 3000 m.s.n.m</option>
                                    <option>3001 m.s.n.m - 4000 m.s.n.m</option>
                                    <option>4001 m.s.n.m - A MÁS</option>
                                </select>
                                </div>

                                <!-- CALIDAD AGROLÓGICA -->
                                <div class="col-md-6">
                                <label for="calidad" class="form-label">CALIDAD AGROLÓGICA</label>
                                <select class="form-select" id="calidad" name="calidad" required>
                                    <option selected disabled>SELECCIONE...</option>
                                    <option>ALTA</option>
                                    <option>MEDIA</option>
                                    <option>BAJA</option>
                                </select>
                                </div>

                                <!-- TOTAL DE HECTÁREAS -->
                                <div class="col-md-6">
                                <label for="hectareas" class="form-label">TOTAL DE HECTÁREAS</label>
                                <input type="number" class="form-control" id="hectareas" name="hectareas" placeholder="Ej: 10.5" step="0.01" min="0" required>
                                </div>

                            </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                            <button type="submit" form="formPredio" class="btn btn-success">GUARDAR</button>
                        </div>
                        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script personalizado -->
<script src="../assets/js/script-general-ruralUrbano.js"></script>

 <?php
    require 'template/header.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>