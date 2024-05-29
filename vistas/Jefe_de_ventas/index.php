<!-- Pagina principal o dashboard del sistema de ventas, creado utilizando el framework adminLTE, en este archivo se implementa la vista principal, junto con el uso de frameworks como sweetalert2 y uso de php para validar sesiones -->

<!-- Agregamos $URL a los links con otras carpetas para evitar errores -->


<!-- Codigo PHP para validar que el usuario haya iniciado sesion, de lo contrario, debera llevarlo a la pantalla de login. -->
<?php

  include("../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../layout/sesion_jefe_venta.php");

  include("../../layout/jefe_venta/parte1.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- Borramos el contenido de ejemplo y aumentamos a 12 columnas -->
          <div class="col-sm-12">
            <h1 class="m-0">Bienvenido <?php echo $nombre_sesion?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <!-- Borramos el contenido de ejemplo -->
    <div class="content">
      <div class="container-fluid">
        
        Estas en la vista de Jefe de ventas
        <br>
        <hr>
        <img src="https://c.tenor.com/weB7SDBJ1lgAAAAC/tenor.gif" alt="">
        <h1 style="font-family: Impact;">Espejo culiao hecho en html :0 </h1>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include("../../layout/jefe_venta/parte2.php"); ?>
