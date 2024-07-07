<!--Este modulo sirve para poder recuperar la informacion de los usuarios para luego exportarla al archivo /usuarios/index.php -->

<?php 
    // incluimos la conexion a la base de datos
    // en este caso no es necesario por que ya estaba incluido en el index.php
    // include("../../config.php");

    // creamos una consulta sql que recupere todos los campos de la tabla usuarios.
    $sql_inventario = "SELECT * FROM tb_inventario";
    $query_inventario = $pdo->prepare($sql_inventario);
    $query_inventario->execute();
    $datos_inventario = $query_inventario->fetchAll(PDO::FETCH_ASSOC);
?>