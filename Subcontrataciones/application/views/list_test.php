<html>
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
        <h3>Pruebas Realizadas: <?= $factura['identificacion'] ?></h3>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">ID Test</th>
                        <th scope="col">¿Correcto?</th>
                        <th scope="col">Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tests as $test){ ?>
                        <tr>
                            <td data-label="ID Test"><?= $test['id_test'] ?></td>
                            <td data-label="¿Correcto?"><?php if($test['esta_verificado'] == 1){
                                                            echo 'Si';
                                                            } elseif ($test['esta_verificado'] == 0){
                                                                echo 'No';
                                                            } else { echo 'Sin especificar'; } ?>
                                                            </td>
                            <td data-label="ID Test"><?= $test['comentario'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>

        <div>
            <button onclick="location.href='<?= site_url() ?>Factura/listar_factura'">Volver</button>
        </div>
    </body>
</html>