<?php

    if(isset($_POST['agregar_carrito'])) {

        if(isset($_SESSION['carrito'])) {

            $session_array_id = array_column($_SESSION['carrito'], "id_producto");

            if (!in_array($_GET['id'], $session_array_id )){
                $session_array = array(
                    "id_producto" => $_POST['id_producto'],
                    "nombre" => $_POST['nombre'],
                    "codigo" => $_POST['codigo'],
                    "precio" => $_POST['precio'],
                    "cantidad" => $_POST['cantidad']
                );
    
                $_SESSION['carrito'][] = $session_array;
            }

        }else{

            $session_array = array(
                "id_producto" => $_POST['id_producto'],
                "nombre" => $_POST['nombre'],
                "codigo" => $_POST['codigo'],
                "precio" => $_POST['precio'],
                "cantidad" => $_POST['cantidad']
            );

            $_SESSION['carrito'][] = $session_array;
        }
    }
?>