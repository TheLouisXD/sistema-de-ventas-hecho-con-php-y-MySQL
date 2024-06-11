<?php 
    // Añadimos un mensaje universal para todas las vistas
  if ((isset($_SESSION["mensaje"])) && (isset($_SESSION["icono"])) ){
    $respuesta = $_SESSION["mensaje"];
    $icono = $_SESSION["icono"];
    ?>
    <script>
      Swal.fire({
        icon: "<?php echo $icono?>",
        text: "<?php echo $respuesta?>",
        timer: 5000
      });
    </script>
    <?php
    // Despues de mostrar el mensaje, destruimos la sesion
    unset($_SESSION["mensaje"]);
    unset($_SESSION["icono"]);
  }
?>
