<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../app/controllers/jefe_ventas/administracion/get_estado.php");

  // Asignamos el texto "active" para que en el layout, el boton se resalte cuando se acceda a esta vista
  $btn_lateral= 3;

  include("../../../layout/jefe_venta/parte1.php");

  include("../../../layout/mensajes.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- Borramos el contenido de ejemplo y aumentamos a 12 columnas -->
          <div class="col-sm-12">
            <h1 class="m-0">Administrar sistema</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Borramos el contenido de ejemplo -->
    <div class="content">
      <div class="container-fluid">
        <!-- Aqui creamos una tarjeta para listado de inventario -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">El sistema se encuentra <?php echo $estado?></h3>
                        <!-- Agregamos un boton para minimizar la tabla -->
                        <div class="card-tools">
                        <a href="<?php echo $URL?>/vistas/Jefe_de_ventas/inventario/create.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Añadir producto</a>
                        </div>
                    </div>
                        hola
                    </div>

                </div>
            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




    <?php include("../../../layout/jefe_venta/parte2.php"); ?>