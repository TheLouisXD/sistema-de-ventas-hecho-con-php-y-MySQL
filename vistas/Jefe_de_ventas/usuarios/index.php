<!-- Este modulo sirve para mostrar la pagina del listado de usuarios -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../app/controllers/usuarios/listado_de_usuarios.php");

  include("../../../layout/jefe_venta/parte1.php");

  // Añadimos un mensaje en caso de que se haya registrado un usuario con exito
  if (isset($_SESSION["mensaje_exito"])){
    $respuesta = $_SESSION['mensaje_exito']; ?>
    
    <!-- Error: no aparece el texto -->
    <script>
      Swal.fire({
        icon: "success",
        Title: "Se ha registrado al usuario <?php echo $respuesta?>",
        timer: 5000
      });
    </script>
    <?php
    // Despues de mostrar el mensaje, destruimos la sesion
    unset($_SESSION["mensaje_exito"]);
  }  
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- Borramos el contenido de ejemplo y aumentamos a 12 columnas -->
          <div class="col-sm-12">
            <h1 class="m-0">Listado de usuarios</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <!-- Borramos el contenido de ejemplo -->
    <div class="content">
      <div class="container-fluid">
        <!-- Aqui creamos una tarjeta para listado de usuarios -->
        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- Insertamos una tabla en la tarjeta -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                          <!-- Cambiamos el color de la cabecera de la tabla -->
                            <thead class="thead-dark">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                            </thead>
                            <!-- Agregamos el codigo correspondiente para mostrar la informacion obtenida en el controlador de listado de usuarios -->
                            <tbody>
                                <?php 
                                    //incluimos el controlador pero en la parte de arriba para evitar errores
                                    // include("../app/controllers/usuarios/listado_de_usuarios.php");
                                    // Creamos un contador para contar los usuarios
                                    $contador = 0;
                                    // por cada usuario se imprimira informacion
                                    foreach($datos_usuarios as $usuario_dato){
                                      $contador = $contador + 1; ?>
                                    <!-- concatenamos html para llenar la tabla con la informacion de la base de datos que necesitamos -->
                                    <tr>
                                        <td><?php echo $contador;?></td>
                                        <td><?php echo $usuario_dato['nombres'];?></td>
                                        <td><?php echo $usuario_dato['email'];?></td>
                                    </tr>
                                    <!-- Cuando ya terminamos de insertar la informacion, volvemos a abrir el codigo php para asi poder hacer que el codigo funcione :D -->
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
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
