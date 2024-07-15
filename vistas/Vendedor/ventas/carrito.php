<!-- Este archivo es el index de generar ventas -->

<?php

  include("../../../app/config.php");

  // Importamos la busqueda de ventas
  include("../../../app/controllers/vendedor/ventas/listado_de_ventas.php");

  // Importamos el estado del sistema
  include("../../../app/controllers/jefe_ventas/administracion/get_estado.php");
  
  // Reducimos codigo e importamos la verificacion
  include("../../../layout/sesion_vendedor.php");

  include("../../../app/controllers/vendedor/inventario/listado_de_inventario.php");

  $btn_lateral = 2;

  include("../../../layout/vendedor/parte1.php");
  
  include("../../../layout/mensajes.php");
  
  include("../../../app/controllers/vendedor/ventas/iniciar_venta.php");

  $btn_documento = "hidden";

  if (!empty($_SESSION['carrito'])) {
    $btn_documento = null;
  }

    if(isset($_GET['action'])) {

      if ($_GET['action'] == "clearall"){

        unset($_SESSION['carrito']);
      }
    }

    if(isset($_GET['action'])) {

      if ($_GET['action'] == "remove"){

        foreach ($_SESSION['carrito'] as $key => $dato_carrito){

          if ($dato_carrito['id_producto'] == $_GET['id']){
              unset($_SESSION['carrito'][$key])  ;
          }
        }
      }
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
          <h1 class="m-0">Agregar productos</h1>
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
                        <h3 class="card-title">Elegir productos</h3>
                        <!-- Agregamos un boton para minimizar la tabla -->
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
                                        <td><?php echo $producto_dato['stock'];?></td>
                                        <td>
                                          <form method="post" action="carrito.php?id=<?= $producto_dato['id_producto'] ?>">
                                          <!-- boton para ver la informacion del producto -->
                                            <label for="">cantidad:</label>  
                                            <input type="number" class="col-md-3" name="cantidad" min="1" max="<?php echo $producto_dato['stock'];?>" value="1" >
                                            <input type="hidden" name="id_producto" value="<?= $producto_dato['id_producto']?>">
                                            <input type="hidden" name="nombre" value="<?= $producto_dato['nombre']?>">
                                            <input type="hidden" name="codigo" value="<?= $producto_dato['codigo']?>">
                                            <input type="hidden" name="precio" value="<?= $producto_dato['precio']?>">
                                            <input type="hidden" name="stock" value="<?= $producto_dato['stock']?>">
                                            <input type="submit" name="agregar_carrito" class="btn btn-success" value="agregar">     
                                          </form>
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
            <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Carrito de Compras</h3>
            </div>
            <div class="card-body">
              <table id="tabla_carrito" class="table table-bordered table-hover" <?php echo $btn_documento?>>
                <thead class="thead-dark">
                  <th>Producto</th>
                  <th>Codigo</th>
                  <th>Cantidad</th>
                  <th>Precio unitario</th>
                  <th>Neto</th>
                  <th>IVA</th>
                  <th>Total + IVA</th>
                  <th>Accion</th>
                </thead>
                <tbody>
                    <?php

                    $neto = 0;

                    if (!empty($_SESSION['carrito'])) {

                      foreach ($_SESSION['carrito'] as $key => $dato_carrito){ ?>
                        
                        <tr>
                          <td hidden ><?php echo $dato_carrito['id_producto'];?></td>
                          <td><?php echo $dato_carrito['nombre'];?></td>
                          <td><?php echo $dato_carrito['codigo'];?></td>
                          <td><?php echo $dato_carrito['cantidad'];?></td>
                          <td><?php echo $dato_carrito['precio'];?></td>
                          <td>$<?php echo number_format($dato_carrito['precio'] * $dato_carrito['cantidad'])?></td>
                          <td>$<?php echo number_format( 0.19 * ($dato_carrito['precio'] * $dato_carrito['cantidad']))?></td>
                          <td>$<?php echo number_format( 1.19 * ($dato_carrito['precio'] * $dato_carrito['cantidad']))?></td>
                          <td>
                            <a href="carrito.php?action=remove&id=<?php echo $dato_carrito['id_producto']?>">
                              <button class="btn btn-danger btn-block"> Remover </button>
                            </a>
                          </td>
                        </tr>

                        <?php

                          $neto = $neto + $dato_carrito['precio'] * $dato_carrito['cantidad'];
                          $IVA = $neto * 0.19;
                          $total = $neto + $IVA;
                        }
                        ?>

                        <tr>
                          <td colspan="3"></td>
                          <td><b>Precio total</b></td>
                          <td>$<?php echo number_format($neto); ?></td>
                          <td>$ <?php echo number_format($IVA)?></td>
                          <td>$ <?php echo number_format($total)?></td>
                          <td>
                          
                            <a href="carrito.php?action=clearall">
                              <button class="btn btn-warning btn-block" value="Borrar todo">Borrar todo</button>
                            </a>
                          </td>
                        </tr>
                      
                    <?php
                    }
                    ?>
                </tbody>
              </table>
              <center>
                <a href="boleta.php" class="btn btn-success" <?php echo $btn_documento?> >Generar Boleta</a>
                <a href="Factura.php" class="btn btn-success" <?php echo $btn_documento?> >Generar Factura</a>
              </center>
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

        "responsive": true, "lengthChange": true, "autoWidth": true
      })
    });
</script>