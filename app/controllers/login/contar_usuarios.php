<?php

    $contador = 0;
    $sql = "SELECT * FROM tb_usuarios";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach( $usuarios as $usuario ){
        $contador = $contador + 1;
    }

    if ($contador < 1){
        $btn_inicializar = "<br>
                <div class='col-md-12'>
                <center><p>No hay usuarios en el sistema.<br> Crea el primer usuario:</p></center>
                <center><a href='app/controllers/login/inicializar.php' class='btn btn-primary'>Crear Primer Usuario</a></center>
            </div>";
    }else{
        $btn_inicializar = null;
    }

?>