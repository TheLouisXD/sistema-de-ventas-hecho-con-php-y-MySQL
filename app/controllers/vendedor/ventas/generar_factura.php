<?php 
    ob_start(); 

    session_start();
    include("../../../config.php");

    if (!empty($_SESSION['carrito'])) {

        $carrito = $_SESSION['carrito'];
        $razon_cliente = $_POST['razon_cliente'];
        $rut_cliente = $_POST['rut_cliente'];
        $giro_cliente = $_POST['giro_cliente'];
        $direccion_cliente = $_POST['direccion_cliente'];
        $metodo_pago = $_POST['metodo_pago'];
        $tipo_documento = 2;
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

        foreach ($carrito as $factura){
            $neto += $factura['precio'] * $factura['cantidad'];
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

            // Creamos una consulta para obtener el ultimo id venta para asi asignarselo a la factura
            $sql_venta = "SELECT id_venta FROM tb_venta ORDER BY id_venta DESC LIMIT 1";
            $query_venta= $pdo->prepare($sql_venta);
            $query_venta->execute();
            $dato_venta = $query_venta->fetch(PDO::FETCH_ASSOC);

            if($dato_venta){
                $id_venta = $dato_venta['id_venta'];
            }

            // Ahora insertamos los datos en la tabla de facturas

            $sentencia = $pdo->prepare("INSERT INTO tb_facturas (id_venta, razon_cliente, rut_cliente, giro, direccion)
            VALUES (:id_venta, :razon_cliente, :rut_cliente, :giro, :direccion)");
    
            $sentencia->bindParam("id_venta", $id_venta);
            $sentencia->bindParam("razon_cliente", $razon_cliente);
            $sentencia->bindParam("rut_cliente", $rut_cliente);
            $sentencia->bindParam("giro", $giro_cliente);
            $sentencia->bindParam("direccion", $direccion_cliente);
    
            $sentencia->execute();

            // Recuperamos el id de la factura para ponerlo en el pdf

            $sql_factura = "SELECT id_factura FROM tb_facturas ORDER BY id_factura DESC LIMIT 1";
            $query_factura = $pdo->prepare($sql_factura);
            $query_factura ->execute();
            $dato_factura  = $query_factura ->fetch(PDO::FETCH_ASSOC);

            if($dato_factura){
                $id_factura = $dato_factura['id_factura'];
            }

            // Creamos el recibo con esta aplicacion para hacer pdf
            require_once("../../../../app/tcpdf/tcpdf.php");

            $pdf = new TCPDF();
            $pdf -> addpage();
            $pdf -> SetFont('Helvetica','',12);
            $html = '<h1>Factura</h1><hr>';
            $html .= '<h3>Numero de factura: '.$id_factura.'</h3>';
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
            $html .= '<p>Razon social del cliente: '. $razon_cliente .'</p>';
            $html .= '<p>Rut del cliente: '. $rut_cliente .'</p>';
            $html .= '<p>Giro: '. $giro_cliente .'</p>';
            $html .= '<p>Direccion del cliente: '. $direccion_cliente .'</p>';
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