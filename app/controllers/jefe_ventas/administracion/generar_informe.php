<?php 

    ob_start(); 

    session_start();
    require_once('../../../tcpdf/tcpdf.php');

    require_once('../../../config.php');

    $dateTime = new DateTime($fechaHora);
    $fecha = $dateTime->format('Y-m-d');

    $ruta_informes = __DIR__ . "/../../../../Documentos/Informes/";

    // en caso de que no exista la carpeta, la creamos
    if(!file_exists($ruta_informes)){
        mkdir($ruta_informes, 0777, true);
    }

    function generar_informe($fecha, $tipo_documento = null, $nombre_archivo){
        // Le decimos a la funcion que use la variable pdo que obtenemos del config :P
        global $pdo;
        global $ruta_informes;

        // Inicializamos el modulo
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('Helvetica', '', 5);

        $titulo = '<h1> Informe de ventas - ' . ($tipo_documento == 1 ? "Boletas" : ($tipo_documento == 2 ? "Facturas" : "completo")) . " - " . $fecha;

        $html = '<h1>'.$titulo.'</h1>';

        // Recuperamos las ventas del dia
        $consulta = "SELECT * FROM tb_venta WHERE DATE(fyh_venta) = :fecha";

        if ($tipo_documento !== null){
            $consulta .= " AND tipo_documento = :tipo_documento";
        }

        $sentencia = $pdo->prepare($consulta);

        $sentencia->bindParam("fecha", $fecha);

        if($tipo_documento !== null){
            $sentencia->bindParam("tipo_documento", $tipo_documento);
        }

        $sentencia->execute();

        $ventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        if($ventas){
            $html .= "<table border = '1'>";

            $html .= '<thead>
                        <tr>
                            <th>ID venta</th>
                            <th>Nombre vendedor</th>
                            <th>Metodo de pago</th>
                            <th>Tipo de documento</th>
                            <th>Valor neto</th>
                            <th>IVA</th>
                            <th>Total venta</th>
                            <th>Fecha y Hora</th>
                        </tr>
                    </thead>';

            $html .= "<tbody>";

            foreach($ventas as $venta) {
                $html .= "<tr>
                            <td>".$venta['id_venta']."</td>
                            <td>".$venta['nombre_vendedor']."</td>
                            <td>".$venta['metodo_pago']."</td>
                            <td>";
                            if($venta['tipo_documento'] == 1){
                                $html .= "Boleta";
                            }elseif($venta['tipo_documento'] == 2){
                                $html .= "Factura";
                            }
                            $html .= "</td>
                            <td>".$venta['valor_neto']."</td>
                            <td>".$venta['iva']."</td>
                            <td>".$venta['total_venta']."</td>
                            <td>".$venta['fyh_venta']."</td>
                        </tr>";
            }

            $html .= "</tbody></table>";
        } else {
            $html .="<h1>No hay ventas para este dia en especifico.</h1>";
        }

        $pdf -> writeHTML($html, true, false, true, false, '');
        $pdf->Output($ruta_informes . $nombre_archivo, 'F');
        return $nombre_archivo;
    }

    // Generamos el PDF
    $informe_general = generar_informe($fecha,null,'informe_general - '.$fecha.'.pdf');

    $informe_boletas = generar_informe($fecha, 1, 'informe_boleta - '.$fecha.'.pdf');

    $informe_facturas = generar_informe($fecha, 2, 'informe_facturas - '.$fecha.'.pdf');

    // Guardamos la informacion de los informes en la base de datos

    $sentencia = $pdo->prepare("INSERT INTO tb_informes (vendedor_designado ,fecha, informe_general, informe_boletas, informe_facturas) VALUES (:vendedor_designado,:fecha, :informe_general, :informe_boletas, :informe_facturas)");

    $sentencia ->bindParam('vendedor_desginado', $vendedor_designado);
    $sentencia ->bindParam('fecha', $fecha);
    $sentencia ->bindParam('informe_general', $informe_general);
    $sentencia ->bindParam('informe_boletas', $informe_boletas);
    $sentencia ->bindParam('informe_facturas', $informe_facturas);
    $sentencia ->execute();

    ob_end_clean();

    // iniciamos una sesion con un mensaje de exito
    $_SESSION["mensaje"] = "Informe generado con éxito";
    $_SESSION['icono'] = "success";
    header("Location:".$URL."/vistas/Jefe_de_ventas/informes");

?>