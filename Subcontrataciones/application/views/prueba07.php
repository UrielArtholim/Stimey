<html>
<head>
	<title>Prueba 7</title>
</head>

<body>
	<h3>Comprobación de permisos de usuario</h3>
	<form method="post">
		<br/>Introduzca el nombre del usuario para visualizar su nivel de permisos <br/>
		(Déjelo en blanco para visualizar todos)
		<br>
		<br/> Nombre del Usuario:   
		<input type="text" name="user" /><br/><br/>
		<input type="submit" name="Buscar" value="Buscar" /><br/><br/>
		<br>
			<?php
				if(isset($_REQUEST['user']))
				{
					$usuario = $_REQUEST['user'];

					$consulta = $this->db->query("SELECT * FROM usuario WHERE nombre LIKE '$usuario%'");
					if($consulta->num_rows() == 0)
					{
						echo "No existe ningún usuario que empiece por: ", $usuario;
					}
					else
					{
						foreach ($consulta->result_array() as $reg)
						{						
							echo "El nivel de permisos del usuario ",$reg['nombre']," cuyo DNI es ",$reg['DNI']," es: ",$reg['nivel_permisos'],"<br>";
						}
					}
				}
			?>
	</form>
	<div>
        <button onclick="location.href='<?= site_url() ?>Factura/test/prueba07/<?= $id ?>'">Documentar Test</button>
    </div>
    <br>
    <div>
        <button onclick="location.href='<?= site_url() ?>Factura/listar_factura'">Volver</button>
    </div>
</body>
</html>

