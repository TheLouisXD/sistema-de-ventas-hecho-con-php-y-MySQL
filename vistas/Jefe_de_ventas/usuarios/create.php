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
            <h1 class="m-0">Registro de usuarios</h1>
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
                        <h3 class="card-title">Creacion de usuarios</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                    <!-- Creamos el formulario de registro de usuarios en la tarjeta -->
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">

                            <!-- El formulario envia la informacion al controlador create.php para asi poder registrar los datos -->
                            <form action="../../../app/controllers/usuarios/create.php" method="post" autocomplete="off">
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
                              <label for="">Rol del usuario</label>
                              <select class="custom-select" name="rol" id="inputGroupSelect01" required>
                                <option value="2">Vendedor</option>
                                <option value="1">Jefe de ventas</option>
                              </select>

                              <hr>
                              <!-- Agregamos los botones -->
                              <div class="form-group">
                                <!-- Este boton nos envia a el listado de usuarios -->
                                <a class="btn btn-secondary" href="index.php">Cancelar</a>
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
