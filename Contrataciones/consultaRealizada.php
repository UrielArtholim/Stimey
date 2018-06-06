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
    <title>Consulta individual</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script>
        function muestra_oculta(id) {
            if (document.getElementById) { //se obtiene el id
                var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
                el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
            }
        }
        window.onload = function () {/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
            muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
        }
    </script>
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

        $idPersona = $_POST['idPersona'];
        
        //OBTENER DATOS PERSONALES
        $consulta_datos_personales = "SELECT * FROM Datos_Personales WHERE ID = ".$idPersona;


        $ejecutar_consulta = mysqli_query($conexion, $consulta_datos_personales);

        while($fila = mysqli_fetch_array($ejecutar_consulta))
        {
            $id = $fila[0];
            $nom = $fila[1];
            $primApel = $fila[2];
            $segApel = $fila[3];
            $nif = $fila[4];
            $cce = $fila[5];
            $centro = $fila[6];
            $fechIngre = $fila[7];
            $tDias = $fila[8];
            $numMatr = $fila[9];
        }

        $fechaFinal = date_format($fechIngre,"d-m-Y");
    ?>

    <!--FORMULARIO DE INSERTAR CONTRATO-->
    <section>
        <div id="inContrato">
            <fieldset><!--DATOS PERSONALES-->
                <legend>DATOS PERSONALES</legend><!--Nombre que aparecerá en la parte superior del fieldset-->
                <label>Nombre</label><input type="text" name="nombreUsuario" value="<?php echo $nom; ?>" readonly><br>
                <label>Primer apellido</label><input type="text" name="primApell" value="<?php echo $primApel; ?>" readonly><br>
                <label>Segundo apellido</label><input type="text" name="segApell" value="<?php echo $segApel; ?>" readonly><br>
                <label>DNI</label><input type="text" name="dni" value="<?php echo $nif; ?>" readonly><br>
                <label>Fecha de ingreso</label><input type="text" value="<?php echo $fechIngre ?>" readonly><br>
                <label>Total días</label><input type="text" name="tDias" value="<?php echo $tDias; ?>" readonly><br>
                <label>CCE</label><input type="text" name="cce" value="<?php echo $cce; ?>" readonly><br>
                <label>Numero matrícula</label><input type="text" name="nMatricula" value="<?php echo $numMatr; ?>" readonly><br>
                <label>Centro de destino</label><input type="text" name="centroDestino" value="<?php echo $centro; ?>" readonly><br>
                <br>
            </fieldset> <!--FIN FIELDSET DATOS PERSONALES-->
            
            <!--CONSULTA DE DATOS BANCARIOS-->
            <?php
                $consulta_datos_bancarios = "SELECT Banco, IBAN FROM Datos_Bancarios WHERE Datos_Personales_ID=".$idPersona;
                $ejecutar_consulta_banco = mysqli_query($conexion, $consulta_datos_bancarios);

                while($fila = mysqli_fetch_array($ejecutar_consulta_banco))
                {
                    $banco = $fila[0];
                    $iban = $fila[1];
                }
            ?>
            <fieldset>
                <legend>DATOS BANCARIOS</legend>
                <label>Banco</label><input type="text" name="nombreBanco" value="<?php echo $banco; ?>" readonly><br>
                <label>IBAN</label><input type="text" name="iban" value="<?php echo $iban; ?>" readonly><br>
            </fieldset> <!--FIN FIELDSET DATOS BANCARIOS-->
            
            <!--CONSULTA DE INSS-->
            <?php
                $consulta_cotizacion = "SELECT * FROM Cotizacion_INSS WHERE Datos_Personales_ID=".$idPersona;
                $ejecutar_consulta_cotizacion= mysqli_query($conexion, $consulta_cotizacion);

                while($fila = mysqli_fetch_array($ejecutar_consulta_cotizacion))
                {
                    $idcotizacion = $fila[0];
                    $grupo = $fila[1];
                    $cnae = $fila[2];
                    $num_Patronal = $fila[3];
                    $num_AfiliacionINSS = $fila[4];
                    $Prorrata_extras = $fila[5];
                    $Base_RESS = $fila[6];
                    $Base_Aportacion = $fila[7];
                    $AT_CC_Porcentaje = $fila[8];
                    $AE_CC_Porcentaje = $fila[9];
                    $AT_Desempleo_Porcentaje = $fila[10];
                    $AE_Desempleo_Porcentaje = $fila[11];
                    $AT_IProfesional_Porcentaje = $fila[12];
                    $AE_IProfesional_Porcentaje = $fila[13];
                    $AE_ATEP_Porcentaje_Porcentaje = $fila[14];
                    $AE_FOGASA_Porcentaje = $fila[15];
                    $AT_HorasEtras = $fila[16];
                    $AE_HorasExtras = $fila[17];
                    $AT_FuerzaMayor_Porcentaje = $fila[18];
                    $AE_FuerzaMayor_Porcentaje = $fila[19];
                    $AT_EyNE_Porcentaje = $fila[20];
                    $AE_EyNE_Porcentaje = $fila[21];
                    $AT_IRPF = $fila[22];
                    $AE_IRPF_Porcentaje = $fila[23];
                    $datosPersonalesID = $fila[24];
                    $datosPersonalesID2 = $fila[25];
                }
            ?>
            <fieldset>
                <legend>COTIZACIÓN A LA SEGURIDAD SOCIAL Y CONCEPTOS DE RECAUDACIÓN CONJUNTA</legend>
                <label>Grupo cotización</label><input type="text" name="grupoCotizacion" value="<?php echo $grupo; ?>" readonly><br>
                <label>CNAE</label><input type="text" name="cnae" value="<?php echo $cnae; ?>" readonly><br>
                <label>Número patronal</label><input type="text" name="numeroPatronal" value="<?php echo $num_Patronal; ?>" readonly><br>
                <label>Número afiliación</label><input type="text" name="numeroAfiliacion" value="<?php echo $num_AfiliacionINSS; ?>" readonly><br>
                <label>Prorrata p. extras</label><input type="text" name="prorrataExtras" value="<?php echo $Prorrata_extras; ?>" readonly><br>
                <!--REVISAR EN SQL, CREO QUE FALTA--><label>Prorrata pagos</label><input type="text" name="prorrataPagos" value="<?php echo $iban; ?>" readonly><br>
                <label>Base R. Esp. SS.</label><input type="text" name="baseRSS" value="<?php echo $Base_RESS; ?>" readonly><br>
                
                <fieldset>
                    <legend></legend>

                    <table>
                        <tr><th></th><th></th><th>TRABAJADOR</th><th></th><th></th><th>EMPRESA</th><th></th></tr>
                        <tr><th></th><th>Base</th><th>Porcentaje</th><th>Cuota</th><th>Base</th><th>Porcentaje</th><th>Cuota</th></tr>
                        <tr>
                            <td>Contingencias comunes</td>
                            <td><input type="text" name="baseCCTrabajador" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeCCTrabajador" value="<?php echo $AT_CC_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaCCTrabajador" value="<?php echo ($Base_Aportacion*$AT_CC_Porcentaje)/100; ?>" readonly></td>
                            <td><input type="text" name="baseCCEmpresa" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeCCEmpresa" value="<?php echo $AE_CC_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaCCEmpresa" value="<?php echo ($Base_Aportacion*$AE_CC_Porcentaje)/100; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Desempleo</td>
                            <td><input type="text" name="baseDesemTrabajador" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeDesemTrabajador" value="<?php echo $AT_Desempleo_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaDesemTrabajador" value="<?php echo ($Base_Aportacion*$AT_Desempleo_Porcentaje)/100; ?>" readonly></td>
                            <td><input type="text" name="baseDesemEmpresa" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeDesemEmpresa" value="<?php echo $AE_Desempleo_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaDesemEmpresa" value="<?php echo ($Base_Aportacion*$AE_Desempleo_Porcentaje)/100; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>I. Profesional</td>
                            <td><input type="text" name="baseIpTrabajador" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeIpTrabajador" value="<?php echo $AT_IProfesional_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaIpTrabajador" value="<?php echo ($Base_Aportacion*$AT_IProfesional_Porcentaje)/100; ?>" readonly></td>
                            <td><input type="text" name="baseIpEmpresa" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeIpEmpresa" value="<?php echo $AE_IProfesional_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaIpEmpresa" value="<?php echo ($Base_Aportacion*$AE_IProfesional_Porcentaje)/100; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>AT y EP</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="text" name="baseATEPEmpresa" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeATEPEmpresa" value="<?php echo $AE_ATEP_Porcentaje_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaATEPEmpresa" value="<?php echo ($Base_Aportacion*$AE_ATEP_Porcentaje_Porcentaje)/100; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Fogasa</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="text" name="baseFogasaEmpresa" value="<?php echo $Base_Aportacion; ?>" readonly></td>
                            <td><input type="text" name="porcentajeFogasaEmpresa" value="<?php echo $AE_FOGASA_Porcentaje; ?>" readonly></td>
                            <td><input type="text" name="cuotaFogasaEmpresa" value="<?php echo ($Base_Aportacion*$AE_FOGASA_Porcentaje)/100; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Horas extraordinarias</td>
                            <td><input type="text" name="baseHorasExtrTrabajador" value="<?php echo "0.00"; ?>" readonly></td>
                            <td></td>
                            <td></td>
                            <td><input type="text" name="baseHorasExtraEmpresa" value="<?php echo "0.00"; ?>" readonly></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Fuerza mayor</td>
                            <td></td>
                            <td><input type="text" name="porcentajeFuerzaTrabajador" value="<?php echo "0.00"; ?>" readonly></td>
                            <td><input type="text" name="cuotaFuerzaTrabajador" value="<?php echo "0.00"; ?>" readonly></td>
                            <td></td>
                            <td><input type="text" name="porcentajeFuerzaEmpresa" value="<?php echo "0.00"; ?>" readonly></td>
                            <td><input type="text" name="cuotaFuerzaEmpresa" value="<?php echo "0.00"; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Estructurales y no estructurales</td>
                            <td></td>
                            <td><input type="text" name="porcentajeEstructuralTrabajador" value="<?php echo "0.00"; ?>" readonly></td>
                            <td><input type="text" name="cuotaEstructuralTrabajador" value="<?php echo "0.00"; ?>" readonly></td>
                            <td></td>
                            <td><input type="text" name="porcentajeEstructuralEmpresa" value="<?php echo "0.00"; ?>" readonly></td>
                            <td><input type="text" name="cuotaEstructuralEmpresa" value="<?php echo "0.00"; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Base sujeta a ret. IRPF</td>
                            <td><input type="text" name="IRPFsujeta" value="<?php echo $AT_IRPF; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Base Rend. Especie sujeta ret. IRPF</td>
                            <td><input type="text" name="IRPFsujetaEspecie" value="<?php echo "0.00"; ?>" readonly></td>
                        </tr>
                    </table>
                </fieldset>
            </fieldset> <!--FIN FIELDSET COTIZACIÓN A LA SEGURIDAD SOCIAL-->
            
            <!--CONSULTA DE PAGO MENSUAL-->
            <?php
                $consulta_pago = "SELECT * FROM Pago_Mensual WHERE Cotizacion_INSS_idCotizacion_INSS=".$idcotizacion;
                $ejecutar_consulta_pago= mysqli_query($conexion, $consulta_pago);

                while($fila = mysqli_fetch_array($ejecutar_consulta_pago))
                {
                    $idpago = $fila[0];
                    $sueldo = $fila[1];
                    $categoriaPDI = $fila[2];
                    $descuento_CCC = $fila[3];
                    $Descuento_CDesmpleo = $fila[4];
                    $Descuento_CFP = $fila[5];
                    $Descuento_IRPF = $fila[6];
                    $Pago_Mensual = $fila[7];
                    $Cotizacion_INSS_id_inss = $fila[8];
                    $Cotizacion_INSS_Datos_Personales_ID = $fila[9];
                }
            ?>
            <fieldset>
                <legend>Paga mensual</legend>
                <table>
                    <tr><th>CONCEPTOS RETRIBUIDOS</th><th>Euros</th><th>DESCUENTOS</th><th>Euros</th></tr>
                    <tr>
                        <td>Sueldo</td>
                        <td><input type="text" name="sueldo" value="<?php echo $sueldo; ?>" readonly></td>
                        <td>Cuota contingencias comunes</td>
                        <td><input type="text" name="contingenciasComunes" value="<?php echo $descuento_CCC; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>C. Categoria PDI Laboral</td>
                        <td><input type="text" name="pdi" value="<?php echo $categoriaPDI; ?>" readonly></td>
                        <td>Cuota Desempleo</td>
                        <td><input type="text" name="cuotaDesempleo" value="<?php echo $Descuento_CDesmpleo; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Cuota formación profesional</td>
                        <td><input type="text" name="formacionProfesional" value="<?php echo $Descuento_CFP; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Descuento por IRPF</td>
                        <td><input type="text" name="descuentoIRPF" value="<?php echo $Descuento_IRPF; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="text" name="eurosRetribucion" value="<?php echo $retribucion = $sueldo+$categoriaPDI; ?>" readonly></td>
                        <td></td>
                        <td><input type="text" name="eurosDescuentos" value="<?php echo $descuentos = $descuento_CCC+$Descuento_CDesmpleo+$Descuento_CFP+$Descuento_IRPF; ?>" readonly></td>
                    </tr>
                </table>
            </fieldset>
            
            <fieldset>
                IMPORTE LÍQUIDO A RECIBIR<input type="text" name="totalCobro" value="<?php echo $retribucion-$descuentos;?>" readonly>
            </fieldset>

            Imagen del contrato<br>
            <a style='cursor: pointer;' onclick="muestra_oculta('contenido_a_mostrar')">Mostrar/Ocultar contrato</a><br>
            <div id="contenido_a_mostrar">
                <img src="imagenesContrato/<?php echo $nif; ?>.jpg" alt="Contrato" style="width:400px ; height:600px;">
            </div>
        </div>

    </section>
    <br>
    <br>
    <br>



    <a href="consultarContrato.php"><input type="button" value="Volver a contratos"></a>
</body>
</html>