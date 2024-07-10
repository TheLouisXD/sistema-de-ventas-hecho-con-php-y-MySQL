<!-- Este archivo sirve para registrar en la base de datos la apertura y cierre del sistema -->

<?php 

    include("../../../config.php");

    $estado_get = $_POST['btn_sistema'];
    $nombre_usuario = $_POST['nombre_usuario'];

        if ( $estado_get == 1 ){
            // Creamos la sentencia
            $sentencia = $pdo->prepare("INSERT INTO tb_admin (nombre_usuario, FyH_accion, id_estado) VALUES (:nombre_usuario, :FyH_accion, :id_estado)");
    
            // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
            $sentencia->bindParam("nombre_usuario", $nombre_usuario);
            $sentencia->bindParam("FyH_accion", $fechaHora);
            $sentencia->bindParam("id_estado", $estado_get);

            // Ejecutamos la sentencia
            $sentencia->execute();
    
            
            // creamos un mensaje de exito
            session_start();

            $_SESSION["mensaje"] = "El sistema se ha abierto con exito";
            $_SESSION['icono'] = "success";

            header("Location:".$URL."/vistas/Jefe_de_ventas/administracion");
        }elseif ($estado_get == 2){
    
            // Creamos la sentencia
            $sentencia = $pdo->prepare("INSERT INTO tb_admin (nombre_usuario, FyH_accion, id_estado) VALUES (:nombre_usuario, :FyH_accion, :id_estado)");
    
            // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
            $sentencia->bindParam("nombre_usuario", $nombre_usuario);
            $sentencia->bindParam("FyH_accion", $fechaHora);
            $sentencia->bindParam("id_estado", $estado_get);

            // Ejecutamos la sentencia
            $sentencia->execute();

            session_start();

            $_SESSION["mensaje"] = "El sistema se ha cerrado con exito";
            $_SESSION['icono'] = "success";

            header("Location:".$URL."/vistas/Jefe_de_ventas/administracion");
        }else{
            session_start();

            $_SESSION["mensaje"] = "Ha ocurrido un error: estado invalido";
            $_SESSION['icono'] = "error";

            header("Location:".$URL."/vistas/Jefe_de_ventas/administracion");
        }


?>