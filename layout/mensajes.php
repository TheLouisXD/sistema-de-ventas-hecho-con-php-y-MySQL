<?php 
    // Añadimos un mensaje en caso de que las contraseñas no sean identicas
  if (isset($_SESSION["mensaje_error"])){
    $respuesta = $_SESSION['mensaje_error']; ?>
    <script>
      Swal.fire({
        icon: "error",
        text: "<?php echo $respuesta?>",
        timer: 5000
      });
    </script>
    <?php
    // Despues de mostrar el mensaje, destruimos la sesion
    unset($_SESSION["mensaje_error"]);
  }
  ?>

  <?php
  if (isset($_SESSION["mensaje_exito"])){
    $respuesta = $_SESSION['mensaje_exito']; ?>
    <script>
      Swal.fire({
        icon: "success",
        text: "<?php echo $respuesta?>",
        timer: 5000
      });
    </script>
    <?php
    // Despues de mostrar el mensaje, destruimos la sesion
    unset($_SESSION["mensaje_exito"]);
  }
?>

<?php
  if (isset($_SESSION["mensaje"])){
    $respuesta = $_SESSION['mensaje']; ?>
    <script>
      Swal.fire({
        icon: "success",
        text: "<?php echo $respuesta?>",
        timer: 5000
      });
    </script>
    <?php
    // Despues de mostrar el mensaje, destruimos la sesion
    unset($_SESSION["mensaje_exito"]);
  }
?>
