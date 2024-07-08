<!-- Este archivo mostrara un formulario para actualizar la informacion del usuario que se desea actulizar despues de haberle dado al boton de "editar" en el index.php -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../layout/jefe_venta/parte1.php");

  include("../../../app/controllers/jefe_ventas/inventario/update_producto.php");

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
            <h1 class="m-0">Actualizar producto</h1>
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
          <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Editando el producto: <?php echo $nombre?></h3>
                        <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div> -->
                    </div>
                    <!-- Creamos el formulario de actualizacion de usuario -->
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <form action="../../../app/controllers/jefe_ventas/inventario/update.php" method="post" autocomplete="off">
                                    <input type="text" name="id_producto_get" value="<?php echo $id_producto_get?>" hidden>
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ejemplo: Bebida" value="<?php echo $nombre?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Codigo SKU</label>
                                    <input type="text" name="codigo" class="form-control" placeholder="Ejemplo: 123456789" value="<?php echo $codigo?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Descripción</label>
                                    <textarea type="text" name="descripcion" rows="3" class="form-control" required><?php echo $descripcion?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input type="number" name="precio" class="form-control" placeholder="Ejemplo: 10000" value="<?php echo $precio?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Stock</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Ejemplo: 120" value="<?php echo $stock?>" required>
                                </div>

                                <hr>
                                <!-- Agregamos los botones -->
                                <div class="form-group">
                                    <!-- Este boton nos envia a el listado de usuarios -->
                                    <a class="btn btn-secondary" href="index.php">Cancelar</a>
                                    <!-- Este boton envia la informaciond del formulario -->
                                    <button class="btn btn-success" type="submit">Actualizar</button>
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
