<!-- Este controlador recibe la informacion del formulario de creacion de usuarios y la inserta en la tabla de usuarios -->

<?php
    
    include("../../config.php");

    // obtenemos los datos del formulario

    $nombres = $_POST['Nombres'];
    $email = $_POST['email'];
    $password_user = $_POST['password_user'];
    $password_repeat = $_POST['password_repeat'];

    // verificamos que ambas contraseñas sean iguales
    if ($password_user == $password_repeat) {

        // Usamos password hash para encriptar la contraseña
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);

        // Creamos la sentencia SQL
        $sentencia = $pdo->prepare("INSERT INTO tb_usuarios (nombres, email, password_user, fyh_creacion) VALUES (:nombres, :email, :password_user, :fyh_creacion)");
        
        // Este codigo lo que hacer es reemplazar los VALUES por los datos obtenidos en el formulario
        $sentencia->bindParam("nombres", $nombres);
        $sentencia->bindParam("email", $email);
        $sentencia->bindParam("password_user", $password_user);
        $sentencia->bindParam("fyh_creacion", $fechaHora);

        // Ejecutamos la sentencia
        $sentencia->execute();

        // iniciamos sesion con un mensaje de exito
        session_start();
        $_SESSION["mensaje"] = $nombres;
        header("Location:".$URL."/usuarios");

    } else {
        // Creamos una sesion con un mensaje de error.
        session_start();
        $_SESSION["mensaje"] = "Error, las contraseñas no son identicas";
        header("Location:".$URL."/usuarios/create.php");
    }
?>

<button onclick="history.back()">Volver atras</button>