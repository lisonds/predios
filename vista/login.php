<?php
require '../configuracion/config.php';  

// Contenido principal de la página
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- end: CSS -->
    <title>IMPUESTOS PREDIALES QUINUA</title>
</head>

<body>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form id="formLogin" class="sign-in-form">
            <h2 class="title">Usuario Autovaluo</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="usernameLogin" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="passwordLogin" placeholder="Password" name="password"/>
            </div>
            <input type="submit" value="Ingresar" class="btn solid" />
            <p class="social-text">inicie sesión en plataformas sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="ri-facebook-circle-fill"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="ri-twitter-fill"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="ri-google-fill"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="ri-youtube-fill"></i>
              </a>
            </div>
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Codigo" name="codigo_register"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Username" name="codigo_username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="correo" name="codigo_correo"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="codigo_password"/>
            </div>
            <input type="submit" class="btn" value="Registrarse" />
            <p class="social-text">inicie sesión en plataformas sociales</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="ri-facebook-circle-fill"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="ri-twitter-fill"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="ri-google-fill"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="ri-youtube-fill"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Registrar Usuario</h3>
            <p>
              Para acceder,  registre el usuario y contraseña mediante el administrador  de la pagina web
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Registrarse
            </button>
          </div>
          <img src="../assets/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content"> 
            <h3>Acceder a la Pagina</h3>
            <p>
              Para registrarse se requiere que el administrador le envie el CODIGO a su correo correspondiente.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="../assets/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <!-- start: JS -->
    <script>
      const base_url="<?=BASE_URL?>";//AQUI ENVIAMOS LAS DIRECCIONES A JS
 </script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script-login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><!-- Muestra error con mensajes hermosos -->
    <script src="../assets/js/script-msm.js"></script>
    <script src="js/function-login.js"></script>
    <!-- end: JS -->
</body>

</html>