<!DOCTYPE html>
<html>
<head>
   <title>Selección</title>
</head>
<body><center>
   <img src="./LogoStimey.jpg" alt="Logo Stimey"/>
      <form name="form1" action="" method="post">
         <div>
            <?php 
               session_start();
               echo "Bienvenido: ". $_SESSION['usuario'];?>
            <br><br>
            Selecciona la prueba a la que desea acceder.
            <br><br>
            <select name="origen" id="origen">
               <option value="SubcontratacionFactura">Subcontratación y factura</option>
               <option value="Contratacion">Contratación</option>
               <option value="Existencia" >Existencia</option>
               <option value="Inmovilizado" >Inmovilizado</option>
            </select>
            <input type="submit" value="Cargar" name="cargar" onclick="" >
         </div>
      </form>
</center>
</body>
</html>