<?php 
	$muni=$_REQUEST['prov'];

	$conexion=mysqli_connect('localhost:8080','adrian','1234') or die ('Error al conectar');
	mysqli_query($conexion, 'SET NAMES utf8');

	mysqli_select_db($conexion, 'provincias');

	$sentencia="SELECT idprovincia, poblacion FROM poblacion WHERE idprovincia='$muni' ORDER BY poblacion";
	$ejecucion=mysqli_query($conexion, $sentencia);

	echo "[";
	while($fila=mysqli_fetch_array($ejecucion))
	{
		echo "\"".$fila[1]."\",";
	}
	echo "]";

	mysqli_close($conexion);
?>