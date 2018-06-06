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
    <title>Contrato nuevo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script type="text/javascript" src="javascript/validacion.js"></script>
    
</head>
<body>
    <section>
        <div id="inContrato">
            <form action="comprobarFormulario.php" method="post" name="formulario" onsubmit="return comprobacion()">
                <fieldset><!--Marco para agrupar contenido-->
                    <legend>DATOS PERSONALES</legend><!--Nombre que aparecerá en la parte superior del fieldset-->
                    <label>Nombre</label><input type="text" name="nombreUsuario" placeholder="Nombre"><br>
                    <label>Primer apellido</label><input type="text" name="primApell" placeholder="1º Apellido"><br>
                    <label>Segundo apellido</label><input type="text" name="segApell" placeholder="2º Apellido"><br>
                    <label>DNI</label><input type="text" name="dni" placeholder="DNI" onblur="nif(this.value)"><br>
                    <label>Fecha de ingreso</label><br>
                        <!--DÍA INGRESO-->
                        <label>Día</label>
                            <select name="diaNac">
                                <?php  
                                    for($i=1; $i<=31; $i++){
                                            if($i==date('j')){
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                    }
                                ?>
                            </select>
                        <!--MES INGRESO-->
                        <label>Mes</label>
                            <select name="mesNac">
                                <?php  
                                    for($i=1; $i<=12; $i++){
                                            if($i==date('m')){
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                    }
                                ?>
                            </select>

                        <!--AÑO INGRESO-->
                        <label>Año</label>
                            <select name="anioNac">
                                <?php  
                                    for($i=date('o'); $i>=(date('o')-65); $i--){
                                            if($i==date('o')){
                                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                    }
                                ?>
                            </select><br>
                        <!--FIN FECHA INGRESO-->
                        <label>Total días</label><input type="text" name="tDias"><br>
                        <label>CCE</label><input type="text" name="cce"><br>
                        <label>Numero matrícula</label><input type="text" name="nMatricula"><br>
                        <label>Centro de destino</label><input type="text" name="centroDestino"><br>
                    <br>
                </fieldset> <!--FIN FIELDSET DATOS PERSONALES-->

                <fieldset>
                    <legend>DATOS BANCARIOS</legend>
                    <label>Banco</label><input type="text" name="nombreBanco"><br>
                    <label>IBAN</label><input type="text" name="iban" onsubmit="return fn_ValidateIBAN(this.value);"><br>
                </fieldset> <!--FIN FIELDSET DATOS BANCARIOS-->
                
                <fieldset>
                    <legend>COTIZACIÓN A LA SEGURIDAD SOCIAL Y CONCEPTOS DE RECAUDACIÓN CONJUNTA</legend>
                    <label>Grupo cotización</label><input type="text" name="grupoCotizacion"><br>
                    <label>CNAE</label><input type="text" name="cnae"><br>
                    <label>Número patronal</label><input type="text" name="numeroPatronal"><br>
                    <label>Número afiliación</label><input type="text" name="numeroAfiliacion"><br>
                    <label>Prorrata p. extras</label><input type="text" name="prorrataExtras"><br>
                    <label>Prorrata pagos</label><input type="text" name="prorrataPagos"><br>
                    <label>Base R. Esp. SS.</label><input type="text" name="baseRSS"><br>
                    
                    <fieldset>
                        <legend></legend>
                        Introduce la base salarial: <input type="text" name="base" id="base" onkeyup="add();">
                        <table>
                            <tr><th></th><th></th><th>TRABAJADOR</th><th></th><th></th><th>EMPRESA</th><th></th></tr>
                            <tr><th></th><th>Base</th><th>Porcentaje</th><th>Cuota</th><th>Base</th><th>Porcentaje</th><th>Cuota</th></tr>
                            <tr>
                                <td>Contingencias comunes</td>
                                <td><input type="text" name="baseCCEmpleado" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeCCTrabajador" id="porcentajeCCTrabajador" onkeyup="mostrarCuotaCCT()"></td>
                                <td><input type="text" name="cuotaCCTrabajador" class="cuota" readonly></td>
                                <td><input type="text" name="baseCC" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeCCEmpresa"></td>
                                <td><input type="text" name="cuotaCCEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>Desempleo</td>
                                <td><input type="text" name="baseDesempleoTrabajador" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeDesemTrabajador"></td>
                                <td><input type="text" name="cuotaDesemTrabajador" readonly></td>
                                <td><input type="text" name="baseDesempleoEmpresa" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeDesemEmpresa"></td>
                                <td><input type="text" name="cuotaDesemEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>I. Profesional</td>
                                <td><input type="text" name="baseIpTrabajador" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeIpTrabajador"></td>
                                <td><input type="text" name="cuotaIpTrabajador" readonly></td>
                                <td><input type="text" name="baseIpEmpresa" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeIpEmpresa"></td>
                                <td><input type="text" name="cuotaIpEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>AT y EP</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="text" name="baseATEP" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeATEPEmpresa"></td>
                                <td><input type="text" name="cuotaATEPEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>Fogasa</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="text" name="baseFogasa" class="entrada-usuario" readonly></td>
                                <td><input type="text" name="porcentajeFogasaEmpresa"></td>
                                <td><input type="text" name="cuotaFogasaEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>Horas extraordinarias</td>
                                <td><input type="text" name="baseHorasExtrTrabajador"></td>
                                <td></td>
                                <td></td>
                                <td><input type="text" name="baseHorasExtraEmpresa"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fuerza mayor</td>
                                <td></td>
                                <td><input type="text" name="porcentajeFuerzaTrabajador"></td>
                                <td><input type="text" name="cuotaFuerzaTrabajador" readonly></td>
                                <td></td>
                                <td><input type="text" name="porcentajeFuerzaEmpresa"></td>
                                <td><input type="text" name="cuotaFuerzaEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>Estructurales y no estructurales</td>
                                <td></td>
                                <td><input type="text" name="porcentajeEstructuralTrabajador"></td>
                                <td><input type="text" name="cuotaEstructuralTrabajador" readonly></td>
                                <td></td>
                                <td><input type="text" name="porcentajeEstructuralEmpresa"></td>
                                <td><input type="text" name="cuotaEstructuralEmpresa" readonly></td>
                            </tr>
                            <tr>
                                <td>Base sujeta a ret. IRPF</td>
                                <td><input type="text" name="IRPFsujeta"></td>
                            </tr>
                            <tr>
                                <td>Base Rend. Especie sujeta ret. IRPF</td>
                                <td><input type="text" name="IRPFsujetaEspecie"></td>
                            </tr>
                        </table>
                    </fieldset>
                </fieldset> <!--FIN FIELDSET COTIZACIÓN A LA SEGURIDAD SOCIAL-->
                 
                <fieldset>
                    <legend>Paga mensual</legend>
                    <table>
                        <tr><th>CONCEPTOS RETRIBUIDOS</th><th>Euros</th><th>Descuentos</th><th>Euros</th></tr>
                        <tr>
                            <td>Sueldo</td>
                            <td><input type="text" name="sueldo"></td>
                            <td>Cuota contingencias comunes</td>
                            <td><input type="text" name="contingenciasComunes"></td>
                        </tr>
                        <tr>
                            <td>C. Categoria PDI Laboral</td>
                            <td><input type="text" name="pdi"></td>
                            <td>Cuota Desempleo</td>
                            <td><input type="text" name="cuotaDesempleo"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Cuota formación profesional</td>
                            <td><input type="text" name="formacionProfesional"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Descuento por IRPF</td>
                            <td><input type="text" name="descuentoIRPF"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" name="eurosRetribucion" readonly></td>
                            <td></td>
                            <td><input type="text" name="eurosDescuentos" readonly></td>
                        </tr>
                    </table>
                </fieldset>
                
                <fieldset>
                    IMPORTE LÍQUIDO A RECIBIR<input type="text" name="totalCobro" readonly>
                </fieldset>

                Insertar imagen del contrato
                <input type="file" name="subirContrato" id="subirContrato"><br><br><br>
                
                Los campos con asterisco (*) son obligatorios.
				<div id="campo_erroneo"></div>
                <input type="submit" value="Insertar">
                <a href="Contrataciones.php"><input type="button" value="Atras"></a>
            </form>
        </div>
    </section>
</body>
</html>