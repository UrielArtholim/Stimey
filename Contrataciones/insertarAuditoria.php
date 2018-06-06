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
    <title>Auditoría insertada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        include "conexion/conexion_db.php";

        //OBTENEMOS LA ID DEL USUARIO A TRAVÉS DEL MÉTODO GET PASANDOLO POR LA URL
        $idPersona = $_GET['usr'];

        //DATOS A CONTRASTAR
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

        //Variable donde almacenaremos los errores obtenidos en la auditoría
        $errores = "";
        $numAlertas = 0;

        //PRIMERO OBTENDREMOS LOS DATOS DEL USUARIO DE LA TABLA DE LA SS
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
            $base = $fila[8];
            $AT_CC_Porcentaje = $fila[9];
            $AE_CC_Porcentaje = $fila[10];
            $AT_Desempleo_Porcentaje = $fila[11];
            $AE_Desempleo_Porcentaje = $fila[12];
            $AT_IProfesional_Porcentaje = $fila[13];
            $AE_IProfesional_Porcentaje = $fila[14];
            $AE_ATEP_Porcentaje_Porcentaje = $fila[15];
            $AE_FOGASA_Porcentaje = $fila[16];
            $AT_HorasEtras = $fila[17];
            $AE_HorasExtras = $fila[18];
            $AT_FuerzaMayor_Porcentaje = $fila[19];
            $AE_FuerzaMayor_Porcentaje = $fila[20];
            $AT_EyNE_Porcentaje = $fila[21];
            $AE_EyNE_Porcentaje = $fila[22];
            $AT_IRPF = $fila[23];
            $AE_IRPF_Porcentaje = $fila[24];
            $datosPersonalesID = $fila[25];
            $datosPersonalesID2 = $fila[26];
        }

        //REALIZAMOS LA COMPARACIÓN CAMPO A CAMPO
        if($base!=$baseNormal){
            $errores = $errores." Error en la base.<br>";
            $numAlertas++;
        }
        if ($AT_CC_Porcentaje!=$porcentajeCCTrabajador){
            $errores = $errores." Error en las contingencias comunes al trabajador.<br>";
            $numAlertas++;
        }
        if ($AE_CC_Porcentaje!=$porcentajeCCEmpresa){
            $errores = $errores." Error en las contingencias comunes a la empresa.<br>";
            $numAlertas++;
        }
        if ($AT_Desempleo_Porcentaje!=$porcentajeDesemTrabajador){
            $errores = $errores." Error en el desempleo del trabajador.<br>";
            $numAlertas++;
        }
        if ($AE_Desempleo_Porcentaje!=$porcentajeDesemEmpresa){
            $errores = $errores." Error en el desempleo de la empresa.<br>";
            $numAlertas++;
        }
        if ($AT_IProfesional_Porcentaje!=$porcentajeIpTrabajador){
            $errores = $errores." Error en I. Profesional del trabajador.<br>";
            $numAlertas++;
        }
        if ($AE_IProfesional_Porcentaje!=$porcentajeIpEmpresa){
            $errores = $errores." Error en I. Profesional de la empresa.<br>";
            $numAlertas++;
        }
        if ($AE_ATEP_Porcentaje_Porcentaje!=$porcentajeATEPEmpresa){
            $errores = $errores." Error en AT y EP de la empresa.<br>";
            $numAlertas++;
        }
        if ($AE_FOGASA_Porcentaje!=$porcentajeFogasaEmpresa){
            $errores = $errores." Error en el FOGASA de la empresa.<br>";
            $numAlertas++;
        }
        if ($AT_FuerzaMayor_Porcentaje!=$porcentajeFuerzaTrabajador){
            $errores = $errores." Error en la fuerza mayor trabajador.<br>";
            $numAlertas++;
        }
        if ($AE_FuerzaMayor_Porcentaje!=$porcentajeFuerzaEmpresa){
            $errores = $errores." Error en la fuerza mayor de la empresa.<br>";
            $numAlertas++;
        }
        if ($AT_FuerzaMayor_Porcentaje!=$porcentajeFuerzaTrabajador){
            $errores = $errores." Error en la fuerza mayor trabajador.<br>";
            $numAlertas++;
        }
        if ($AT_EyNE_Porcentaje!=$porcentajeEstructuralTrabajador){
            $errores = $errores." Error en Estructurales y no Estructurales del trabajador.<br>";
            $numAlertas++;
        }
        if ($AE_EyNE_Porcentaje!=$porcentajeEstructuralEmpresa){
            $errores = $errores." Error en la Estructurales y no Estructurales de la empresa.<br>";
            $numAlertas++;
        }


        //AHORA OBTENEMOS LOS RESULTADOS DE LA TABLA DE PAGO MENSUAL
        $consulta_pago = "SELECT * FROM Pago_Mensual WHERE Cotizacion_INSS_Datos_Personales_ID=".$idPersona;
        $ejecutar_consulta_pago= mysqli_query($conexion, $consulta_pago);

        while($fila = mysqli_fetch_array($ejecutar_consulta_pago))
        {
            $idpago = $fila[0];
            $sueldoB = $fila[1];
            $categoriaPDI = $fila[2];
            $descuento_CCC = $fila[3];
            $Descuento_CDesmpleo = $fila[4];
            $Descuento_CFP = $fila[5];
            $Descuento_IRPFB = $fila[6];
            $Pago_Mensual = $fila[7];
            $Cotizacion_INSS_id_inss = $fila[8];
            $Cotizacion_INSS_Datos_Personales_ID = $fila[9];
        }

        //COMPARACIONES
        if($sueldo != $sueldoB){
            $errores = $errores." Error en el sueldo mensual.<br>";
            $numAlertas++;
        }
        if($categoriaPDI != $pdi){
            $errores = $errores." Error en la categoría PDI.<br>";
            $numAlertas++;
        }
        if($descuento_CCC != $ccc){
            $errores = $errores." Error en la cuota de contingencias comunes.<br>";
            $numAlertas++;
        }
        if($Descuento_CDesmpleo != $cuotaDesempleo){
            $errores = $errores." Error en la cuota de desempleo.<br>";
            $numAlertas++;
        }
        if($Descuento_CFP != $cuotaFP){
            $errores = $errores." Error en la cuota de formación profesional.<br>";
            $numAlertas++;
        }
        if($descuentoIRPF != $Descuento_IRPFB){
            $errores = $errores." Error en la cuota de desempleo.<br>";
            $numAlertas++;
        }
        if($importeTotal!=$Pago_Mensual){
            $errores = $errores." Error en el pago mensual.<br>";
            $numAlertas++;
        }

        $insertarAlertas = "INSERT INTO alertas(idTrabajador,alerta,fechaAuditoria,numAlertas,alertaTratada) 
                            VALUES ('$idPersona', '$errores',NOW(),'$numAlertas', 0)";
        $ejecutarAlerta = mysqli_query($conexion, $insertarAlertas);

        if($ejecutarAlerta)
        {
            echo '<p>Auditoría insertada satisfactoriamente.</p>';
            echo '<a href="Contrataciones.php">Inicio</a>';
            header("Refresh: 5; url=Contrataciones.php"); 
        }else
        {
            echo '<p>No se ha podido insertar la auditoría.</p>';
            echo '<a href="Contrataciones.php">Inicio</a>';
            header("Refresh: 5; url=Contrataciones.php"); 
        }
    
    
    ?>
</body>
</html>