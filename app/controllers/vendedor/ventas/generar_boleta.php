<?php 
    session_start();
    include("../../../config.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!empty($_SESSION['carrito'])) {

        $carrito = $_SESSION['carrito'];
        $metodo_pago = $_POST['metodo_pago'];
        $tipo_documento = 1;
        $neto = 0;
        $fyh_venta = $fechaHora;
        $nombre_vendedor = $_SESSION['vendedor'];

        // foreach ($carrito as $producto){
        //     $neto = $neto + $producto['precio'] * $producto['cantidad'];
        //     $IVA = $neto * 0.19;
        //     $total = $neto + $IVA;
        //     $nombre = $_SESSION['vendedor'];
        //     $fyh_venta = $fechaHora;
        // };

        foreach ($carrito as $boleta){
            $neto += $boleta['precio'] * $boleta['cantidad'];
        }
        $IVA = $neto * 0.19;
        $total = $neto + $IVA;

        try {
            $sentencia = $pdo->prepare("INSERT INTO tb_venta (nombre_vendedor, tipo_documento, metodo_pago, valor_neto, iva, total_venta, fyh_venta)
            VALUES (:nombre_vendedor, :tipo_documento, :metodo_pago, :valor_neto, :iva, :total_venta, :fyh_venta)");
    
            $sentencia->bindParam("nombre_vendedor", $nombre_vendedor);
            $sentencia->bindParam("tipo_documento", $tipo_documento);
            $sentencia->bindParam("metodo_pago", $metodo_pago);
            $sentencia->bindParam("valor_neto", $neto);
            $sentencia->bindParam("iva", $IVA);
            $sentencia->bindParam("total_venta", $total);
            $sentencia->bindParam("fyh_venta", $fyh_venta);
    
            $sentencia->execute();
            

            // iniciamos una sesion con un mensaje de exito
            $_SESSION["mensaje"] = "La venta fue creada con éxito";
            $_SESSION['icono'] = "success";
            header("Location:".$URL."/vistas/Vendedor/ventas");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        };
    }else{
        $_SESSION["mensaje"] = "El carrito esta vacio";
        $_SESSION['icono'] = "error";
    }
?>