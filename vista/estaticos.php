    <!-- end: Sidebar -->
    <?php
    require 'template/header.php';  // Incluye el header
    
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
                <h5 class="fw-bold mb-0 me-auto">LISTA DE VALORES ARANCELARIOS DE EDIFICACIONES </h5>
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
                <!-- Buscador compacto con botón -->
                <div class="input-group mb-4" style="max-width: 300px; margin: auto;">
                    <input 
                        type="text" 
                        id="searchYear" 
                        class="form-control rounded-pill" 
                        placeholder="Ingrese el año" 
                        aria-label="Buscar año">
                    <button 
                        class="btn btn-primary rounded-pill ms-2" 
                        id="searchButton">
                        <i class="ri-search-line"></i>
                    </button>
                    
                </div>
                    
                </div>


                <!-- Botón para agregar nuevo año -->
                <button 
                    class="btn btn-success mb-3" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalRegistroAño"
                    id="addRegistroAñoButton">
                    AGREGAR NUEVO AÑO
                </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalRegistroAño" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">REGISTRAR NUEVA LISTA <span id="codigoRegistroAnio" class="text-primary fw-bold"></span> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <!--Año fiscal -->
                                    <div class="col-md-4">
                                        <label for="año" class="form-label fw-bold">AÑO</label>
                                                
                                    </div>

                                </div>

                                <div class="row g-3 mb-3">
                                <!-- nombre categoria -->
                                    <div class="col-md-4">
                                        <label for="anio" class="form-label fw-bold">Año</label>
                                        <div class="input-group">
                                            <select class="form-select" id="categoria" name="categoria">
                                                <option value="" selected disabled>Seleccione categoria</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                    <option value="H">H</option>
                                                    <option value="I">I</option>
                                                    
                                            </select>
                                        </div>   
                                    </div>        

                                <!-- Muros y columnas -->
                                    <div class="col-md-4">
                                         <label for="Muros" class="form-label fw-bold">Muros y columnas</label>
                                            <input type="text" class="form-control" id="Muros" name="Muros" placeholder="ingrese valor de Muros y Columnas">
                                    </div>

                                    <div class="col-md-4">
                                         <label for="techo" class="form-label fw-bold">Techo</label>
                                            <input type="text" class="form-control" id="techo" name="techo" placeholder="ingrese valor de techo">
                                    </div>

                                    <div class="col-md-4">
                                         <label for="piso" class="form-label fw-bold">Pisos</label>
                                            <input type="text" class="form-control" id="piso" name="piso" placeholder="ingrese valor de piso">
                                    </div>

                                    <div class="col-md-4">
                                         <label for="Puertas" class="form-label fw-bold">Puertas y ventanas</label>
                                            <input type="text" class="form-control" id="Puertas" name="Puertas" placeholder="ingrese valor de las puertas">
                                    </div>

                                    <div class="col-md-4">
                                         <label for="Revistimento" class="form-label fw-bold">Revistimento</label>
                                            <input type="text" class="form-control" id="Revistimento" name="Revistimento" placeholder="ingrese valor de Revistimento">
                                    </div>

                                    <div class="col-md-4">
                                         <label for="banio" class="form-label fw-bold">Baños</label>
                                            <input type="text" class="form-control" id="banio" name="banio" placeholder="ingrese valor de los baños">
                                    </div>

                                    <div class="col-md-4">
                                         <label for="Instalaciones" class="form-label fw-bold">Muros y columnas</label>
                                            <input type="text" class="form-control" id="Instalaciones" name="Instalaciones" placeholder="ingrese valor de Instalaciones">
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
                                <th>Cat</th>
                                <th>Muro y columnas </th>
                                <th>Techo</th>
                                <th>Piso</th>
                                <th>Puertas y ventanas</th>
                                <th>Revistimento</th>
                                <th>Baño</th>
                                <th>Instalaciones</th>
                                
                            </tr>
                        </thead>
                        <tbody id="tablaPropietarios">
                            <!-- Filas generadas dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            
                
                <!-- INICIAR MODAL PARA EDITAR -->
            <div class="modal fade" id="modalEditarPropietario" tabindex="-1" aria-labelledby="modalEditarPropietarioLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarPropietarioLabel">Editar Contribuyente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarPropietario">
                                <!-- nombre del propietario (oculto) -->
                                <input type="hidden" id="idPropietarioEdit" name="idPropietario">

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

 <?php
    require 'template/header.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>