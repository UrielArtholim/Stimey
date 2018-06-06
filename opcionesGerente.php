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
					<select name="origen" id="origen">
						<option value="create">Crear Usuario</option>
						<option value="revisarSeccion">Revisar sección</option>
						<option value="revisarIncidencias">Revisar Incidencias</option>
				</select>
				<br /><br />
				<button type="submit">Seleccionar</button>
				</form>
			</center>
		</div>
	</body>
</html>
