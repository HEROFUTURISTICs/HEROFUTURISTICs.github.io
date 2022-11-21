<?php
session_start(); //iniciar una nueva sesion o renuda la exixtente
$login=$_SESSION['login']; //$SESSION es una variable seper global 


if(!$login)
{
    header('Location:../index.html');
}
else
{
    $nickname = $_SESSION['nickname'];
}
?>