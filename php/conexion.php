<?php
$servidor="localhost";
$usuario="root";
$contrasena="";
$BD="redsocial";

$conexion=mysqli_connect($servidor, $usuario, $contrasena, $BD);

if(!$conexion) {
    echo "fallo la conexion <br>";
    die("connection failed".mysqli_connect_error());
}
else{
    //echo "Conexion exitosa";
}
?>