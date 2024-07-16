<!-- Este modulo sirve para mostrar la pagina del listado de informes-->

<?php

  include("../../../app/config.php");
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_jefe_venta.php");

  include("../../../app/controllers/jefe_ventas/informes/get_informes.php");

  // Asignamos el texto "active" para que en el layout, el boton se resalte cuando se acceda a esta vista
  $btn_lateral = 4;

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
            <h1 class="m-0">Listado de informes</h1>
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
                        <h3 class="card-title">Informes</h3>
                    </div>
                    <!-- Insertamos una tabla en la tarjeta -->
                    <div class="card-body">
                        <table id="tabla_informes" class="table table-bordered table-hover">
                          <!-- Cambiamos el color de la cabecera de la tabla -->
                            <thead class="thead-dark">
                              <th>Nro informe</th>
                              <th>Fecha</th>
                              <th>Vendedor designado</th>
                              <th>Informe General</th>
                              <th>Informe de Boletas</th>
                              <th>Informe de Facturas</th>
                            </thead>
                            <!-- Agregamos el codigo correspondiente para mostrar la informacion obtenida en el controlador de listado de informes -->
                            <tbody>
                                    <?php
                                    foreach($datos_informes as $informe_dato){ ?>
                                    <!-- concatenamos html para llenar la tabla con la informacion de la base de datos que necesitamos -->
                                    <tr>
                                        <td><?php echo $informe_dato['id_informe']?></td>
                                        <td><?php echo $informe_dato['fecha']?></td>
                                        <td><?php echo $informe_dato['vendedor_designado']?></td>
                                        <td><center><a href="../../../Documentos/Informes/<?php echo $informe_dato['informe_general'] ?>" class="btn btn-secondary"><i class="fa fa-eye"></i> Ver</a></center></td>
                                        <td><center><a href="../../../Documentos/Informes/<?php echo $informe_dato['informe_boletas'] ?>" class="btn btn-secondary"><i class="fa fa-eye"></i> Ver</a></center></td>
                                        <td><center><a href="../../../Documentos/Informes/<?php echo $informe_dato['informe_facturas'] ?>" class="btn btn-secondary"><i class="fa fa-eye"></i> Ver</a></center></td>
                                        
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
      $("#tabla_informes").DataTable({
          // Aqui elegimos cuantos elementos se muestran por pagina
          "pageLength": 5,
          // Cambiamos el idioma de dataTables
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ informes",
              "infoEmpty": "Mostrando 0 a 0 de 0 informes",
              "infoFiltered": "(Filtrado de _MAX_ total inventario)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ informes",
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
        // Elegimos el orden
        "order": [[0, "desc"]],
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
      }).buttons().container().appendTo('#tabla_informes_wrapper .col-md-6:eq(0)');
    });
  </script>
