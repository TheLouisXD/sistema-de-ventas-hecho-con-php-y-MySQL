<!-- Este archivo cierra la sesion del usuario -->

<?php
    include("../../config.php");

    session_start();
    if (isset($_SESSION["jefe_venta"])) {
        session_destroy();
        header('Location: '.$URL.'/');
    }

    if (isset($_SESSION['vendedor'])) {
        session_destroy();
        header('Location: '.$URL.'/');
    }
?>