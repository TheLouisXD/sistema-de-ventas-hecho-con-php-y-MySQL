<!-- Este modulo sirve para mostrar la pagina del listado de usuarios -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../app/controllers/usuarios/listado_de_usuarios.php");

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
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios</h3>
                        <!-- Agregamos un boton para minimizar la tabla -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- Insertamos una tabla en la tarjeta -->
                    <div class="card-body">
                        <table id="tabla_usuarios" class="table table-bordered table-hover">
                          <!-- Cambiamos el color de la cabecera de la tabla -->
                            <thead class="thead-dark">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acciones</th>
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
                                      // recibimos el id del usuario y lo guardamos en una variable
                                      $id_usuario = $usuario_dato['id_usuario'];

                                      $contador = $contador + 1; ?>
                                    <!-- concatenamos html para llenar la tabla con la informacion de la base de datos que necesitamos -->
                                    <tr>
                                        <td><?php echo $contador;?></td>
                                        <td><?php echo $usuario_dato['nombres'];?></td>
                                        <td><?php echo $usuario_dato['email'];?></td>
                                        <td>
                                          <!-- Aqui ponemos los botones de accion en la tabla de usuarios -->
                                        <center><div type="button" class="btn-group">
                                          <!-- Este boton nos lleva  a la vista "show.php" junto con el id del usuario que queremos ver más informacion -->

                                          <!-- boton para ver la informacion del usuario -->
                                            <a href="show.php?id=<?php echo $id_usuario?>" class="btn btn-info"> Ver
                                              <i class="fas fa-user-circle"></i>
                                            </a>
                                            <!-- boton para actualizar la informacion del usuario -->
                                            <a href="update.php?id=<?php echo $id_usuario?>"  type="button" class="btn btn-success">
                                              <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <!-- boton para eliminar al usuario -->
                                            <a href="delete.php?id=<?php echo $id_usuario?>"  type="button" class="btn  btn-danger">
                                              <i class="fas fa-trash"></i> Eliminar
                                            </a>
                                          </div></center>
                                        </td>
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
      $("#tabla_usuarios").DataTable({
          // Aqui elegimos cuantos elementos se muestran por pagina
          "pageLength": 5,
          // Cambiamos el idioma de dataTables
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
              "infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
              "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Usuarios",
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

        "responsive": true, "lengthChange": true, "autoWidth": true,
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
      }).buttons().container().appendTo('#tabla_usuarios_wrapper .col-md-6:eq(0)');
    });
  </script>
