<?php 
    ob_start(); 

    session_start();
    include("../../../config.php");

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

            // Creamos el recibo con esta aplicacion para hacer pdf
            require_once("../../../../app/tcpdf/tcpdf.php");

            $pdf = new TCPDF();
            $pdf -> addpage();
            $pdf -> SetFont('Helvetica','',12);
            $html = '<h1>Boleta</h1>';
            $html .='<table border = 4>';
            $html .='<thead>
                        <tr>
                            <th>Producto</th>
                            <th>Codigo</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Precio Neto</th>
                            <th>IVA</th>
                            <th>Precio total</th>
                        </tr>
                    </thead>';
            $html .= '<tbody>';

            foreach ($carrito as $producto) {
                
                $neto_producto = $producto['precio'] * $producto['cantidad'];
                $IVA_producto = $neto_producto * 0.19;
                $total_producto = $neto_producto + $IVA_producto;

                $html .= "<tr>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['codigo']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>{$producto['precio']}</td>
                    <td>{$neto_producto}</td>
                    <td>{$IVA_producto}</td>
                    <td>{$total_producto}</td>
                </tr>";
            }

            $html .= "<tr>
                        <td colspan='4'></td>
                        <td colspan='4'></td>
                        <td colspan='4'></td>
                        <td><b>Precio total</b></td>
                        <td>{$neto}</td>
                        <td>{$IVA}</td>
                        <td>{$total}</td>
                    </tr>";
            
            $html .= "</tbody></table>";
            $html .= '<p>Metodo de pago: '. $metodo_pago .'</p>';
            $pdf ->writeHTML($html, true, false, true, false, '');

            ob_end_clean(); // Limpiamos el bufer

            // iniciamos una sesion con un mensaje de exito
            $_SESSION["mensaje"] = "La venta fue creada con éxito";
            $_SESSION['icono'] = "success";
            
            // Limpiamos el carrito
            unset($_SESSION['carrito']);
        
            $pdf -> Output('boleta.pdf', 'I');

            echo "<script>
                setTimeout(funciont(){
                    window.location.href = '".$URL."/vistas/Vendedor/ventas';
                }, 2000;
            </script>";

    }else{
        $_SESSION["mensaje"] = "El carrito esta vacio";
        $_SESSION['icono'] = "error";
    }
?>