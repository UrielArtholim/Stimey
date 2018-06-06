<?php 
	include 'php_basico.php';

	$conexion= mysqli_connect($server,$user,$password) or exit('Error en la conexion'.mysqli_error($conexion));

	mysqli_select_db($conexion, $bd) or exit ('Error al seleccionar la base de datos'.mysqli_error($conexion));
?>