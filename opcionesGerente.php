<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Opciones</title>
	</head>
	<body>
		<div>
			<center>
				<img src="./LogoStimey.jpg" alt="Logo Stimey"/>
			<center>
				<?php 
				    session_start();
					echo "Bienvenido: ".$_SESSION['usuario'];
				?>
				<br>
				<form method="POST" action="seleccionGerente.php">
					<select name="option" id="option">
						<option value="create">Crear Usuario</option>
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
