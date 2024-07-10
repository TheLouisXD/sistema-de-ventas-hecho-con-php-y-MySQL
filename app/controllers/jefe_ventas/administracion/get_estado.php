<!-- Este archivo sirve para obtener los datos de la tabla tb_admin -->

<?php 

    // Creamos una consulta para obtener el estado del ultimo registro en la tabla
    $sql_estado = "SELECT id_estado FROM tb_admin ORDER BY id_log DESC LIMIT 1";
    $query_estado = $pdo->prepare($sql_estado);
    $query_estado->execute();
    $dato_estado = $query_estado->fetch(PDO::FETCH_ASSOC);

    if($dato_estado){
        $id_estado = $dato_estado['id_estado'];
    }

    // Usando el dato id_estado recuperado, comparamos el valor para saber si el sistema esta abierto o cerrado
    if ($id_estado == 1){
        $estado = "Abierto";
    }elseif($id_estado == 2){
        $estado = "Cerrado";
    }else{
        $estado = "Cerrado";
    };

    
    // creamos una consulta sql que recupere todos los campos de la tabla admin
    $sql_admin = "SELECT * FROM tb_admin";
    $query_admin = $pdo->prepare($sql_admin);
    $query_admin->execute();
    $datos_admin = $query_admin->fetchAll(PDO::FETCH_ASSOC);
?>