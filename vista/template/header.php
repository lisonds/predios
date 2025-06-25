<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons https://remixicon.com/ --> <!-- CUANDO QUIERES USAR ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- En el <head> de tu HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <!-- start: Icons -->
      <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- start: CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/styles_propios.css">
    <!-- end: CSS -->
    <title>IMPUESTOS PREDIALES </title>
</head>

<body>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        

        <div class="d-flex align-items-center p-3">
            <a href="index.php" class="sidebar-logo text-decoration-none d-flex align-items-center">
                <img src="../assets/img/logo-quinua.png" alt="Logo Quinua" style="height: 200px; margin-right: 10px;">
                <span class="fw-bold text-indigo fs-5"></span>
            </a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="#">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    IMPUESTOS PREDIALES
                </a>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Custom</li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-group-fill sidebar-menu-item-icon"></i>
                       PROPIETARIOS
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="viewPropietarios.php">
                            Registrar Propietario
                        </a>
                    </li>
                                        
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-home-wifi-fill sidebar-menu-item-icon"></i>
                    ADMINISTRAR PREDIOS
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="viewPredios.php">
                            Predios
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-user-line sidebar-menu-item-icon"></i>
                    USUARIOS
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="user.php">
                            Administrar Login
                        </a>
                    </li>
                                        
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-window-line sidebar-menu-item-icon"></i>
                    Widgets
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Charts
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Tables
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">DATOS ESTATICOS</li>
            <li class="sidebar-menu-item">
                <a href="view-normal.php">
                     <i class="ri-book-line sidebar-menu-item-icon"></i>
                    NORMAS LEGALES 
                    
                </a>
                
            </li>
            <li class="sidebar-menu-item">
                <a href="viewArancelarios.php">
                    <i class="ri-table-fill sidebar-menu-item-icon"></i>
                    EDIFICACIONES 
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="viewTerrenoRustico.php">
                    <i class="ri-table-line sidebar-menu-item-icon"></i>
                    TERRENOS RUSTICOS
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="viewValorImpusitiva.php">
                    <i class="ri-table-line sidebar-menu-item-icon"></i>
                    UIT POR AÑO
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="viewDepreciacion.php">
                    <i class="ri-table-line sidebar-menu-item-icon"></i>
                    DEPRECIACION
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>