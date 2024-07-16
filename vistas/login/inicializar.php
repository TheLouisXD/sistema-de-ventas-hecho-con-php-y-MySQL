
<!-- En esta pagina el Jefe de ventas debe elegir en que vista desea ingresar -->

<?php

// Codigo que verifica que la sesion choice este iniciada
include("../../app/config.php");

  session_start();
  include("../../layout/mensajes.php");

  if (isset($_SESSION["inicializar"])){
    echo "hola";
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
        background-image: url("https://i.pinimg.com/564x/c8/77/9f/c8779f09b14cb34c1702187db6f63154.jpg");
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
      <p class="h1">Ingresa tus datos</p>
    </div>
    <div class="card-body">

      <!-- En este archivo, debe oprimir un boton para elegir el tipo de vista que desea ingresar el jefe de ventas -->
      <form action="../../app/controllers/login/crear_primer_usuario.php" method="post" autocomplete="off">
            <div class="form-group">
            <!-- Hay que agregar el nombre a cada campo -->
                <label for="">Nombre y Apellido</label>
                <input type="text" name="Nombres" class="form-control" placeholder="Ejemplo: Luis Perez" required>
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Ejemplo: Luis.Perez@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="text" name="password_user" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Repita la contraseña</label>
                <input type="text" name="password_repeat" class="form-control" required>
            </div>

            <!-- Agregamos el input para elegir rol del usuario -->
            <input type="number" name="rol" value="1" hidden>

                              <hr>
                <!-- Agregamos los botones -->
                <div class="form-group">
                    <!-- Este boton nos envia a el listado de usuarios -->
                    <button type="reset" class="btn btn-secondary" href="index.php">Limpiar</button>
                        <!-- Este boton envia la informaciond del formulario -->
                    <button class="btn btn-primary" type="submit">Guardar</button>
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
