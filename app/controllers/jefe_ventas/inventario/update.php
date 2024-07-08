<?php
    include("../../../config.php");

     // obtenemos los datos del formulario

    $id_producto = $_POST['id_producto_get'];
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Recuperamos el id del producto que se desea modificar

    // Creamos la sentencia SQL
    $sentencia = $pdo->prepare("UPDATE tb_inventario 
    SET codigo =:codigo,
        nombre =:nombre,
        descripcion =:descripcion,
        stock =:stock, 
        precio =:precio, 
        fyh_actualizacion =:fyh_actualizacion
    WHERE id_producto = :id_producto ");
    
    // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
    $sentencia->bindParam("id_producto", $id_producto);
    $sentencia->bindParam("codigo", $codigo);
    $sentencia->bindParam("nombre", $nombre);
    $sentencia->bindParam("descripcion", $descripcion);
    $sentencia->bindParam("stock", $stock);
    $sentencia->bindParam("precio", $precio);
    $sentencia->bindParam("fyh_actualizacion", $fechaHora);
        
    // Ejecutamos la sentencia
    $sentencia->execute();

    // iniciamos una sesion con un mensaje de exito
    session_start();
    $_SESSION["mensaje"] = "El producto ".$nombre." fue actualizado con exito";
    $_SESSION['icono'] = "success";
    header("Location:".$URL."/vistas/Jefe_de_ventas/inventario");
?>