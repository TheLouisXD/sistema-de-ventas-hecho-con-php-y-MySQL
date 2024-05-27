<!-- Este archivo contiene el codigo que permite hacer la comparacion de datos ingresados en el formulario de LOGIN y revisar si ell usuario existe en la base de datos -->

<?php
    # importamos los datos de config.php para poder tener la conexion con la base de datos
    include("../../config.php");

    # Recuperamos la informacion de los campos NOMBRE y CONTRASEÑA del formulario
    $nombre = $_POST['nombre'];
    $password_user = $_POST['password_user'];

    # Consulta a la base de datos, si el usuario existe, el contador aumenta a 1 y recuperamos el nombre, correo y contraseña.
    $contador = 0;
    $sql = "SELECT * FROM tb_usuarios WHERE `nombres` = '$nombre'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach( $usuarios as $usuario ){
        $contador = $contador + 1;
        $email_tabla = $usuario['email'];
        $nombres = $usuario['nombres'];
        $password_user_tabla = $usuario['password_user'];
    }

    # Si el contador es 0, quiere decir que el usuario no existe, creamos una sesion con un mensaje.
    # Usamos password_verify con el dato obtenido del formulario y la contraseña de la tabla para verificar que sean la misma.
    if( ($contador > 0) && (password_verify($password_user, $password_user_tabla))) {
        echo "Datos correctos";
        session_start();
        $_SESSION["session_nombre"] = $nombre;
        header('Location: '.$URL.'/Jefe_de_ventas');
    }else{
        echo "Datos incorrectos, vuelva a intentarlo";
        session_start();
        $_SESSION["mensaje"] = "Error, datos incorrectos o no existen";
        header("Location: ".$URL."");
    }
?>