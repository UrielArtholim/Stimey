<html>
<script type="text/javascript">
function confirma(){
    if (confirm("¿Realmente desea eliminar este archivo?")) { 
        alert("El archivo será eliminado.");
        return true;
    } else {
        return false;
    }
}
</script>
  <head>
      <title>Archivos</title>
  </head>
    <body>
        <h3>Archivos de la factura: <?= $factura['identificacion']?></h3>
        <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
        <form enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
                <label>Pulse en examinar o arrastre las imágenes directamente: </label>
                <input type="file" class="form-control" name="userFiles[]" multiple />
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary" type="submit" name="fileSubmit" value="CARGAR ARCHIVOS"/>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Archivo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $id = 0;
                  foreach ($files as $file){ $id++; ?>
                  <tr>
                    <td data-label="#"><?= $id ?></td>
                    <td data-label="Archivo"><?php if(mb_substr($file['ruta'], -1) == 'g' || mb_substr($file['ruta'], -1) == 'G' || mb_substr($file['ruta'], -1) == 'p' || mb_substr($file['ruta'], -1) == 'P'){echo "<img src= \"".base_url($file['ruta'])."\" alt=\"\" height=\"150\" >";}else{echo $file['ruta'];} ?></td>
                  </tr>
                <?php } ?>
            </tbody>
        </table>

        <div>
            <button onclick="location.href='<?= site_url() ?>Factura/listar_factura'">Volver</button>
        </div>
    </body>
</html>
