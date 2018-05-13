<?php

session_start();

//echo "Hola " . $_SESSION['usuario']. " tu contraseña es ".$_SESSION['contrasenna'];
$datos=$_SESSION['usuario']." ".$_SESSION['contrasenna'];
$output="asdads";
exec("java -jar Inmovilizado.jar $datos",$output);

print_r ($output[0]);

print_r($output[1]);
?>