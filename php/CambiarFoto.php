
<?php
include("ValidarSesion.php");

$ubicacion="../img/$nickname/perfil.png";
$archivo= $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)) {
    echo "El archivo a sido subido";
    header('Location:../miperfil.php');  //Redireccionar a la pagina de mi perfil
}
else{
    echo"Ha ocurrido un error trate de nuevo";
    echo "<br> <a href='../miperfil.php'> Volver. </a>";
}  
?>