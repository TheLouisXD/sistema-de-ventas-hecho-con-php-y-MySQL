<!-- Este archivo sirve para obtener los informes de la tabla informes -->

<?php
    $sql_informes= $pdo->prepare("SELECT * FROM tb_informes ORDER BY id_informe DESC");
    $sql_informes->execute();
    $datos_informes= $sql_informes->fetchAll(PDO::FETCH_ASSOC);
?>