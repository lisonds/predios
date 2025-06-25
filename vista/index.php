<?php
    require 'template/header.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>
    <?php
    require '../configuracion/config.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>
    <!-- end: Sidebar -->

    <style>
.carousel-slide-bg {
    height: 600px;
    background-size: cover;
    background-position: center;
    position: relative;
    border-radius: 0.5rem;
}

.carousel-caption-custom {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Fondo negro semitransparente */
    color: #fff;
    padding: 20px;
    text-align: center;
    border-bottom-left-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
}
</style>


    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow-sm">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">RECAUDACION</h5>
                <div class="dropdown me-3 d-none d-sm-block">
                    <div class="cursor-pointer dropdown-toggle navbar-link" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="ri-notification-line"></i>
                    </div>
                    <div class="dropdown-menu fx-dropdown-menu">
                        <h5 class="p-3 bg-indigo text-light">Notification</h5>
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                                <div class="me-auto">
                                    <div class="fw-semibold">Subheading</div>
                                    <span class="fs-7">Content for list item</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">14</span>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
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
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">Admin</span>
                        <img class="navbar-profile-image"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->
            <!-- start: Content -->
            <div class="py-4">
                <!-- start: Summary -->
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-primary mb-2"></i>
                                <div>TOTAL RENTAS</div>
                            </div>
                            <h4>$435</h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-indigo mb-2"></i>
                                <div>PREDIO RURAL</div>
                            </div>
                            <h4>$435</h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-success mb-2"></i>
                                <div>PREDIO URBANO</div>
                            </div>
                            <h4>$435</h4>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="#"
                            class="text-dark text-decoration-none bg-white p-3 rounded shadow-sm d-flex justify-content-between summary-danger">
                            <div>
                                <i class="ri-shopping-cart-2-line summary-icon bg-danger mb-2"></i>
                                <div>USUARIOS</div>
                            </div>
                            <h4>$435</h4>
                        </a>
                    </div>
                </div>
                <!-- end: Summary -->

                <!-- start: Graph -->
                <!-- <div class="row g-3 mt-2">
                    <div class="col-12 col-md-7 col-xl-8">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Sales
                            </div>
                            <div class="card-body">
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-xl-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white">
                                Visitors
                            </div>
                            <div class="card-body">
                                <canvas id="visitors-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    
                </div> -->
                <!-- end: Graph -->
                
                <!-- start: Avisos - Carrusel -->
            <div class="row g-3 mt-2">
                <div class="col-12">
                    <div id="avisosCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="carousel-slide-bg" style="background-image: url('../assets/img/Fondo_tributario.jpg');">
                                    <div class="carousel-caption-custom">
                                        <h5 class="text-white">¡Bienvenido al Sistema de Autovalúo!</h5>
                                        <p>Este sistema le permitirá consultar, registrar y emitir reportes de predios y propietarios.</p>
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item">
                                <div class="carousel-slide-bg" style="background-image: url('../assets/img/impuestos.png');">
                                    <div class="carousel-caption-custom">
                                        <h5 class="text-white">Recuerda actualizar tus datos</h5>
                                        <p>Mantén actualizada la información del propietario y del predio para evitar observaciones.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-slide-bg" style="background-image: url('../assets/img/impuestos.png');">
                                    <div class="carousel-caption-custom">
                                        <h5 class="text-danger">Reporte de contribuyentes disponible</h5>
                                        <p class="mb-0">Haz clic en el menú para generar tu reporte en PDF actualizado.</p>
                                    </div>
                                </div>
                            </div>


                            

                        </div>

                        <!-- Controles -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#avisosCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#avisosCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- end: Avisos -->

            </div>
            <!-- end: Content -->
        </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script>
     const base_url="<?=BASE_URL?>";//AQUI ENVIAMOS LAS DIRECCIONES A JS
</script>
<script src="../assets/js/script-grafico.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/script-msm.js"></script>
<script src="js/function-login.js"></script>


 <?php
    require 'template/footer.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>