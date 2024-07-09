<!-- Este archivo mostrara la informacion del usuario del que se desea eliminar -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../layout/jefe_venta/parte1.php");

    include("../../../app/controllers/jefe_ventas/inventario/show_producto.php");

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
            <h1 class="m-0">Eliminar un producto</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <!-- Borramos el contenido de ejemplo -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-5">
          <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Estas seguro que deseas eliminar: <?php echo $nombre?></h3>
                        <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div> -->
                    </div>

                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                              <form action="../../../app/controllers/jefe_ventas/inventario/delete_producto.php" method="post">
                                <div class="form-group">
                                    <!-- Mostramos la informacion recuperada en el archivo /controllers/usuarios/show.php -->
                                    <input type="text" name="id_producto" value="<?php echo $id_producto_get?>" hidden>
                                    <div class="form-group">
                                <center><label for="">Nombre</label></center>
                                <input type="text" name="nombre" readonly class="form-control-plaintext text-center" value="<?php echo $nombre?>">
                                </div>
                              <div class="form-group">
                              <center><label for="">Codigo SKU</label></center>
                                <input type="text" name="codigo" readonly class="form-control-plaintext text-center" value="<?php echo $codigo?>">
                              </div>
                              <div class="form-group">
                              <center><label for="">Descripción</label></center>
                                <textarea type="text" name="descripcion" rows="3" readonly class="form-control-plaintext text-center"><?php echo $descripcion?></textarea>
                              </div>
                              <div class="form-group">
                              <center><label for="">Precio</label></center>
                                <input type="number" name="precio" readonly class="form-control-plaintext text-center" value="<?php echo $precio?>">
                              </div>
                              <div class="form-group">
                              <center><label for="">stock</label></center>
                                <input type="number" name="stock" readonly class="form-control-plaintext text-center" value="<?php echo $stock?>">
                              </div>
                              <div class="form-group">
                                <center><label for="">Fecha y hora de creacion</label></center>
                                <input type="text" name="FyHcreacion" readonly class="form-control-plaintext text-center" value="<?php echo $Fecha_creacion?>">
                              </div>
                              <div class="form-group">
                                <center><label for="">Fecha y hora de actualización</label></center>
                                <input type="text" name="FyHactualizacion" readonly class="form-control-plaintext text-center" value="<?php echo $Fecha_modificacion?>">
                              </div>

                                <hr>
                                <!-- Agregamos un boton para volver a la pagina anterior -->
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" onclick="history.back()"><i class="fas fa-angle-left"></i> Volver</button>
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                                </div>
                              </form>
                          </div>
                        </div>
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
