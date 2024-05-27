<!-- Este archivo hace la verificacion de sesion -->


<?php
  session_start();
  if (isset($_SESSION["session_nombre"])){
    //echo "Bienvenido ".$_SESSION["session_nombre"];
    $nombre_sesion = $_SESSION["session_nombre"];
    $sql = "SELECT * FROM tb_usuarios WHERE `nombres` = '$nombre_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach( $usuarios as $usuario ){
        $id_usuario = $usuario['id_usuario'];
        $email_tabla = $usuario['email'];
        $Fecha_creacion = $usuario['FyH_creacion'];
        $Fecha_modificacion = $usuario['FyH_actualizacion'];
    }

  }else{
    echo "no existe sesion";
    header("Location: ".$URL."/login");
  }

?>