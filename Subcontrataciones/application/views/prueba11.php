<html>
<head>
	<title>Prueba 11</title>
</head>

<body>
	<h3>Comprobación del IVA</h3>
	<form method="post">
		<table>
			<tr>
				<td>Importe: </td>
				<td><input type="number" step ="any" min ="0" id="txtImport" name="txtImport"/></td>
			</tr>
			<tr>
				<td>IVA: </td>
				<td><input type="number" step = "any" min = "0" id="txtIVA" name="txtIVA" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" id="submit" name = "submit" Value="Calcular" /></td>
			</tr>
			<tr>
				<th colspan="2">
				<?php
					
					if(isset($_REQUEST['txtImport']))
					{
						$Import = $_REQUEST['txtImport'];
						$IVA = $_REQUEST['txtIVA'];

						if(empty($Import) || empty($IVA))
							{
								echo "ERROR. Debe rellenar ambos campos";
							}else{
								$IVA = $IVA / 100;
								echo "El importe es: ",($Import + $Import*$IVA);

						}
					}

					?>
				</th>
			</tr>
		</table>
	</form>
    <div>
        <button onclick="location.href='<?= site_url() ?>Factura/test/prueba11/<?= $id ?>'" >Documentar Test</button>
    </div>
    <br>
    <div>
        <button onclick="location.href='<?= site_url() ?>Factura/listar_factura'">Volver</button>
    </div>
</body>
</html>