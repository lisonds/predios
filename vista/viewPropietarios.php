    <!-- end: Sidebar -->
    <?php
    require 'template/footer.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>
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
                <h5 class="fw-bold mb-0 me-auto">ADMINISTRAR PROPIETARIOS</h5>
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
                <!-- Buscador compacto con botón para generar código -->
                <div class="input-group mb-4" style="max-width: 600px; margin: auto;">
                    <input 
                        type="text" 
                        id="searchInputPropietario" 
                        class="form-control rounded-pill" 
                        placeholder="Ingrese código" 
                        aria-label="Buscar código">
                    <button 
                        class="btn btn-primary rounded-pill ms-2" 
                        id="searchButton">
                        <i class="ri-search-line"></i> Buscar
                    </button>
                    <button 
                        class="btn btn-secondary rounded-pill ms-2" 
                        id="generateCodigo" title="Al Realizar click Se Genera Codigo Siguiente al Codigo Generado el Ultimo Registro">
                        <i class="ri-code-line sidebar-menu-item-icon"></i> Generar
                    </button>
                </div>


                <!-- Botón para agregar usuario -->
                <button 
                    class="btn btn-success mb-3" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalRegistroPropietario" 
                    id="addPropietarioButton">
                    Agregar Propietario
                </button>
                <a id="linkAutovaluo" href="#" class="btn btn-info mb-3">Ver Sus Predios</a>
                
                    <!-- Modal -->
                    <div class="modal fade" id="modalRegistroPropietario" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">REGISTRAR PROPIETARIO <span id="codigoPropietario" class="text-primary fw-bold"></span> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formRegistroPropietarios">
                                        <!-- Código contribuyente (oculto) -->
                                        <input type="hidden" id="codigoGenerado" name="codigoGenerado">

                                        <!-- Tipo de contribuyente -->
                                        <div class="row g-3">
                                            <!-- Tipo de Contribuyente -->
                                            <div class="col-md-4">
                                                <label for="contribuyente" class="form-label fw-bold">Tipo de Contribuyente</label>
                                                <div class="input-group">
                                                    <select class="form-select" id="contribuyente" name="contribuyente">
                                                        <option value="" selected disabled>Seleccione Tipo de Contribuyente</option>
                                                        <option value="propietario">Propietario</option>
                                                        <option value="conyugue">Cónyuge</option>
                                                        <option value="copropietario">CoPropietario</option>
                                                        <option value="exoneradas">Entidades Exoneradas</option>
                                                        <option value="sucesiones">Sucesiones Indivisas</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Razón Social -->
                                            <div class="col-md-4">
                                                <label for="R_social" class="form-label fw-bold">Razón Social</label>
                                                <div class="input-group">
                                                    <select class="form-select" id="R_social" name="R_social">
                                                        <option value="" selected disabled>Seleccione Razón Social</option>
                                                        <option value="persona_natural">Persona Natural</option>
                                                        <option value="persona_juridica">Persona Jurídica</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="dni" class="form-label fw-bold">DNI o Ruc</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI">
                                                    <button class="btn btn-primary" type="button" id="buscarDni" onclick="buscarDNI()">
                                                         <i class="ri-search-line"></i> <!-- Ícono de búsqueda -->
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-3">
                                            <!-- nombre contribuyente -->
                                            <div class="col-md-4">
                                                <label for="nombres" class="form-label fw-bold">Nombres</label>
                                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese su nombre completo">
                                            </div>

                                            <!-- apellido paterno del contribuyente -->
                                            <div class="col-md-4">
                                                <label for="apellido_p" class="form-label fw-bold">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Apellido paterno">
                                            </div>

                                            <!-- apellido materno del contribuyente -->
                                            <div class="col-md-4">
                                                <label for="apellido_m" class="form-label fw-bold">Apellido Materno</label>
                                                <input type="text" class="form-control" id="apellido_m" name="apellido_m" placeholder="Apellido materno">
                                            </div>
                                            
                                            
                                        </div>

                                        <!-- direccion fiscal del contribuyente (en la misma fila) -->
                                            <div class="row g-3">
                                                <!-- direccion -->
                                                <div class="col-md-6">
                                                    <label for="direccion" class="form-label fw-bold">Direccion Fiscal en DNI</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion" required>
                                                </div>

                                            <!-- distrito al que pertenece el contribuyente -->
                                                <div class="col-md-3">
                                                    <label for="distrito" class="form-label fw-bold">Distrito</label>
                                                    <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Ingrese el distrito" required>
                                                </div>

                                            <!-- provincia al que pertenece el contribuyente -->
                                                <div class="col-md-3">
                                                    <label for="provincia" class="form-label fw-bold">Provincia</label>
                                                    <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Ingrese la provincia" required>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                        <!--  provincia al que pertenece el contribuyente  -->
                                                <div class="col-md-6">
                                                    <label for="departamento" class="form-label fw-bold">Departamento</label>
                                                    <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingrese el departamento" required>
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
                                <th>Nombre Completo</th>
                                <th>Acción</th>
                                
                            </tr>
                        </thead>
                        <tbody id="tablaPropietarios">
                            <!-- Filas generadas dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            
                
                <!-- INICIAR MODAL PARA EDITAR -->
            <div class="modal fade" id="modalEditarContribuyente" tabindex="-1" aria-labelledby="modalEditarcontribuyenteLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarContribuyenteLabel">Editar Contribuyente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarPropietario">
                                <!-- nombre del propietario (oculto) -->
                                <input type="hidden" id="idContribuyenteEdit" name="idContribuyente">

                                <!-- Información del contribuyente -->
                                <div class="row g-3">
                                    <!-- Tipo de Contribuyente -->
                                    <div class="col-md-4">
                                        <label for="contribuyente" class="form-label fw-bold">Tipo de Contribuyente</label>
                                        <div class="input-group">
                                            <select class="form-select" id="contribuyenteEdit" name="contribuyenteEdit">
                                                <option value="" selected disabled>Seleccione Tipo de Contribuyente</option>
                                                    <option value="propietario">Propietario</option>
                                                    <option value="conyugue">Cónyuge</option>
                                                    <option value="copropietario">CoPropietario</option>
                                                    <option value="exoneradas">Entidades Exoneradas</option>
                                                    <option value="sucesiones">Sucesiones Indivisas</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Razón Social -->
                                    <div class="col-md-4">
                                        <label for="R_social" class="form-label fw-bold">Razón Social</label>
                                            <div class="input-group">
                                                <select class="form-select" id="R_socialEdit" name="R_socialEdit">
                                                    <option value="" selected disabled>Seleccione Razón Social</option>
                                                    <option value="persona_natural">Persona Natural</option>
                                                    <option value="persona_juridica">Persona Jurídica</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="dni" class="form-label fw-bold">DNI o Ruc</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dniEdit" name="dniEdit" placeholder="Ingrese el DNI">
                                                <button class="btn btn-primary" type="button" id="buscarDniEdit" onclick="buscarDNI()">
                                                    <i class="ri-search-line"></i> <!-- Ícono de búsqueda -->
                                                </button>
                                            </div>
                                    </div>
                                    

                                    <div class="row g-3 mb-3">
                                        <!-- nombre contribuyente -->
                                        <div class="col-md-4">
                                            <label for="nombres" class="form-label fw-bold">Nombres</label>
                                                <input type="text" class="form-control" id="nombresEdit" name="nombresEdit" placeholder="Ingrese su nombre completo">
                                            </div>

                                        <!-- apellido paterno del contribuyente -->
                                            <div class="col-md-4">
                                                <label for="apellido_p" class="form-label fw-bold">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="apellido_pEdit" name="apellido_pEdit" placeholder="Apellido paterno">
                                            </div>

                                        <!-- apellido materno del contribuyente -->
                                            <div class="col-md-4">
                                                <label for="apellido_m" class="form-label fw-bold">Apellido Materno</label>
                                                <input type="text" class="form-control" id="apellido_mEdit" name="apellido_mEdit" placeholder="Apellido materno">
                                            </div>
                                            

                                        <!-- direccion fiscal del contribuyente (en la misma fila) -->
                                            <div class="row g-3">
                                                <!-- direccion -->
                                                <div class="col-md-6">
                                                    <label for="direccion" class="form-label fw-bold">Direccion Fiscal en DNI</label>
                                                    <input type="text" class="form-control" id="direccionEdit" name="direccionEdit" placeholder="Ingrese la direccion" required>
                                                </div>

                                        <!-- distrito al que pertenece el contribuyente -->
                                            <div class="col-md-3">
                                                    <label for="distrito" class="form-label fw-bold">Distrito</label>
                                                    <input type="text" class="form-control" id="distritoEdit" name="distritoEdit" placeholder="Ingrese el distrito" required>
                                            </div>

                                        <!-- provincia al que pertenece el contribuyente -->
                                             <div class="col-md-3">
                                                    <label for="provincia" class="form-label fw-bold">Provincia</label>
                                                    <input type="text" class="form-control" id="provinciaEdit" name="provinciaEdit" placeholder="Ingrese la provincia" required>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                        <!--  provincia al que pertenece el contribuyente  -->
                                            <div class="col-md-6">
                                                <label for="departamento" class="form-label fw-bold">Departamento</label>
                                                <input type="text" class="form-control" id="departamentoEdit" name="departamentoEdit" placeholder="Ingrese el departamento" required>
                                                </div>                                        
                                            </div>
                               
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
<script src="js/view-propietarios.js"></script>
<script src="../assets/js/script-general.js"></script>

 <?php
    require 'template/header.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>