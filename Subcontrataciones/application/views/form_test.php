<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <h3>Documentar un nuevo test</h3>
	   <?= form_open(base_url()."Factura/check_prueba/$id_test/$id"); ?>
        	<label>¿Son correctas las comprobaciones?</label>
            <div>
                Aún sin comprobar <input type="radio" name="check" value="null" checked><br>
                Si <input type="radio" name="check" value="true"><br>
                No <input type="radio" name="check" value="false"><br>
            </div>

            <label>Comentario (opcional):</label>
            <div>
                <textarea name="comentario" rows="5" cols="55" placeholder="Comentario sobre el Test"></textarea>
            </div>

            <?= form_submit(array('id' => 'submit', 'value' => 'Enviar')); ?>
    	<?=form_close()?>
    </body>
</html>
