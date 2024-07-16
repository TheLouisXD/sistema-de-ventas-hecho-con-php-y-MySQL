<!-- En este archivo creamos la conexion con la base de datos -->

<?php
// Definimos variables para la conexion con la base de datos UwU
define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASSWORD","");
define("BD","sistemadeventas");

$servidor = 'mysql:dbname='.BD.';host='.SERVIDOR;

//Probamos la conexion a la base de datos
try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    // echo "La conexion a la base de datos fue un exito";
}catch(PDOException $e){
    // print_r($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost/sistema-de-ventas";

// Definimos la hora local del sistema, en este caso, la hora de chile
date_default_timezone_set("America/Santiago");
$fechaHora = date('Y-m-d h:i:s');

?>