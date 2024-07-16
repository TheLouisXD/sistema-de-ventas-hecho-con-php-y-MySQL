<?php 
    include("../../config.php");
    session_start();
    $_SESSION["inicializar"] = "true";
    header("Location: ".$URL."/vistas/login/inicializar.php");

?>