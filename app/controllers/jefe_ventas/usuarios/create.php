<!-- Este controlador recibe la informacion del formulario de creacion de usuarios y la inserta en la tabla de usuarios -->

<?php
    
    include("../../../config.php");

    // obtenemos los datos del formulario

    $nombres = $_POST['Nombres'];
    $email = $_POST['email'];
    $password_user = $_POST['password_user'];
    $password_repeat = $_POST['password_repeat'];
    $rol = $_POST['rol'];

    // verificamos que ambas contraseñas sean iguales
    if ($password_user == $password_repeat) {

        // Creamos una consulta para verificar que el usuario no exista anteriormente
        $sentencia = $pdo->prepare("SELECT COUNT(*) FROM tb_usuarios WHERE nombres = :nombres");

        $sentencia->bindParam(":nombres", $nombres);

        $sentencia->execute();

        $existeUsuario = $sentencia->fetchColumn();

        // Verificamos que no se hayan encontrado otros usuarios con el mismo nombre
        if ($existeUsuario > 0){
            // Creamos una sesión con un mensaje de error si el usuario ya existe
            session_start();
            $_SESSION["mensaje"] = "Error, el usuario ya existe en la base de datos";
            $_SESSION['icono'] = "error";
            header("Location:".$URL."/vistas/Jefe_de_ventas/usuarios/create.php");
        }else{

            // Usamos password hash para encriptar la contraseña
            $password_user = password_hash($password_user, PASSWORD_DEFAULT);

            // Creamos la sentencia SQL
            $sentencia = $pdo->prepare("INSERT INTO tb_usuarios (nombres, email, password_user, fyh_creacion, id_rol) VALUES (:nombres, :email, :password_user, :fyh_creacion, :id_rol)");

            // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
            $sentencia->bindParam("nombres", $nombres);
            $sentencia->bindParam("email", $email);
            $sentencia->bindParam("password_user", $password_user);
            $sentencia->bindParam("fyh_creacion", $fechaHora);
            $sentencia->bindParam("id_rol", $rol);

            // Ejecutamos la sentencia
            $sentencia->execute();

            // iniciamos sesion con un mensaje de exito
            session_start();
            $_SESSION["mensaje"] = "El usuario ".$nombres." fue registrado con exito";
            $_SESSION['icono'] = "success";
            header("Location:".$URL."/vistas/Jefe_de_ventas/usuarios");
        }

    } else {
        // Creamos una sesion con un mensaje de error.
        session_start();
        $_SESSION["mensaje"] = "Error, las contraseñas no son identicas";
        $_SESSION['icono'] = "error";
        header("Location:".$URL."/vistas/Jefe_de_ventas/usuarios/create.php");
    }
?>

