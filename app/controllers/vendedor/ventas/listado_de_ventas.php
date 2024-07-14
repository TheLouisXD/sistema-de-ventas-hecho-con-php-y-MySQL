<!--Este modulo sirve para poder recuperar la informacion de las ventas para luego exportarla al archivo /ventas/index.php -->

<?php 
    // creamos una consulta sql que recupere todos los campos de la tabla ventas.
    $sql_ventas = "SELECT * FROM tb_venta ORDER BY id_venta DESC LIMIT 5";
    $query_ventas = $pdo->prepare($sql_ventas);
    $query_ventas->execute();
    $datos_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);
?>