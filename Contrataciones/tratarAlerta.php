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
    <title>Tratar alerta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        include "conexion/conexion_db.php";
        $idAlerta = $_POST['idAlerta'];
        $idTrabajador = $_POST['idPersona'];

        $consultaAlerta = "SELECT alerta, fechaAuditoria FROM alertas WHERE idAlerta=$idAlerta";
        $ejecutarConsulta = mysqli_query($conexion, $consultaAlerta);

        if(mysqli_num_rows($ejecutarConsulta))
        {
            while($fila = mysqli_fetch_array($ejecutarConsulta))
            {
                $alerta = $fila[0];
            }

            echo $alerta;
            ?>
            <form action="alertaTratada.php?id=<?php echo $idAlerta; ?>" method="POST">
                <fieldset>
                    <legend>Tratar alerta</legend>
                    <textarea name="comentarioTextarea" id="comentarioTextarea" cols="100" rows="5"></textarea>
                    <br><br>
                    <!--Checkbox para confirmar tratamiento.-->
                    <p>¿Desea validar la alerta?</p>
                    Si<input type="radio" name="buton" value="1"><br>
                    No<input type="radio" name="buton" value="0"><br><br>
                    <input type="submit" value="Enviar comentario">
                </fieldset>
            
            </form>


        <?php
        }
        else
        {
            echo "<p>No se han obtenido resultados.</p>";
        } 
    ?>
</body>
</html>