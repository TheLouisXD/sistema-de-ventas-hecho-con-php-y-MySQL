
<!-- Pagina de Login en donde el usuario debe ingresar su nombre y su contraseña para posteriormente generar una sesion e ingresar al sistema, creado con el framework adminLTE -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de ventas</title>

  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- Sweet Alert 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Fondo de la pagina de LOGIN -->
  <style>
    body{
        background-image: url("imagenes/fondo_login.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">

<!-- importamos el mensaje -->
  <?php

    include("app/config.php");
    include("app/controllers/login/contar_usuarios.php");
    session_start();
    
    include("layout/mensajes.php");
  ?>



  <!-- Logo del bazar aqui -->
  <center>
    <img src="imagenes/1929276.jpg" alt="logo Bazar" width="100px">
  </center>


  <br>
  <div class="card card-outline card-primary">
    <!-- Titulo del login -->
    <div class="card-header text-center">
      <p class="h1"><b>Sistema de </b>ventas</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa tus credenciales</p>

      <!-- Formulario en donde el usuario ingresa sus credenciales, el formulario envia la informacion a ingreso.php para verificar la informacion con la base de datos -->
      <form action="app/controllers/login/ingreso.php" method="post" >
        <div class="input-group mb-3">
          <input type="text" name="nombre" class="form-control" placeholder="nombre" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_user" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar <span class="fas fa-arrow-right"></span> </button>
          </div>
          <?php echo $btn_inicializar ?>
          
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>


<!-- Destruimos todas las sesiones en caso de que vuelva a mostrarse el login por razones de seguridad -->
<?php
    session_destroy();
?>

</body>
</html>
