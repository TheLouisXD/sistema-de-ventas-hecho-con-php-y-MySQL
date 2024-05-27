<!-- Este archivo cierra la sesion del usuario -->

<?php
    include("../../config.php");

    session_start();
    if (isset($_SESSION["session_nombre"])) {
        session_destroy();
        header('Location: '.$URL.'/');
    }

?>