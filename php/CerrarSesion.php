
<?php
session_start();       //inicia una nueva sesion o renuda la exixtente 
$_SESSION=array();     //Limpia las variables super globales de sesion

session_destroy();     //Destruir todas las variables de sesion
header('Location:  ../index.html');
?>