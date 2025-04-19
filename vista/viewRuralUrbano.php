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
                    <button class="btn btn-success shadow-sm">
                    <i class="ri-survey-fill"></i> Ingresar Datos
                    </button>
                </div>
                <div class="info-row">

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