<!-- En este archivo hacemos el manejo de la eleccion hecha en el archivo choice en donde el jefe venta eligio una vista -->

<?php

    include('../../config.php');

    $valor = $_POST['valor'];

    // Si el valor es 1, quiere decir que el jefe de ventas desea acceder como jefe de ventas
    if ($valor == 1) {

        session_start();
        // asignamos el nombre que se encontraba en la sesion choice y se lo asignamos a la nueva sesion
        $_SESSION['jefe_venta'] = $_SESSION['choice'];
        $nombre = $_SESSION['choice'];
        unset($_SESSION['choice']);
        $_SESSION["mensaje"] = "Bienvenido al sistema ".$nombre;
        $_SESSION["icono"] = "success";
        // redirigimos a la vista de jefe de ventas
        header('Location: '.$URL.'/vistas/Jefe_de_ventas');

    }elseif( $valor == 2){
        session_start();

        // asignamos el nombre que se encontraba en la sesion choice y se lo asignamos a la nueva sesion
        $_SESSION['vendedor'] = $_SESSION['choice'];
        $nombre = $_SESSION['choice'];
        unset($_SESSION['choice']);

        $get_vendedor = $pdo->prepare("SELECT vendedor_designado FROM tb_admin ORDER BY id_log DESC LIMIT 1");
            $get_vendedor -> execute();
            $dato_vendedor = $get_vendedor->fetch(PDO::FETCH_ASSOC);

            if($dato_vendedor){
                $nombre_vendedor = $dato_vendedor['vendedor_designado'];
            }

            // Comprobamos que el usuario este designado como vendedor

            if($nombre_vendedor === $nombre){
                session_start();
                    $_SESSION['vendedor'] = $nombre;
                    $_SESSION["mensaje"] = "Bienvenido al sistema ".$nombre;
                    $_SESSION["icono"] = "success";
                    header('Location: '.$URL."/vistas/vendedor");
            }else{
                session_start();
                $_SESSION["mensaje"] = "No estas designado como vendedor para hoy ".$nombre;
                $_SESSION["icono"] = "error";
                header('Location: '.$URL."");
            }
    }else{
        echo "Datos incorrectos, vuelva a intentarlo";
        session_start();
        $_SESSION["mensaje"] = "Error, datos incorrectos o no existen";
        header("Location: ".$URL."");
    }
?>