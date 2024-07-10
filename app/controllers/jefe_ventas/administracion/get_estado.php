<?php 

    // creamos una consulta sql que recupere todos los campos de la tabla usuarios.
    $sql_admin = "SELECT * FROM tb_admin";
    $query_admin = $pdo->prepare($sql_admin);
    $query_admin->execute();
    $datos_admin = $query_admin->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datos_admin as $admin_dato){
        $id_log = $admin_dato['id_log'];
        $nombre_usuario = $admin_dato['nombre_usuario'];
        $fyh_accion = $admin_dato['FyH_accion'];
        $id_estado = $admin_dato['id_estado'];
    }

    if ($id_estado == 1){
        $estado = "Abierto";
    }elseif($id_estado == 2){
        $estado = "Cerrado";
    }else{
        $estado = "Cerrado";
    };
?>