<?php

include("conexion.php"); //llama el archivo conexion

//datos enviados por el formulario

$nickname      = $_POST ["nickname"]; 
$nombre        = $_POST ["nombre"];
$apellidos     = $_POST ["apellidos"];
$edad          = $_POST ["edad"];
$descripcion   = $_POST ["descripcion"];
$email         = $_POST ["correo"];
$password      = $_POST ["contraseña"];

//Encriptar el valor del password
//BCRYPT es el algoritmo de encriptamiento
$passwordHash=password_hash($password, PASSWORD_BCRYPT);

$fotoPerfil= "img/$nickname/perfil.png";
//ingresamos el nombre de la foto de perfil por defecto

//Evaluamos si el nickname ya existe
$consultaId= "SELECT Nickname FROM persona WHERE Nickname= '$nickname'";
$consultaId= mysqli_query ($conexion,$consultaId); 
//Devuelve un objeto con resultado falsesi existe el usuario y true si existe

$consultaId=mysqli_fetch_array($consultaId);
//Devuelve un array o NULL

if(!$consultaId) { //si esta vacia entonces agregamos un nuevo usuario}

    $sql="INSERT INTO persona VALUES ('$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";
    //Ejecutamos y verificamos si se guardan los datos

    if(mysqli_query ($conexion,$sql)) {
        mkdir("../img/$nickname"); //crea una carpeta en imagenes para el usuario nuevo

        copy("../img/default.png","../img/$nickname/perfil.png");
        //copia nuestra foto por defaul
        echo"tu cuenta ha sido creada";
        echo"<br> <a href='../index.html> Iniciar Sesion </a>";
    }
    else {
         "Error:".$sql ."<br>" .mysqly_error($conexion);
    }
}
else{
    echo "El nombre de usuario ya existe";
    echo "<br> <a href='../index.html'>Intentelo de nuevo</a>";
}

//cerrando la conexion
mysqli_close($conexion);

?>