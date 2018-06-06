<!DOCTYPE html>
<?php 
	error_reporting(E_ERROR);
	session_start();
	$usuario=$_SESSION['usuario'];
	$pass=$_SESSION['passwd'];
    $acceso=$_SESSION['idUsuario'];
    
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consultar auditoría</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
            width: 90%;
            text-align: center;
        }
        td, th, tr{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php  
        include "conexion/conexion_db.php";
    
        $consulta_alertas = "SELECT * FROM alertas WHERE alertaTratada = 0";
        $ejecutar_consulta = mysqli_query($conexion, $consulta_alertas);

        if(mysqli_num_rows($ejecutar_consulta)!=0){
            //SI HAY ALERTAS MOSTRAMOS LAS ALERTAS Y EL NOMBRE, APELLIDO Y DNI DEL USUARIO CON INCIDENCIAS.
            echo '<form action="tratarAlerta.php" method="POST" name="formAuditar">';
            echo '<br><br>';
            echo '<h2>Contratos</h2>';
            echo '<table>';
                echo '<tr><th></th><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>DNI</th><th>Alertas</th></tr>';
                while($fila = mysqli_fetch_array($ejecutar_consulta, MYSQLI_ASSOC))
                {
                    $idAlerta = $fila['idAlerta'];
                    $id = $fila['idTrabajador'];
                    $a = $fila['alerta'];
                    $b = $fila['fechaAuditoria'];
                    $numAlerta = $fila['numAlertas'];
                    $consulta_individual = "SELECT ID, Nombre, primerApellido, segundoApellido, NIF FROM Datos_Personales WHERE ID=$id";
                    $cargarTrabajador = mysqli_query($conexion, $consulta_individual);
                    while($fila2 = mysqli_fetch_array($cargarTrabajador, MYSQLI_ASSOC)){
                        $idDatos_Personales = $fila2['ID'];
                        $nombre = $fila2['Nombre'];
                        $primApell = $fila2['primerApellido'];
                        $segApell = $fila2['segundoApellido'];
                        $dni = $fila2['NIF'];
                        echo '<!--Listado de trabajadores dentro de la tabla-->';
                        echo '<tr>';
                            echo '<input type="hidden" name="idAlerta" value="'.$idAlerta.'">';
                            echo '<td><input type="radio" name="idPersona" value="'.$id.'"></td>';
                            echo '<td>'.$nombre.'</td>';
                            echo '<td>'.$primApell.'</td>';
                            echo '<td>'.$segApell.'</td>';
                            echo '<td>'.$dni.'</td>';
                            echo '<td>'.$numAlerta.'</td>';
                        echo '</tr>';
                    }
                }
                echo '</table><br>';

                echo '<input type="submit" value = "Consultar" name="consu"><br>';
                echo '<a href="Contrataciones.php"><input type="button" value="Atras"></a>';
            echo '</form>';
        }else{
            echo '<p>No hay alertas a tratar.</p>';
            echo '<a href="Contrataciones.php"><input type="button" value="Atras"></a>';
        }
    
    ?>
</body>
</html>