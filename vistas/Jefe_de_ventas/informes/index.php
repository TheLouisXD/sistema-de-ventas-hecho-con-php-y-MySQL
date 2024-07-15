<!-- Este modulo sirve para mostrar la pagina del listado de inventario -->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../app/controllers/jefe_ventas/inventario/listado_de_inventario.php");

  // Asignamos el texto "active" para que en el layout, el boton se resalte cuando se acceda a esta vista
  $btn_lateral = 2;

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
            <h1 class="m-0">Listado de inventario</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <!-- Borramos el contenido de ejemplo -->
    <div class="content">
      <div class="container-fluid">
        <!-- Aqui creamos una tarjeta para listado de inventario -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Inventario</h3>
                        <!-- Agregamos un boton para minimizar la tabla -->
                        <div class="card-tools">
                        <a href="<?php echo $URL?>/vistas/Jefe_de_ventas/inventario/create.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Añadir producto</a>
                        </div>
                    </div>
                    <!-- Insertamos una tabla en la tarjeta -->
                    <div class="card-body">
                        <table id="tabla_inventario" class="table table-bordered table-hover">
                          <!-- Cambiamos el color de la cabecera de la tabla -->
                            <thead class="thead-dark">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Codigo (SKU)</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </thead>
                            <!-- Agregamos el codigo correspondiente para mostrar la informacion obtenida en el controlador de listado de inventario -->
                            <tbody>
                                    <?php
                                    
                                    $contador = 0;

                                    foreach($datos_inventario as $producto_dato){ 

                                      $contador = $contador + 1;

                                        $id_producto = $producto_dato['id_producto']?>
                                    <!-- concatenamos html para llenar la tabla con la informacion de la base de datos que necesitamos -->
                                    <tr>
                                        <td><?php echo $contador?></td>
                                        <td><?php echo $producto_dato['nombre'];?></td>
                                        <td><?php echo $producto_dato['codigo'];?></td>
                                        <td><?php echo $producto_dato['precio'];?></td>
                                        <!-- Agregamos una logica para imprimir el rol del usuario en la tabla de inventario basandonos en el id_rol del usuario -->
                                        <td><?php echo $producto_dato['stock'];?></td>
                                        <td>
                                          <!-- Aqui ponemos los botones de accion en la tabla de inventario -->
                                        <center><div type="button" class="btn-group">
                                          <!-- Este boton nos lleva  a la vista "show.php" junto con el id del usuario que queremos ver más informacion -->

                                          <!-- boton para ver la informacion del usuario -->
                                            <a href="show.php?id=<?php echo $id_producto?>" class="btn btn-info"> Ver
                                              <i class="fas fa-user-circle"></i>
                                            </a>
                                            <!-- boton para actualizar la informacion del usuario -->
                                            <a href="update.php?id=<?php echo $id_producto?>"  type="button" class="btn btn-success">
                                              <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <!-- boton para eliminar al usuario -->
                                            <a href="delete.php?id=<?php echo $id_producto?>"  type="button" class="btn  btn-danger">
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
      $("#tabla_inventario").DataTable({
          // Aqui elegimos cuantos elementos se muestran por pagina
          "pageLength": 5,
          // Cambiamos el idioma de dataTables
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
              "infoEmpty": "Mostrando 0 a 0 de 0 productos",
              "infoFiltered": "(Filtrado de _MAX_ total inventario)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ productos",
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
      }).buttons().container().appendTo('#tabla_inventario_wrapper .col-md-6:eq(0)');
    });
  </script>
