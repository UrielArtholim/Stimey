<?php
  /*
    PHP File to generate dynamically one HTML table
    Used for showing the last 20 modifications
  */


    $user = $_POST['newUser'];
    $pass = $_POST['newPass'];
    $repass = $_POST['newPass2'];
    $group = $_POST['newGroup'];
    $firstEntry = new DateTime();
    $entrada = $firstEntry->format('Y-m-d H:i:s');

    if($pass != $repass)
        echo "<script>alert(\'Las contraseñas no coinciden.\'); window.location = \'crearUsuario.html\';</script>";

    // Establecemos conexión con la base de datos
    if(!isset($_SESSION)){session_start();}

    $connection = mysqli_connect ("localhost", "Gerente", "Gerente", "Stimey")
    			or die("Error al conectar a la base de datos");

    $passHash = password_hash($pass, PASSWORD_BCRYPT);

    $conexion = mysqli_connect ("localhost", "root", "", "Stimey")
    			or die("Error al conectar a la base de datos");

    $consulta = "INSERT INTO usuarios (username, password, group_id, lastEntry)
        VALUES ('".$user."','".$passHash."','".$group."','".$entrada."')";

    mysqli_query($connection, $consulta);

    header('Location: opcionesGerente.html');

?>
