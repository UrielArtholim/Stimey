<html>
<head>
	<title>Prueba 9</title>
</head>

<body>
	<h3>Comprobación de que el precio es correcto en cada unidad</h3>
	<form method="post">
		<br/>
		Importe Unitario:
		<input type="number" step="any" min = "0" name="Importe_Articulo" /><br/><br/>
		Cantidad:
		<input type="number" step="any" min = "0" name="Cantidad" /><br/><br/>
		<input type="submit" name="Calcular" value="Calcular" /><br/>

		<table>
		<tr>
			<th colspan="2">
				<?php
					if(isset($_REQUEST['Importe_Articulo']))
					{
						$Importe = $_REQUEST['Importe_Articulo'];
						$Cantidad = $_REQUEST['Cantidad'];

						if(empty($Importe) || empty($Cantidad))
						{
							echo "ERROR. Debe rellenar ambos campos.";
						}
						else
						{
							$Total = $Importe * $Cantidad;
							echo "El importe total es: ",($Total);
						}		
					}
				?>
			</th>
		</tr>
		</table>

	</form>
    <div>
        <button onclick="location.href='<?= site_url() ?>Factura/test/prueba09/<?= $id ?>'">Documentar Test</button>
    </div>
    <br>
    <div>
        <button onclick="location.href='<?= site_url() ?>Factura/listar_factura'">Volver</button>
    </div>

</body>
</html>
