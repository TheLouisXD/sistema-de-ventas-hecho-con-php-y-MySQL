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
        $rol_usuario = $usuario['id_rol'];
    }

    # Si el contador es 0, quiere decir que el usuario no existe, creamos una sesion con un mensaje.
    # Usamos password_verify con el dato obtenido del formulario y la contraseña de la tabla para verificar que sean la misma.
    if( ($contador > 0) && (password_verify($password_user, $password_user_tabla))) {

        // Creamos un mensaje de inicio de sesion exitoso
        session_start();
        $_SESSION["mensaje"] = "Bienvenido al sistema ".$nombre;
        $_SESSION["icono"] = "success";
        
        // Si el rol del usuario es 1, quiere decir que es jefe de ventas, por lo cual lo llevaremos a la pagina de eleccion de rol.
        if( $rol_usuario == 1){
            session_start();
            $_SESSION["choice"] = $nombre;
            header('Location: '.$URL.'/vistas/choice');

        // De lo contrario, si su id es 2, quiere decir que es vendedor
        }elseif( $rol_usuario == 2){
            session_start();
            $_SESSION['vendedor'] = $nombre;
            header('Location: '.$URL.'/vistas/Vendedor');
        }

    }else{
        session_start();
        $_SESSION["mensaje"] = "Error, datos incorrectos o no existen";
        $_SESSION["icono"] = "error";
        header("Location: ".$URL."");
    }
?>