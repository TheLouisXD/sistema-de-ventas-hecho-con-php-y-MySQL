<!-- En este archivo hacemos el manejo de la eleccion hecha en el archivo choice en donde el jefe venta eligio una vista -->

<?php

    include('../../config.php');

    $valor = $_POST['valor'];

    // Si el valor es 1, quiere decir que el jefe de ventas desea acceder como jefe de ventas
    if ($valor == 1) {

        session_start();
        // asignamos el nombre que se encontraba en la sesion choice y se lo asignamos a la nueva sesion
        $_SESSION['jefe_venta'] = $_SESSION['choice'];
        unset($_SESSION['choice']);
        // redirigimos a la vista de jefe de ventas
        header('Location: '.$URL.'/vistas/Jefe_de_ventas');

    }elseif( $valor == 2){
        session_start();
        // asignamos el nombre que se encontraba en la sesion choice y se lo asignamos a la nueva sesion
        $_SESSION['vendedor'] = $_SESSION['choice'];
        unset($_SESSION['choice']);
        // redirigimos a la vista de vendedor
        header('Location: '.$URL.'/vistas/Vendedor');
    }else{
        echo "Datos incorrectos, vuelva a intentarlo";
        session_start();
        $_SESSION["mensaje"] = "Error, datos incorrectos o no existen";
        header("Location: ".$URL."");
    }
?>