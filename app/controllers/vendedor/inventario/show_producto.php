<!-- Este controlador sirve para recuperar la informacion de un producto especifico -->

<?php
    // Este codigo recupera el id desde el id que esta en la url de la pagina
    $id_producto_get = $_GET['id'];

    // Ejecutamos la sentencia sql en donde recuperara la informacion del producto con el id recuperado
    $sql_producto = "SELECT * FROM tb_inventario WHERE id_producto = '$id_producto_get';";
    $query_producto = $pdo->prepare($sql_producto);
    $query_producto->execute();
    $datos_producto = $query_producto->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datos_producto as $producto_dato) {
        $codigo = $producto_dato['codigo'];
        $nombre = $producto_dato['nombre'];
        $descripcion = $producto_dato['descripcion'];
        $stock = $producto_dato['stock'];
        $precio = $producto_dato['precio'];
        $Fecha_creacion = $producto_dato['fyh_creacion'];
        $Fecha_modificacion = $producto_dato['fyh_actualizacion'];
    }

?>