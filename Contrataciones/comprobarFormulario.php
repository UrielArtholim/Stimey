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
    <title>Comprobar formulario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php 
		include 'insertarFormulario.php'; 
	?>
    <section>
        <div id="redireccion_formulario">
            <?php
                echo $mensaje."<br>";
                echo $redireccion."<br>";
                echo $url."<br>";
                ?>
            </div>
    </section>
</body>
</html>