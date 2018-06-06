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
    <title>Contrataciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="Estilos/estilo.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Contrataciones</h1>
    <div id='menu'></div>
        <a href="consultarContrato.php">Consultar contrato</a><br>
        <a href="insertarContrato.php">Insertar contrato</a><br>
        <a href="auditarContrato.php">Auditar contrato</a><br>
        <a href="comprobarResultados.php">Comprobar resultados</a>
    </div>
</body>
</html>