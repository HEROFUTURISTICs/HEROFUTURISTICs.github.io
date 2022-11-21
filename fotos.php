<?php

include("php/conexion.php");
include("php/ValidarUsuario.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HERO'S F</title>
    <link href="css/estilo.css" rel='stylesheet' type='text/css' />
<body>
    <header>
        <div id ="logo">  <!-- id para trabajar en casa-->
            <img src="img/logo.png" alt="logo" height="119" width="130">
        </div>
        <nav class="menu">
            <ul> <!-- lista desordenada --> 
                <li><a href="index.html">Inicio</a></li>
                <li><a href="miperfil.php">Mi perfil</a></li>
                <li><a href="amigos.php">Mis amigos</a></li>
                <li><a href="fotos.php">Mis fotos</a></li>
                <li><a href="agregar.php">Buscar amigos</a></li>
                <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>

    <section id="recuadros">
        <h2>Mis fotos</h2>
        <h3><form action="php/SubirFoto.php" method="POST" enctype="multipart/form-data">
            Añadir Imagen: <input name="archivo" id="archivo" type="file" accept=".jpg, .png, .jpeg" required/>
            <input type="submit" name="subir" value="Subir" />
            </form> </h3>

        <?php 
        $consulta="Select * From fotos F Where F.Nickname='$nickname'";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>

        <section class="recuadro">
            <img src="<?php echo $fila['NombreFotos']?>" height="250" width="200">
        </section>

        <?php
        }
        ?>
    </section>

<footer>
        <p> &copy; HERO's FUTURISTIC's</p>
    </footer>
</body>

</html>