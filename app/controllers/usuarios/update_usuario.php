<!-- Este controlador sirve para recuperar la informacion de un usuario especifico -->

<?php
    // Este codigo recupera el id desde el id que esta en la url de la pagina
    $id_usuario_get = $_GET['id'];

    // Ejecutamos la sentencia sql en donde recuperara la informacion del usuario con el id recuperado
    $sql_usuario = "SELECT tb_usuarios.id_usuario, tb_usuarios.nombres, tb_usuarios.email, tb_usuarios.password_user,tb_usuarios.FyH_creacion, tb_usuarios.FyH_actualizacion, tb_rol.descripcion FROM tb_usuarios INNER JOIN tb_rol ON tb_usuarios.id_rol = tb_rol.id_rol WHERE id_usuario = '$id_usuario_get';";
    $query_usuario = $pdo->prepare($sql_usuario);
    $query_usuario->execute();
    $datos_usuario = $query_usuario->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datos_usuario as $usuario_dato) {
        $nombres = $usuario_dato['nombres'];
        $email = $usuario_dato['email'];
        $rol_usuario = $usuario_dato['descripcion'];
        $Fecha_creacion = $usuario_dato['FyH_creacion'];
        $Fecha_modificacion = $usuario_dato['FyH_actualizacion'];
    }

?>