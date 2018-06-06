<!DOCTYPE html>
<?php 
	error_reporting(E_ERROR);
	session_start();
	$usuario=$_SESSION['usuario'];
	$pass=$_SESSION['passwd'];
    $acceso=$_SESSION['idUsuario'];
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alerta tratada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        include "conexion/conexion_db.php";
        $idAlerta=$_GET['id'];
        $comentario=$_POST['comentarioTextarea'];
        $validacion = $_POST['buton'];

        $modificarConsulta = "UPDATE alertas  SET alertaTratada='".$validacion."', comentario='".$comentario."' WHERE idAlerta=$idAlerta";
        if(mysqli_query($conexion,$modificarConsulta))
        {
            echo '<p>Comentario añadido.</p>';
            echo "<a href='Contrataciones.php'>Inicio</a>";
            header("Refresh: 5; url=Contrataciones.php");
        }
        else
        {
            echo '<p>No se ha podido añadir el comentario.</p>';
            echo "<a href='Contrataciones.php'>Inicio</a>";
            header("Refresh: 5; url=Contrataciones.php");
        }


    ?>
</body>
</html>