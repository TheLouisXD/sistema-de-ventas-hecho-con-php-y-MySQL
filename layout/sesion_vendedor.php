<!-- Este archivo hace la verificacion de sesion -->
<?php
  session_start();
  if (isset($_SESSION["vendedor"])){
    //echo "Bienvenido ".$_SESSION["session_nombre"];
    $nombre_sesion = $_SESSION["vendedor"];
    // Esta sentencia sql se encarga de recuperar toda la informacion del usuarios
    $sql = "SELECT tb_usuarios.id_usuario, tb_usuarios.nombres, tb_usuarios.email, tb_usuarios.password_user,tb_usuarios.FyH_creacion, tb_usuarios.FyH_actualizacion, tb_rol.descripcion FROM tb_usuarios INNER JOIN tb_rol ON tb_usuarios.id_rol = tb_rol.id WHERE tb_usuarios.nombres = '$nombre_sesion';";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach( $usuarios as $usuario ){
        $id_usuario = $usuario['id_usuario'];
        $email_tabla = $usuario['email'];
        $Fecha_creacion = $usuario['FyH_creacion'];
        $Fecha_modificacion = $usuario['FyH_actualizacion'];
        $descripcion = $usuario['descripcion'];
    }

  }else{
    echo "no existe sesion";
    header("Location: ".$URL."");
  }
?>