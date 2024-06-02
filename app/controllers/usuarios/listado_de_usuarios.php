<!--Este modulo sirve para poder recuperar la informacion de los usuarios para luego exportarla al archivo /usuarios/index.php -->

<?php 
    // incluimos la conexion a la base de datos
    // en este caso no es necesario por que ya estaba incluido en el index.php
    // include("../../config.php");

    // creamos una consulta sql que recupere todos los campos de la tabla usuarios.
    $sql_usuarios = "SELECT * FROM tb_usuarios";
    $query_usuarios = $pdo->prepare($sql_usuarios);
    $query_usuarios->execute();
    $datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
?>