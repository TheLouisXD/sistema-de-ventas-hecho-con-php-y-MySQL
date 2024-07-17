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
                        <h3 class="card-title"> Administrar </h3>
                    </div>
                    <div class="card-body">
                      <!-- usamos el valor $estado para mostrar el estado actual del sistema -->
                        <center><h2 class="admin-card-title">El sistema se encuentra <?php echo $estado?></h2></center>

                        <!-- Creamos un par de botones para cambiar el estado del Sistema -->
                        <center><form class="form-group" action="../../../app/controllers/jefe_ventas/administracion/set_estado.php" method="POST">
                          <input type="text" name="nombre_usuario" value=<?php echo $nombres_usuario?> hidden ></input>
                          <a href="../administracion/abrir_sistema.php" class="btn btn-success btn-lg btn_sistema" name="btn_sistema" <?php if ($id_estado == 1) echo 'hidden'?> >Abrir Sistema</a>
                          <button type="submit" class="btn btn-danger btn-lg btn_sistema" name="btn_sistema" <?php if ($id_estado == 2) echo 'hidden'?> value=2 >Cerrar Sistema</button>
                        </form></center>
                    </div>

                </div>
            </div>
            <!-- Insertamos otra tarjeta -->
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Acciones previas</h3>
                        <!-- Agregamos un boton para minimizar la tabla -->
                        <div class="card-tools">
                          <button type="button" class="btn btn-tools" data-card-widget="collapse">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                    </div>
                    <!-- Insertamos una tabla en la tarjeta -->
                    <div class="card-body">
                        <table id="tabla_log" class="table table-bordered table-hover">
                          <!-- Cambiamos el color de la cabecera de la tabla -->
                            <thead class="thead-dark">
                                <th>Nro</th>
                                <th>Nombre del usuario</th>
                                <th>Fecha y hora de la accion</th>
                                <th>Vendedor designado</th>
                                <th>Estado</th>
                            </thead>
                            <!-- Agregamos el codigo correspondiente para mostrar la informacion obtenida en el controlador de listado de usuarios -->
                            <tbody>
                                <?php 
                                    //incluimos el controlador pero en la parte de arriba para evitar errores
                                    // include("../app/controllers/usuarios/listado_de_usuarios.php");
                                    // Creamos un contador para contar los usuarios
                                    $contador = 0;
                                    // por cada usuario se imprimira informacion
                                    foreach($datos_admin as $admin_dato){
                                      $contador = $contador + 1;
                                      $id_log = $admin_dato['id_log'];
                                      $nombre_usuario = $admin_dato['nombre_usuario'];
                                      $fyh_accion = $admin_dato['FyH_accion'];
                                      $vendedor_designado = $admin_dato['vendedor_designado'];
                                      $id_estado_log = $admin_dato['id_estado'];?>
                                    <!-- concatenamos html para llenar la tabla con la informacion de la base de datos que necesitamos -->
                                    <tr>
                                        <td><?php echo $contador;?></td>
                                        <td><?php echo $nombre_usuario;?></td>
                                        <td><?php echo $fyh_accion;?></td>
                                        <td><?php echo $vendedor_designado;?></td>
                                        <!-- Agregamos una logica para imprimir el rol del usuario en la tabla de usuarios basandonos en el id_rol del usuario -->
                                        <td><?php if ($id_estado_log == 1){
                                                    echo "Abierto";
                                                  }elseif ($id_estado_log == 2){
                                                    echo "Cerrado";
                                                  }?></td>
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

    <!-- Script para ejecutar DataTable, lo colocamos aqui por que este script requiere de unos plugisn que son importados en parte2.php -->
    <script>
    $(function () {
      $("#tabla_log").DataTable({
          // Aqui elegimos cuantos elementos se muestran por pagina
          "pageLength": 5,
          // Cambiamos el idioma de dataTables
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Acciones",
              "infoEmpty": "Mostrando 0 to 0 of 0 Acciones",
              "infoFiltered": "(Filtrado de _MAX_ total Acciones)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Acciones",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
            },
          /* fin de idiomas */

        "responsive": true, "lengthChange": true, "autoWidth": true, "order": [[0, "desc"]],
        // Cambiamos lo botones para que se vea más limpia la interfaz, haciendo que las funciones de exportar y la visibilidad de las columnas sean botones separados
        "buttons": [{
          extend: 'collection',
          text: 'Exportar',
          orientation: 'landscape',
          buttons:[{text: 'copiar', extend: 'copy'},
                    "csv", 
                    "excel",
                    "pdf",
                    {text: 'Imprimir' , extend:"print"}] 
        },
        { text: 'ver columnas',
          extend:"colvis"}
        ]
        // para que funcionen los botones, debemos poner el nombre de la tabla seguido de _wrapper
      }).buttons().container().appendTo('#tabla_log_wrapper .col-md-6:eq(0)');
    });
  </script>