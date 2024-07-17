
<!-- En esta pagina el Jefe de ventas debe elegir en que vista desea ingresar -->

<?php

// Codigo que verifica que la sesion choice este iniciada
include("../../app/config.php");

  session_start();
  if (isset($_SESSION["choice"])){
    $nombre = $_SESSION["choice"];
  }else{
    header("Location: ".$URL."");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de ventas</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../public/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- Sweet Alert 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Fondo de la pagina de LOGIN -->
  <style>
    body{
        background-image: url("../../imagenes/fondo_login.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>




</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- Logo del bazar aqui -->
  <center>
    <img src="../../imagenes/1929276.jpg" alt="logo Bazar" width="100px">
  </center>


  <br>
  <div class="card card-outline card-primary">
    <!-- Titulo del login -->
    <div class="card-header text-center">
      <!-- Mostramos un mensaje de bienvenida con el nombre del usuario -->
      <p class="h1">Bienvenido <?php echo $nombre?></p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Elige tu usuario</p>

      <!-- En este archivo, debe oprimir un boton para elegir el tipo de vista que desea ingresar el jefe de ventas -->
      <form action="../../app/controllers/login/choice.php" method="post" >
        <div class="row">
          <div class="col-12">
            <button name="valor" type="submit" class="btn btn-primary btn-block" value=1>Jefe de Ventas</button>
            <button name="valor" type="submit" class="btn btn-secondary btn-block" value=2>Vendedor</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
