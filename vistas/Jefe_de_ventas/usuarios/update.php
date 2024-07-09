<!-- Este archivo mostrara un formulario para actualizar la informacion del usuario que se desea actulizar despues de haberle dado al boton de "editar" en el index.php -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  // Asignamos el texto "active" para que en el layout, el boton se resalte cuando se acceda a esta vista
  $btn_lateral = 1;

  include("../../../layout/jefe_venta/parte1.php");

  include("../../../app/controllers/jefe_ventas/usuarios/update_usuario.php");

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
            <h1 class="m-0">Actualizar usuario</h1>
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
                        <h3 class="card-title">Editando al usuario: <?php echo $nombres?></h3>
                        <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div> -->
                    </div>
                    <!-- Creamos el formulario de actualizacion de usuario -->
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <form action="../../../app/controllers/jefe_ventas/usuarios/update.php" method="post" autocomplete="off">
                                    <input type="text" name="id_usuario_get" value="<?php echo $id_usuario_get?>" hidden>
                                <div class="form-group">
                                    <label for="">Nombre y Apellido</label>
                                    <input type="text" name="Nombres" class="form-control" placeholder="Ejemplo: Luis Perez" value="<?php echo $nombres?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="Ejemplo: Luis.Perez@gmail.com" value="<?php echo $email?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="text" name="password_user" class="form-control" value="" required>
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
