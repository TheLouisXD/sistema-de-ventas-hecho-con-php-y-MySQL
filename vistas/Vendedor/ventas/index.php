<!-- Este archivo es el index de generar ventas -->

<?php

  include("../../../app/config.php");

  // Importamos el estado del sistema
  include("../../../app/controllers/jefe_ventas/administracion/get_estado.php");
  
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_vendedor.php");

  $btn_lateral = 2;

  include("../../../layout/vendedor/parte1.php");
  
  include("../../../layout/mensajes.php");?>

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
          <h1 class="m-0">Crear Ventas</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <!-- Borramos el contenido de ejemplo -->
  <div class="content">
    <div class="container-fluid">
      <!-- Aqui creamos una tarjeta para mostrar el boton de inicio de venta -->
      <div class="row">
          <div class="col-md-12">
              <div class="card card-outline card-primary">
                  <div class="card-header">
                      <h3 class="card-title"> Iniciar una venta </h3>
                  </div>
                  <div class="card-body">
                    <!-- Mostramos intrucciones para el usuario -->
                      <center><h2 class="admin-card-title">Para iniciar una venta <br> haz click en el boton "iniciar venta"</h2></center>
                        <!-- Boton para iniciar una venta -->
                        <center><button type="submit" class="btn btn-success btn-lg btn_sistema" name="btn_sistema" value=1 >Iniciar Venta</button></center>
                  </div>

              </div>
          </div>
          <!-- Insertamos otra tarjeta -->
          <div class="col-md-12">
              <div class="card card-outline card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Ultimas ventas</h3>
                      <!-- Agregamos un boton para minimizar la tabla -->
                      <div class="card-tools">
                        <button type="button" class="btn btn-tools" data-card-widget="collapse">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                  </div>
                  <!-- Insertamos una tabla en la tarjeta -->
                  <div class="card-body">
                      <table id="tabla_ventas" class="table table-bordered table-hover">
                        <!-- Cambiamos el color de la cabecera de la tabla -->
                          <thead class="thead-dark">
                              <th>Id</th>
                              <th>Nombre del vendedor</th>
                              <th>Fecha y hora de la venta</th>
                              <th>hola :3</th>
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
                                    $id_estado_log = $admin_dato['id_estado'];?>
                                  <!-- concatenamos html para llenar la tabla con la informacion de la base de datos que necesitamos -->
                                  <tr>
                                      <td><?php echo $contador;?></td>
                                      <td><?php echo $nombre_usuario;?></td>
                                      <td><?php echo $fyh_accion;?></td>
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

  <?php include("../../../layout/vendedor/parte2.php"); ?>

    <!-- Script para ejecutar DataTable, lo colocamos aqui por que este script requiere de unos plugisn que son importados en parte2.php -->
    <script>
    $(function () {
      $("#tabla_ventas").DataTable({
          // Aqui elegimos cuantos elementos se muestran por pagina
          "pageLength": 5,
          // Cambiamos el idioma de dataTables
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Ventas",
              "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Ventas",
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
      }).buttons().container().appendTo('#tabla_ventas_wrapper .col-md-6:eq(0)');
    });
  </script>