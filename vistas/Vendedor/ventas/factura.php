<!-- Este archivo es el index de generar facturas -->

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

  include("../../../app/controllers/vendedor/ventas/listado_boleta.php");

  include("../../../layout/vendedor/parte1.php");
  
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
          <h1 class="m-0">Generar factura</h1>
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
              <h3 class="card-title">Vista previa de la Factura</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="../../../app/controllers/vendedor/ventas/generar_factura.php">
                <table id="tabla_carrito" class="table table-bordered table-hover" >
                <thead class="thead-dark">
                  <th>Producto</th>
                  <th>Codigo</th>
                  <th>Cantidad</th>
                  <th>Precio unitario</th>
                  <th>Neto</th>
                  <th>IVA</th>
                  <th>Total + IVA</th>
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
                        </tr>

                        <?php

                          $neto = $neto + $dato_carrito['precio'] * $dato_carrito['cantidad'];
                          $IVA = $neto * 0.19;
                          $total = $neto + $IVA;
                        }
                        ?>

                        <tr>
                            <td><b>Fecha y hora:</b></td>
                            <td><?php echo $fechaHora?></td>
                          <td colspan="1"></td>
                          <td><b>Precio total</b></td>
                          <td>$<?php echo number_format($neto); ?></td>
                          <td>$ <?php echo number_format($IVA)?></td>
                          <td>$ <?php echo number_format($total)?></td>
                        </tr>
                      
                    <?php
                    }
                    ?>
                </tbody>
              </table>
              <div class="m-3">
              <center>
                <label for="razon_cliente">Razón social del cliente</label>
                <input name="razon_cliente" type="text" class="form-control w-50" placeholder="Ejemplo: Inacap" maxlength="255" required></input>

                <label for="rut_cliente">Rut del cliente</label>
                <input name="rut_cliente" type="text" class="form-control w-50" placeholder="Ejemplo: 12.345.678-9" maxlength="12" required></input>

                <label for="giro_cliente">Giro</label>
                <input name="giro_cliente" type="text" class="form-control w-50" placeholder="Ejemplo: Bazar" maxlength="255" required></input>

                <label for="direccion_cliente">Direccion</label>
                <input name="direccion_cliente" type="text" class="form-control w-50" placeholder="Ejemplo: Los molinos 3468" maxlength="255" required></input>
                
              <label for="metodo_pago"> Metodo de pago: </label>
              <select  name="metodo_pago" id="metodo_pago" class="form-control w-50" required>
                <option value="debito" selected>Debito</option>
                <option value="efectivo">Efectivo</option>
                <option value="credito">Credito</option>
              </select>
              <br>
              <input type="submit" value="Confimar venta" class="btn btn-success w-50"></center>
              </div>
            </form>
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