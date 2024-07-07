<!-- En este modulo incluimos la funcionalidad de creacion de usuarios en la base de datos -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

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
            <h1 class="m-0">Registro de producto</h1>
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
          <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Creacion de productos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- Creamos el formulario de registro de usuarios en la tarjeta -->
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">

                            <!-- El formulario envia la informacion al controlador create.php para asi poder registrar los datos -->
                            <form action="../../../app/controllers/jefe_ventas/inventario/create_producto.php" method="post" autocomplete="off">
                              
                              <div class="form-group">
                                <!-- Hay que agregar el nombre a cada campo -->
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Ejemplo: Bebida" required>
                              </div>
                              <div class="form-group">
                                <label for="">Codigo SKU</label>
                                <input type="text" name="codigo" class="form-control" placeholder="Ejemplo: CEL-MOT-G50-16" required>
                              </div>
                              <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea type="text" name="descripcion" class="form-control" rows="3" placeholder="Ejemplo: Bebida sabor naranja" required></textarea>
                              </div>
                              <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" name="precio" class="form-control" placeholder="Ejemplo: 10000" required>
                              </div>
                              <div class="form-group">
                                <label for="">stock</label>
                                <input type="number" name="stock" class="form-control" placeholder="Ejemplo: 100" required>
                              </div>

                              <hr>
                              <!-- Agregamos los botones -->
                              <div class="form-group">
                                <!-- Este boton nos envia a el listado de usuarios -->
                                <a class="btn btn-secondary" href="index.php">Volver</a>
                                <!-- Este boton envia la informaciond del formulario -->
                                <button class="btn btn-primary" type="submit">Guardar</button>
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
