<?php
    include("../../config.php");

     // obtenemos los datos del formulario

    $id_usuario = $_POST['id_usuario_get'];
    $nombres = $_POST['Nombres'];
    $email = $_POST['email'];
    $password_user = $_POST['password_user'];
    $password_repeat = $_POST['password_repeat'];
    $rol = $_POST['rol'];

    // Recuperamos el id del usuario que se desea modificar

    // verificamos que ambas contraseñas sean iguales
    if ($password_user == $password_repeat) {

        // Usamos password hash para encriptar la contraseña
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);

        // Creamos la sentencia SQL
        $sentencia = $pdo->prepare("UPDATE tb_usuarios 
        SET nombres=:nombres, 
            email=:email,
            password_user=:password_user, 
            FyH_actualizacion=:fyh_actualizacion,
            id_rol=:id_rol 
        WHERE id_usuario = :id_usuario");
        
        // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
        $sentencia->bindParam("nombres", $nombres);
        $sentencia->bindParam("email", $email);
        $sentencia->bindParam("password_user", $password_user);
        $sentencia->bindParam("fyh_actualizacion", $fechaHora);
        $sentencia->bindParam("id_usuario", $id_usuario);
        $sentencia->bindParam("id_rol", $rol);

        // Ejecutamos la sentencia
        $sentencia->execute();

        // iniciamos sesion con un mensaje de exito
        session_start();
        $_SESSION["mensaje"] = "El usuario ".$nombres." fue actualizado con exito";
        $_SESSION['icono'] = "success";
        header("Location:".$URL."/vistas/Jefe_de_ventas/usuarios");

    } else {
        // Creamos una sesion con un mensaje de error.
        session_start();
        $_SESSION["mensaje"] = "Error, las contraseñas no son identicas";
        $_SESSION['icono'] = 'error';
        // nos aseguramos de pner el id del usuario en caso de que no se actualize o haya un error
        header("Location:".$URL."/vistas/Jefe_de_ventas/usuarios/update.php?id=".$id_usuario);
    }
?>