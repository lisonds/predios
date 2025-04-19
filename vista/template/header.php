<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons https://remixicon.com/ --> <!-- CUANDO QUIERES USAR ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
    <title>Foxy - Blank Page</title>
</head>

<body>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Foxy</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item active">
                <a href="#">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
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
                    <li class="sidebar-dropdown-menu-item has-dropdown">
                        <a href="#">
                            Blog
                            <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                        </a>
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-menu-item">
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li class="sidebar-dropdown-menu-item">
                                <a href="#">
                                    Post
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-menu-item has-dropdown">
                        <a href="#">
                            Email Template
                            <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                        </a>
                        <ul class="sidebar-dropdown-menu">
                            <li class="sidebar-dropdown-menu-item">
                                <a href="#">
                                    Reset Password
                                </a>
                            </li>
                            <li class="sidebar-dropdown-menu-item">
                                <a href="#">
                                    Changed Password
                                </a>
                            </li>
                            <li class="sidebar-dropdown-menu-item">
                                <a href="#">
                                    Verify Email
                                </a>
                            </li>
                            <li class="sidebar-dropdown-menu-item">
                                <a href="#">
                                    Invitation
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Pricing
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            About Us
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Contact Us
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Our Team
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    <i class="ri-user-line sidebar-menu-item-icon"></i>
                    Autenticacion
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
            <li class="sidebar-menu-item has-dropdown">
                <a href="#">
                    
                    <i class="ri-table-line sidebar-menu-item-icon"></i>
                    LISTA DE VALORES ARANCELARIOS DE TERRENOS RUSTICOS 
                    <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
                </a>
                <ul class="sidebar-dropdown-menu">
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            tierras aptas para cultivo limpio
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            tierras aptas para cultivo permanente
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Tierras aptas para Pastos
                        </a>
                    </li>
                    <li class="sidebar-dropdown-menu-item">
                        <a href="#">
                            Wishlist
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-menu-item">
                <a href="#">
                    <i class="ri-table-fill sidebar-menu-item-icon"></i>
                    LISTA DE VALORES ARANCELARIOS DE EIDFICACIONES 
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#">
                    <i class="ri-calendar-line sidebar-menu-item-icon"></i>
                    Calendar
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>