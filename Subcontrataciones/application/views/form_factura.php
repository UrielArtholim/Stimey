<html>
<body>
    <h3> <?php if(isset($id)) echo "Modificar/Visualizar Factura";
                    else echo "Nueva Factura"; ?></h3>
        
        <?php if (validation_errors()): ?>
            Tiene errores en el formulario:
            <div>
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

	<?php if(!isset($id)) echo form_open_multipart(base_url()."Factura/crear_factura");
        else echo form_open_multipart(base_url()."Factura/cambiar_factura/".$id); ?>

		<label>Datos de la Factura:</label><br>

        <div>
            <input type="text" name="identificacion" placeholder="Id. de la Factura" value="<?php if(isset($factura['identificacion'])) echo $factura['identificacion'];?>">
        </div> 

        <div>
            <textarea name="descripcion" rows="5" cols="55" placeholder="Descripción de la Factura"><?php if(isset($factura['descripcion'])) echo $factura['descripcion'];?></textarea>
        </div>

        <div>
            <input type="text" name="usuario" placeholder="Usuario/Comprador" value="<?php if(isset($factura['usuario'])) echo $factura['usuario'];?>">
        </div>

        <div>
            Fecha de Emisión: <input type="date" name="fecha_emision" value="<?php if(isset($factura['fecha_emision'])) echo $factura['fecha_emision'];?>">
        </div> 

        <div>
            Fecha de Pago: <input type="date" name="fecha_pago" value="<?php if(isset($factura['fecha_pago'])) echo $factura['fecha_pago'];?>">
        </div> 

        <div>
            <input type="text" name="importe" placeholder="Importe" value="<?php if(isset($factura['importe'])) echo $factura['importe'];?>">
        </div> 

        <div>
            <input type="text" name="impuesto" placeholder="Impuesto (%)" value="<?php if(isset($factura['impuesto'])) echo $factura['impuesto'];?>">
        </div> 

        <div>
            <input type="text" name="importe_impuesto" placeholder="Importe + Impuesto" value="<?php if(isset($factura['importe_impuesto'])) echo $factura['importe_impuesto'];?>">
        </div>

        <br>

        <label>Datos del Emisor:</label><br>
        <div>
            <input type="text" name="nombre_emisor" placeholder="Nombre del Emisor" value="<?php if(isset($factura['nombre_emisor'])) echo $factura['nombre_emisor'];?>">
        </div> 

        <div>
            <input type="text" name="NIF_emisor" placeholder="NIF del Emisor" value="<?php if(isset($factura['NIF_emisor'])) echo $factura['NIF_emisor'];?>">
        </div> 

        <div>
            <input type="text" name="denom_social_emisor" placeholder="Denom. Social Emisor" value="<?php if(isset($factura['denom_social_emisor'])) echo $factura['denom_social_emisor'];?>">
        </div> 

        <div>
            <textarea name="domicilio" rows="2" cols="55" placeholder="Domicilio"><?php if(isset($factura['domicilio'])) echo $factura['domicilio'];?></textarea>
        </div>

        <br>

        <label>¿Los datos de esta factura están verificados?</label>
        <div>
            Aún sin comprobar <input type="radio" name="check" value="null" checked><br>
            Si <input type="radio" name="check" value="true" <?php if(isset($factura['esta_verificada']) && $factura['esta_verificada'] == true) echo 'checked'; ?>><br>
            No <input type="radio" name="check" value="false" <?php if(isset($factura['esta_verificada']) && $factura['esta_verificada'] == false) echo 'checked'; ?>><br>
        </div>

        <label>Comentario (opcional):</label>
        <div>
            <textarea name="comentario" rows="5" cols="55" placeholder="Comentario sobre la Factura"><?php if(isset($factura['comentario'])) echo $factura['comentario'];?></textarea>
        </div>

        <br>

        <?= form_submit(array('id' => 'submit', 'value' => 'Enviar')); ?>

	<?=form_close()?>
        <div>
            <button onclick="location.href='<?= site_url() ?>Factura/listar_factura'">Volver</button>
        </div>
</body>
</html>