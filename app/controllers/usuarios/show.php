<!-- Este controlador sirve para recuperar la informacion de un usuario especifico -->

<?php 
    // Este codigo recupera el id desde el id que esta en la url de la pagina
    $id_usuario_get = $_GET['id'];

    // Ejecutamos la sentencia sql en donde recuperara la informacion del usuario con el id recuperado
    $sql_usuarios = "SELECT * FROM tb_usuarios WHERE id_usuario = '$id_usuario_get'";
    $query_usuarios = $pdo->prepare($sql_usuarios);
    $query_usuarios->execute();
    $datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datos_usuarios as $usuario_dato) {
        $nombres = $usuario_dato['nombres'];
        $email = $usuario_dato['email'];
    }
?>