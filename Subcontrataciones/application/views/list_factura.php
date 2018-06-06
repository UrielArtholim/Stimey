<html>
<script type="text/javascript">
function confirma(){
    if (confirm("¿Realmente desea eliminar esta factura?")) { 
        alert("La factura será eliminada.");
        return true;
    } else {
        return false;
    }
}
</script>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;    
        }
    </style>
</head>
    <body>
        <h3>Auditoría de Facturación</h3>
        <div>
            <label>Buscar por Concepto:</label><br>
            <?= form_open(base_url()."Factura/listar_factura"); ?>
                <input type="text" name="concepto">
                <?= form_submit(array('id' => 'submit1', 'value' => 'Buscar')); ?>
                <br>
            <?= form_close(); ?>

            <label>Buscar por Fecha:</label><br>
            <?= form_open(base_url()."Factura/listar_factura"); ?>
                <input type="year" name="fecha">
                <?= form_submit(array('id' => 'submit2', 'value' => 'Buscar')); ?>
                <br>
            <?= form_close(); ?>

            <table>
                <thead>
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Fecha Emision</th>
                        <th scope="col">Importe Total</th>
                        <th scope="col">Prueba 7: Usuario Autorizado</th>
                        <th scope="col">Prueba 9: Unidades Compradas</th>
                        <th scope="col">Prueba 11: IVA</th>
                        <th scope="col">Ver Tests</th>
                        <th scope="col">Añadir Archivos</th>
                        <th scope="col">Modificar/Detalles</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">¿Verificada?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($facturas as $factura){ ?>
                        <tr>
                            <td data-label="Identificación"><?= $factura['identificacion'] ?></td>
                            <td data-label="Fecha Emisión"><?= $factura['fecha_emision'] ?></td>
                            <td data-label="Importe + Impuesto"><?= $factura['importe_impuesto'] ?></td>
                            <td data-label="Prueba 7: Usuario Autorizado"><a href="<?= site_url() ?>Factura/prueba07/<?= $factura['id']?>">Ir</a></td>
                            <td data-label="Prueba 9: Unidades Compradas"><a href="<?= site_url() ?>Factura/prueba09/<?= $factura['id']?>">Ir</a></td>
                            <td data-label="Prueba 11: IVA"><a href="<?= site_url() ?>Factura/prueba11/<?= $factura['id']?>">Ir</a></td>
                            <td data-label="Ver Tests"><a href="<?= site_url() ?>Factura/listar_test/<?= $factura['id']?>">Ir</a></td>
                            <td data-label="Añadir Archivos"><a shape="rect" href="<?= site_url() ?>Factura/insert_files/<?= $factura['id']?>">Ir</a></td>
                            <td data-label="Modificar/Detalles"><a href="<?= base_url('Factura/modificar_factura/'.$factura['id'])?>">Modificar/Detalles</a></td>
                            <td data-label="Eliminar"><a onclick="return confirma()" href="<?php echo base_url('Factura/eliminar_factura/'.$factura['id'])?>">Eliminar</a></td>
                            <td data-label="¿Verificada?"><?php if($factura['esta_verificada'] == 1){
                                                            echo 'Si';
                                                            } elseif ($factura['esta_verificada'] == 1){
                                                                echo 'No';
                                                            } else { echo 'Sin especificar'; } ?>
                                                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <label>La media de las facturas es: <?= round($media, 2) ?></label>
        <br><br>
        <div>
            <button onclick="location.href='<?= site_url() ?>Factura/nueva_factura'" >Añadir</button>
        </div>
    </body>
</html>