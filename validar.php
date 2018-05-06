<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

if(empty($usuario) || empty($pass)){

	header("Location: index.html");

	exit();
}

$connection = mysqli_connect ("localhost", "root", "", "Stimey") 
			or die("Error al conectar a la base de datos");
$consulta = "SELECT * from usuarios where Username='" . $usuario . "'";
$result = mysqli_query($connection, $consulta);

if($row = mysqli_fetch_array($result)){

	if($row['password'] == $pass){
		session_start();
		$_SESSION['usuario'] = $usuario;
		header("Location: contenido.php");
	}else{
		header("Location: Index.html");
		exit();
	}
}else{
	header("Location: Index.html");
	exit();
}


?>