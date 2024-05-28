<!-- Este archivo incluye la base la interfaz del sistema de ventas, el hacerlo de forma separada nos permite reutilizar codigo y asi ahorrar lineas de codigo -->

<!-- Sidebar desplegable que mostrara datos del usuario para asi saber que usuario ingreso al sistema -->
  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Agregamos informacion del usuario como su nombre y su correo -->
    <div class="p-3">
      <h5>Datos del usuario</h5>
      <p>Id: <br> <?php echo $id_usuario?></p>
      <p>Nombre: <br> <?php echo $nombre_sesion?></p>
      <p>Correo: <br> <?php echo $email_tabla?></p>
      <p>Rol: <br> <?php echo $descripcion?></p>
      <p>Fecha y hora de creacion: <br> <?php echo $Fecha_creacion?></p>
      <p>Fecha y hora de modificacion: <br> <?php echo $Fecha_modificacion?></p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <img src="https://c.tenor.com/9RCIDZjkhBsAAAAC/tenor.gif" alt="" height="30px">
    </div>
    <!-- Copyright del sistema (Cambiar despues) -->
    <strong>Copyright &copy; 2024 <a href="https://github.com/TheLouisXD">TheLouisXD</a>.</strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL?>/public/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
