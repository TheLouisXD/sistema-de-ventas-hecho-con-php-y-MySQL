<?php 
    if(isset($_SESSION['carrito'])){
        $carrito = $_SESSION['carrito'];
    }else{
        header("Location: index.php");
        exit();
    }


?>