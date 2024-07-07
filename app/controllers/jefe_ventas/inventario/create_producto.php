<!-- Este controlador recibe la informacion del formulario de creacion de productos y la inserta en la tabla de productos -->

<?php
    
    include("../../../config.php");

    // obtenemos los datos del formulario

    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $consulta = $pdo->prepare("SELECT COUNT(*) FROM tb_inventario WHERE codigo = :codigo");
    $consulta->bindParam(":codigo", $codigo);
    $consulta->execute();
    $existeCodigo = $consulta->fetchColumn();

    // verificamos que el codigo no se repita
    if ($existeCodigo > 0) {
        // Creamos una sesión con un mensaje de error si el código ya existe
        session_start();
        $_SESSION["mensaje"] = "Error, el código ya existe en la base de datos";
        $_SESSION['icono'] = "error";
        header("Location:".$URL."/vistas/Jefe_de_ventas/inventario/create.php");

    } else {
        // Creamos la sentencia SQL
        $sentencia = $pdo->prepare("INSERT INTO tb_inventario (codigo, nombre, descripcion, stock, precio, fyh_creacion) VALUES (:codigo, :nombre, :descripcion, :stock, :precio, :fyh_creacion)");
        
        // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
        $sentencia->bindParam("codigo", $codigo);
        $sentencia->bindParam("nombre", $nombre);
        $sentencia->bindParam("descripcion", $descripcion);
        $sentencia->bindParam("stock", $stock);
        $sentencia->bindParam("precio", $precio);
        $sentencia->bindParam("fyh_creacion", $fechaHora);
        
        // Ejecutamos la sentencia
        $sentencia->execute();

        // iniciamos una sesion con un mensaje de exito
        session_start();
        $_SESSION["mensaje"] = "El producto ".$nombre." fue añadido con exito";
        $_SESSION['icono'] = "success";
        header("Location:".$URL."/vistas/Jefe_de_ventas/inventario");
    };
?>

