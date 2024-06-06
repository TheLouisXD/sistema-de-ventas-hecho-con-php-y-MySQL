<?php
    include("../../config.php");

     // obtenemos los datos del formulario

    $id_usuario = $_POST['id_usuario'];

    // Recuperamos el id del usuario que se desea eliminar

        // Creamos la sentencia SQL
        $sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario");
        
        // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
        $sentencia->bindParam("id_usuario", $id_usuario);

        // Ejecutamos la sentencia
        $sentencia->execute();

        // iniciamos sesion con un mensaje de exito
        session_start();
        $_SESSION["mensaje"] = "El usuario ".$nombres." fue eliminado con exito";
        $_SESSION['icono'] = "success";
        header("Location:".$URL."/vistas/Jefe_de_ventas/usuarios");
?>