<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Opciones</title>
</head>

<body>
    <div>
        <center>
            <img src="./LogoStimey.jpg" alt="Logo Stimey" />
        </center>
        <center>
            <?php 
			    session_start();
                echo "Bienvenido: ".$_SESSION['usuario'];
                echo "<br>";
            ?>
        </center>
        <center>
            <form method="POST" action="seleccionSupervisor.php">
                <select name="origen" id="origen">
                    <option value="revisarSeccion">Revisar sección</option>
                    <option value="revisarIncidencias">Revisar Incidencias</option>
                </select>
                <br /><br />
                <button type="submit">Seleccionar</button>
            </form>
            <br>
			<center>
				<form method=\"POST\" action=\"opcionesSupervisor.php\">
    				<button type=\"submit\">Volver</button>
				</form>
  			</center>
        </center>
    </div>
</body>

</html>