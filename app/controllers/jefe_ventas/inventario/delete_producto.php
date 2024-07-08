<?php
    include("../../../config.php");

     // obtenemos los datos del formulario

    $id_producto = $_POST['id_producto'];

    $nombre = $_POST['nombre'];

    // Recuperamos el id del producto que se desea eliminar

        // Creamos la sentencia SQL
        $sentencia = $pdo->prepare("DELETE FROM tb_inventario WHERE id_producto = :id_producto");
        
        // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
        $sentencia->bindParam("id_producto", $id_producto);

        // Ejecutamos la sentencia
        $sentencia->execute();

        // iniciamos sesion con un mensaje de exito
        session_start();
        $_SESSION["mensaje"] = "El producto ".$nombre." fue eliminado con exito";
        $_SESSION['icono'] = "success";
        header("Location:".$URL."/vistas/Jefe_de_ventas/inventario");
?>