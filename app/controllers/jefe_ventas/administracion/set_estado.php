<!-- Este archivo sirve para registrar en la base de datos la apertura y cierre del sistema -->

<?php 

    include("../../../config.php");

    $estado_get = $_POST['btn_sistema'];
    $nombre_usuario = $_POST['nombre_usuario'];
    

        if ( $estado_get == 1 ){

            $vendedor_designado = $_POST['vendedor_designado'];
            // Creamos la sentencia
            $sentencia = $pdo->prepare("INSERT INTO tb_admin (nombre_usuario, FyH_accion, vendedor_designado, id_estado) VALUES (:nombre_usuario, :FyH_accion, :vendedor_designado, :id_estado)");
    
            // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
            $sentencia->bindParam("nombre_usuario", $nombre_usuario);
            $sentencia->bindParam("FyH_accion", $fechaHora);
            $sentencia->bindParam("vendedor_designado", $vendedor_designado);
            $sentencia->bindParam("id_estado", $estado_get);

            // Ejecutamos la sentencia
            $sentencia->execute();

            // creamos un mensaje de exito
            session_start();

            $_SESSION["mensaje"] = "El sistema se ha abierto con exito";
            $_SESSION['icono'] = "success";

            header("Location:".$URL."/vistas/Jefe_de_ventas/administracion");
        }elseif ($estado_get == 2){

            $get_vendedor = $pdo->prepare("SELECT vendedor_designado FROM tb_admin ORDER BY id_log DESC LIMIT 1");
            $get_vendedor -> execute();
            $dato_vendedor = $get_vendedor->fetch(PDO::FETCH_ASSOC);

            if($dato_vendedor){
                $nombre_vendedor = $dato_vendedor['vendedor_designado'];
            }
    
            // Creamos la sentencia
            $sentencia = $pdo->prepare("INSERT INTO tb_admin (nombre_usuario, FyH_accion, vendedor_designado, id_estado) VALUES (:nombre_usuario, :FyH_accion, :vendedor_designado, :id_estado)");
    
            // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
            $sentencia->bindParam("nombre_usuario", $nombre_usuario);
            $sentencia->bindParam("FyH_accion", $fechaHora);
            $sentencia->bindParam("vendedor_designado", $nombre_vendedor);
            $sentencia->bindParam("id_estado", $estado_get);


            // Ejecutamos la sentencia
            $sentencia->execute();

            session_start();

            $_SESSION["mensaje"] = "El sistema se ha cerrado con exito";
            $_SESSION['icono'] = "success";

            header("Location:".$URL."/app/controllers/jefe_ventas/administracion/generar_informe.php");
        }else{
            session_start();

            $_SESSION["mensaje"] = "Ha ocurrido un error: estado invalido";
            $_SESSION['icono'] = "error";

            header("Location:".$URL."/vistas/Jefe_de_ventas/administracion");
        }


?>