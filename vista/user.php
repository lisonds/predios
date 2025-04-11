
    <!-- end: Sidebar -->
    <?php
    require 'template/footer.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>
    <?php
    require '../configuracion/config.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>
    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">Usuario</h5>
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
                        <span class="me-2 d-none d-sm-block">John Doe</span>
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
                <div class="table-title">Tabla de Usuarios</div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistroUsuario">
                Agregar Usuario
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>opcion</th>
                            </tr>
                        </thead>
                        <tbody id="tblbodyUsuarios">
                            <!--
                            <tr>
                                <td>1</td>
                                <td>Juan Pérez</td>
                                <td>juan.perez@example.com</td>
                                <td>+51 987 654 321</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>  ES ESTO CUADRO QUE ESTA GENERANDO  DESDE JS-->
                        
                            
                        </tbody>
                    </table>
                </div>
                <!--aGREGANDO MODAL-->
                <div class="modal fade" id="modalRegistroUsuario" tabindex="-1" aria-labelledby="modalRegistroUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRegistroUsuarioLabel">Registrar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formRegistroUsuario">
                                    <div class="mb-3">
                                        <label for="codigoUsuario" class="form-label">Código</label>
                                        <input type="text" class="form-control" name="txtCodigo" id="codigoUsuario" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="correoUsuario" class="form-label">Correo</label>
                                        <input type="email" class="form-control" name="txtCorreo" id="correoUsuario" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombreUsuario" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" name="txtUsuario" id="nombreUsuario"  autocomplete="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contrasenaUsuario" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="txtContrasena" id="contrasenaUsuario" autocomplete="current-password" >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--FINAL AGREGANDO MODAL-->
                <!--INICIAR MODAL PARA EDITAR-->
                <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditarUsuario">
                            <div class="mb-3">
                                <label for="codigoUsuarioEditar" class="form-label">Código</label>
                                <input type="text" class="form-control" id="codigoUsuarioEditra" name="codigo" required>
                            </div>
                            <div class="mb-3">
                                <label for="correoUsuarioEditar" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="correoUsuarioEditar" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombreUsuarioEditar" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="nombreUsuarioEditar" name="usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="passwordEditar" class="form-label">Usuario</label>
                                <input type="password" class="form-control" id="passwordEditar" name="password" required>
                            </div>
                            <input type="hidden" id="idtb_usuario" name="id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                            </form>
                        </div>
                       
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
<script src="js/function-login.js"></script>

 <?php
    require 'template/header.php';  // Incluye el header
    
    // Contenido principal de la página
    ?>