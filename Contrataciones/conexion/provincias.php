<?php
$conexion=mysqli_connect('localhost:8080','adrian','1234');
mysqli_select_db($conexion, 'provincias');
mysqli_query($conexion, 'SET NAMES utf8');
$peticion='SELECT idprovincia, provincia FROM provincia ORDER BY provincia';
$ejecucion=mysqli_query($conexion, $peticion);

echo "[";
while($fila=mysqli_fetch_array($ejecucion))
{
	echo "{";
	echo "Id_provincia: ".$fila[0].",";
	echo 'Provincia: "'.$fila[1].'"';
	echo "},";
}
echo "]";
mysqli_close($conexion);
?>