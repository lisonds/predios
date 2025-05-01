 <?php
    require 'template/header.php';  // Incluye el header
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
                <h6 class="fw-bold mb-0 me-auto">LISTA DE VALORES ARANCELARIOS DE TERRENOS RUSTICOS</h6>
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

                </div> 
                <br>
            
            <div class="row">
            <div class="col-md-6">
                <h6>TIERRAS APTAS PARA CULTIVO EN LIMPIO</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered">
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
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                                
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h6>TIERRAS APTAS PARA CULTIVO PERMANENTE</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered">
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
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>TIERRAS APTAS PARA PASTOS</h6>
                <div class="table-responsive table-container">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>ALTITUD</th>
                                <th>ALTA</th>
                                <th>MEDIA</th>
                                <th>BAJA</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPastos">
                            <!-- Filas generadas dinámicamente -->

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>           

        