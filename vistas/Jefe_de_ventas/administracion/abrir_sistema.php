<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../app/controllers/jefe_ventas/administracion/get_estado.php");

  include("../../../app/controllers/jefe_ventas/usuarios/listado_de_usuarios.php");

  // Asignamos el texto "active" para que en el layout, el boton se resalte cuando se acceda a esta vista
  $btn_lateral= 3;

  include("../../../layout/jefe_venta/parte1.php");

  include("../../../layout/mensajes.php");

?>
  <!-- Incluimos el css -->
  <link rel="stylesheet" href="../../../styles/administracion.css">

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
        <!-- Aqui creamos una tarjeta para mostrar el estado del sistema -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Abrir sistema </h3>
                    </div>
                    <div class="card-body">
                      <!-- usamos el valor $estado para mostrar el estado actual del sistema -->
                        <center><h3 class="admin-card-title">elige al vendedor designado</h3></center>

                        <!-- Creamos un par de botones para cambiar el estado del Sistema -->
                        <center><form class="form-group" action="../../../app/controllers/jefe_ventas/administracion/set_estado.php" method="POST">
                          <input type="text" name="nombre_usuario" value=<?php echo $nombres_usuario?> hidden ></input>
                          <!-- Creamos el select de vendedor designado -->
                          <label for="vendedor_designado"> Vendedor: </label>
                          <select name="vendedor_designado" class="form-control w-50"><br>
                            <?php foreach($datos_usuarios as $usuario_dato){ ?>
                                <option value="<?php echo $usuario_dato['nombres']?>">
                                    <?php echo $usuario_dato['nombres']?>
                                </option>
                            <?php
                            }
                            ?>
                          </select>
                          <button type="submit" class="btn btn-success btn-lg btn_sistema" name="btn_sistema" <?php if ($id_estado == 1) echo 'hidden'?> value=1 >Abrir Sistema</button>
                        </form></center>
                    </div>

                </div>
            </div>
<?php include("../../../layout/jefe_venta/parte2.php"); ?>