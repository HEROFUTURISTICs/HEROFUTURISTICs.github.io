<?php
include("conexion.php");

session_start();

$nickname =$_POST["nickname"];
$password =$_POST["contraseña"];

$consulta ="SELECT * FROM persona WHERE Nickname ='$nickname'";
$consulta =mysqli_query($conexion, $consulta);
$consulta =mysqli_fetch_array($consulta);

if ($consulta){
if(password_verify($password, $consulta['Password']))
{
    $_SESSION['login']                    =true;
    $_SESSION['nickname']                 =$consulta['Nickname'];
    $_SESSION['nombre']                 =$consulta['Nombre'];
    $_SESSION['apellidos']                 =$consulta['Apellidos'];
    $_SESSION['edad']                 =$consulta['Edad'];
    $_SESSION['descripcion']                 =$consulta['Descripcion'];
    $_SESSION['fotoPerfil']                 =$consulta['FotoPerfil'];

    header('Location: ../miperfil.php');
}
else{
    echo "contraseña incorrecta";
    echo "<br> <a href=' ../index.html'> Intentalo de nuevo. </a>";
}
}
else{
    echo "El usuario no existe!!";
    echo "<br> <a href='' ../index.html'> Intentalo de nuevo";
}

?>