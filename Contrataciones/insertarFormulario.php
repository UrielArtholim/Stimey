<?php

include 'conexion/conexion_db.php';

//Con isset nos aseguramos que hemos recibido un dato en el formulario
if(isset($_POST['dni']) && isset($_POST['nMatricula'])) //Aquí introducimos los campos en los que queremos comprobar si ya están en nuestra base de datos.
{
    //Ahora guardamos en variables lo que recibimos por el POST
    //DATOS PERSONALES
    $nombre = $_POST['nombreUsuario'];
    $primApell = $_POST['primApell'];
    $segApell = $_POST['segApell'];
    $dni = $_POST['dni'];
    $diaCon = $_POST['diaNac'];
    $mesCon=$_POST['mesNac'];
    $annioCon=$_POST['anioNac'];
    $tdias = $_POST['tDias'];
    $cce = $_POST['cce'];
    $numMatricula = $_POST['nMatricula'];
    $centroDestino = $_POST['centroDestino'];

    //DATOS BANCARIOS
    $banco = $_POST['nombreBanco'];
    $iban = $_POST['iban'];

    //COTIZACIONES
    $grupoCotizacion = $_POST['grupoCotizacion'];
    $cnae = $_POST['cnae'];
    $numPatro = $_POST['numeroPatronal'];
    $numAfiliacion = $_POST['numeroAfiliacion'];
    $prorrataExtras = $_POST['prorrataExtras'];
    $prorratasPagos = $_POST['prorratasPagos'];
    $baseRSS = $_POST['baseRSS'];
    $baseNormal = $_POST['base'];
    $porcentajeCCTrabajador = $_POST['porcentajeCCTrabajador'];
    $cuotaCCTrabajador = ($baseNormal*$porcentajeCCTrabajador)/100;
    $porcentajeCCEmpresa = $_POST['porcentajeCCEmpresa'];
    $cuotaCCEmpresa = ($baseNormal*$porcentajeCCEmpresa)/100;
    $porcentajeDesemTrabajador = $_POST['porcentajeDesemTrabajador'];
    $cuotaDesemTrabajador = ($baseNormal*$porcentajeDesemTrabajador)/100;
    $porcentajeDesemEmpresa = $_POST['porcentajeDesemEmpresa'];
    $cuotaDesemEmpresa = ($baseNormal*$porcentajeDesemEmpresa)/100;
    $porcentajeIpTrabajador = $_POST['porcentajeIpEmpresa'];
    $cuotaIpTrabajador = ($baseNormal*$porcentajeIpTrabajador)/100;
    $porcentajeIpEmpresa = $_POST['porcentajeIpEmpresa'];
    $cuotaIpTrabajador = ($baseNormal*$porcentajeIpEmpresa)/100;
    $porcentajeATEPEmpresa = $_POST['porcentajeATEPEmpresa'];
    $cuotaATEPEmpresa = ($baseNormal*$porcentajeATEPEmpresa)/100;
    $porcentajeFogasaEmpresa = $_POST['porcentajeFogasaEmpresa'];
    $cuotaFogasaEmpresa = ($baseNormal*$porcentajeFogasaEmpresa)/100;
    $porcentajeFuerzaTrabajador = $_POST['porcentajeFuerzaTrabajador'];
    $porcentajeFuerzaEmpresa = $_POST['porcentajeFuerzaEmpresa'];
    $porcentajeEstructuralTrabajador = $_POST['porcentajeEstructuralTrabajador'];
    $porcentajeEstructuralEmpresa = $_POST['porcentajeEstructuralEmpresa'];
    $retencionesIRPF = $_POST['IRPFsujeta'];

    //PAGO MENSUAL
    $sueldo = $_POST['sueldo'];
    $ccc = $_POST['contingenciasComunes'];
    $pdi = $_POST['pdi'];
    $cuotaDesempleo = $_POST['cuotaDesempleo'];
    $cuotaFP = $_POST['formacionProfesional'];
    $descuentoIRPF = $_POST['descuentoIRPF'];
    $eurosRetribucion = $sueldo + $pdi;
    $eurosDescuentos = $ccc + $cuotaDesempleo + $descuentoIRPF + $cuotaFP;
    $importeTotal = $eurosRetribucion - $eurosDescuentos;

    //Realizaremos consultas a la base de datos para ejecutarlas
    //y obtener el número de filas de dichas consultas. Si obtenemos un numero distinto de 0,
    //notificaremos un error que detendrá la inserción de los datos.

    $comprobar_dni = "SELECT NIF FROM Datos_Personales WHERE NIF = '$dni'";
    $ejecutar_dni = mysqli_query($conexion, $comprobar_dni);
    
    $comprobar_matricula = "SELECT Numero_Matricula FROM Datos_Personales WHERE Numero_Matricula = '$numMatricula'";
    $ejecutar_matricula = mysqli_query($conexion, $comprobar_matricula);
    
    $comprobar_iban = "SELECT IBAN FROM Datos_Bancarios WHERE IBAN = '$iban'";
    $ejecutar_iban = mysqli_query($conexion, $comprobar_iban);

    //OBTENEMOS EL ULTIMO ID DE DATOS PERSONALES PARA INCREMENTARLO EN 1 PARA ESTA INSERCIÓN
    $maxID = "SELECT max(ID) FROM Datos_Personales";
    $ejecutarId = mysqli_query($conexion, $maxID);
    while($fila = mysqli_fetch_array($ejecutarId)){
        $filaId = $fila[0];
    }

    //OBTENEMOS EL ULTIMO ID DE COTIZACIÓN A LA SS PARA INCREMENTARLO EN 1 PARA ESTA INSERCIÓN
    $maxCotizacion = "SELECT max(idCotizacion_INSS) FROM Cotizacion_INSS";
    $ejecutarCotizacion = mysqli_query($conexion, $maxCotizacion);
    while($fila = mysqli_fetch_array($ejecutarCotizacion)){
        $filaCotizacion = $fila[0];
    }

    //ADAPTACIÓN DE LA FECHA
    $fecha = $annioCon."-".$mesCon."-".$diaCon;

    //COMIENZO DE LA INSERCIÓN EN LA BD
    if(mysqli_num_rows($ejecutar_dni) == 0)
    {
        if(mysqli_num_rows($ejecutar_matricula) == 0)
        {
            if(mysqli_num_rows($ejecutar_iban) == 0){

                //---------INSERTAR DATOS PERSONALES----------
                //Si no obtenemos ninguna fila, insertamos los datos del usuario.
                $insertarDatosPersonales = "INSERT INTO Datos_Personales(Nombre, primerApellido, segundoApellido, NIF, CCE, Centro_destino, F_Ingreso, Total_Dias, Numero_Matricula) 
                    VALUES ('".$nombre."', '".$primApell."', '".$segApell."', '".$dni."','".$cce."', '".$centroDestino."','".$fecha."','".$tdias."','".$numMatricula."')";
                $ejecutarDatosPersonales = mysqli_query($conexion, $insertarDatosPersonales);

                //--------INSERTAR DATOS BANCARIOS------------
                $insertarDatosBancarios = "INSERT INTO Datos_Bancarios(Datos_Personales_ID, Banco, IBAN) VALUES ('".($filaId+1)."','".$banco."','".$iban."')";
                $ejecutarDatosBancarios = mysqli_query($conexion, $insertarDatosBancarios);

                //--------INSERTAR DATOS SEGURIDAD SOCIAL---------
                $insertarDatosSS = "INSERT INTO Cotizacion_INSS(Grupo, CNAE, Num_Patronal, Num_AfiliacionINSS, Prorrata_extras, Base_RESS, Base_Aportacion, AT_CC_Porcentaje, AE_CC_Porcentaje, AT_Desempleo_Porcentaje, AE_Desempleo_Porcentaje, AT_IProfesional_Porcentaje, AE_IProfesional_Porcentaje, AE_ATEP_Porcentaje_Porcentaje, AE_FOGASA_Porcentaje, AT_HorasExtras, AE_HorasExtras, AT_FuerzaMayor_Porcentaje, AE_FuerzaMayor_Porcentaje, AT_EyNE_Porcentaje, AE_EyNE_Porcentaje, AT_IRPF, AE_IRPF_Porcentaje, Datos_Personales_ID, Datos_Personales_ID1) 
                    VALUES ('$grupoCotizacion','$cnae','$numPatro','$numAfiliacion','$prorrataExtras','$baseRSS','$baseNormal','$porcentajeCCTrabajador','$porcentajeCCEmpresa','$porcentajeDesemTrabajador','$porcentajeDesemEmpresa','$porcentajeIpTrabajador','$porcentajeIpEmpresa','$porcentajeATEPEmpresa','$porcentajeFogasaEmpresa','0.0','0.0','$porcentajeFuerzaTrabajador','$porcentajeFuerzaEmpresa','$porcentajeEstructuralTrabajador','$porcentajeEstructuralEmpresa','$retencionesIRPF','0.0','".($filaId+1)."','".($filaId+1)."')";
                $ejecutarDatosSS = mysqli_query($conexion, $insertarDatosSS);

                //--------INSERTAR DATOS MENSUALES
                $insertarPagoMensual = "INSERT INTO Pago_Mensual(Sueldo, CategoriaPDI, Descuento_CCC, Descuento_CDesempleo, Descuento_CFP, Descuento_IRPF, Pago_Mensualcol, Cotizacion_INSS_idCotizacion_INSS, Cotizacion_INSS_Datos_Personales_ID) 
                    VALUES ('$sueldo','$pdi','$ccc','$cuotaDesempleo','$cuotaFP','$descuentoIRPF','$importeTotal','".($filaCotizacion+1)."','".($filaId+1)."')";
                $ejecutarPagoMensual = mysqli_query($conexion, $insertarPagoMensual);

                //--------SUBIR IMAGEN DEL CONTRATO
                /*$archivo = $_FILES['subirContrato']['name'];
                $temporal = $_FILES['subirContrato']['tmp_name'];
                $cortar_extension = explode('.', $archivo);
                $extension = end($cortar_extension);
                $add_extension = '.'.$extension;


                $archivo=$_FILES['subirContrato']['name'];
			    $temporal=$_FILES['subirContrat']['tmp_name'];

			    $cortar_extension=explode('.', $archivo);
			    $extension = end($cortar_extension);
			    $add_extension='.'.$extension;

			    move_uploaded_file($temporal,"/Applications/XAMPP/htdocs/Contrataciones/imagenesContrato/".$dni.$add_extension);

                /*chmod('imagenesContrato/'.$nombre.$add_extension, 0777);

                if(move_uploaded_file($temporal,'imagenesContrato/'.$dni.$add_extension)){
                    chmod('imagenesContrato/'.$nombre.$add_extension, 0777);
                    echo "<p>Contrato subido correctamente</p>";
                }else{
                    echo "<p>Error. No se ha podido subir el contrato.</p>";
                }
                */

                $dir_subida='/Applications/XAMPP/htdocs/Contrataciones/imagenesContrato/';
                $fichero_subido = $dir_subida.basename($_FILES['subirContrato']['name']);
                if(move_uploaded_file($_FILES['subirContrato']['tmp_name'], $fichero_subido)){
                    echo "El fichero es válido y se subió con éxito.\n";
                }else{
                    echo "Fichero no subido.\n";
                    print_r($_FILES);
                }
                //Serie de mensajes que una vez introducido en la base de datos obtendremos en pantalla
                $mensaje =  "<p>Contratacion insertada.</p><br>";
                $redireccion = "Śerá redirigido en 5 segundos.";
                $url = "<a href='insertarContrato.php'>Inicio</a>";
                header("Refresh: 5; url=Contrataciones.php");
            }
            else
            {
                $mensaje = "El número de IBAN introducido ya se encuentra registrado.";
                $redireccion = "Śerá redirigido en 5 segundos.";
                $url = "<a href='insertarContrato.php'>Volver al formulario.</a>";
                header("Refresh: 5; url=Contrataciones.php");
            }
        }
        else
        {
            $mensaje = "El número de matricula introducido ya existe.";
            $redireccion = "Śerá redirigido en 5 segundos.";
            $url = "<a href='insertarContrato.php'>Volver al inicio.</a>";
            header("Refresh: 5; url=Contrataciones.php");
        }
    }
    else
    {
        $mensaje = "El DNI introducido ya existe.";
		$redireccion = "Śerá redirigido en 5 segundos.";
		$url = "<a href='insertarContrato.php'>Volver al inicio.</a>";
		header("Refresh: 5; url=Contrataciones.php");
    }
}
else
{
    $mensaje = "No se han recibido todos los datos necesarios.";
    $redireccion = "Śerá redirigido en 5 segundos.";
    $url = "<a href='insertarContrato.php'>Volver al inicio.</a>";
    header("Refresh: 5; url=Contrataciones.php");
}

?>