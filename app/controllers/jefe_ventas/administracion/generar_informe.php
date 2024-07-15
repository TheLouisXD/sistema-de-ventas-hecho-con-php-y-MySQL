<?php 
    require_once('../../../tcpdf/tcpdf.php');

    require_once('../../../config.php');

    $dateTime = new DateTime($fechaHora);
    $fecha = $dateTime->format('Y-m-d');

    function generar_informe($fecha){
        // Le decimos a la funcion que use la variable pdo que obtenemos del config :P
        global $pdo;
        // Inicializamos el modulo
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('Helvetica', '', 12);

        $html = '<h1> Informe de ventas - '.$fecha.'</h1>';

        // Recuperamos las ventas del dia
        $sentencia = $pdo -> prepare("SELECT * FROM tb_venta WHERE DATE(fyh_venta) = :fecha");

        $sentencia->bindParam(":fecha", $fecha);

        $sentencia->execute();

        $ventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        if($ventas){
            $html .= "<table border = '1' cellpadding = '5'>";

            $html .= '<thead>
                        <tr>
                            <th>ID venta</th>
                            <th>Nombre vendedor</th>
                            <th>Metodo de pago</th>
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
        return $pdf;
    }

    // Recuperamos la informacion
    $pdf = generar_informe($fecha);

    $pdf->Output('informe.pdf','I');

?>