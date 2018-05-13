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

		//Cuando el usuario se ha identificado
		// Generamos la fecha de último acceso
		date_default_timezone_set("Europe/Madrid");
		$fecha = new DateTime();
		$entrada = $fecha->format('Y-m-d H:i:s');
		$consulta = "SELECT id from usuarios where username = '".$usuario."'
			and password = '".$pass."'";
		$result = mysqli_query($connection, $consulta);
		$user_array = mysqli_fetch_array($result);
		$id_user = $user_array[0];
		echo "El id del usuario es: '".$id_user."'";

		$consulta = "UPDATE usuarios set lastEntry = '".$entrada."'
			where id = '".$id_user."'";
		$result = mysqli_query($connection, $consulta);
		session_start();

		$_SESSION['usuario'] = $usuario;
		$_SESSION['id'] = $id_user;
		header("Location: generarHTML.php");
	}else{
		header("Location: Index.html");
		exit();
	}
}else{
	header("Location: Index.html");
	exit();
}

?>
