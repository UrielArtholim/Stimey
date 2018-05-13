<?php
  /*
    PHP File to generate dynamically one HTML table
    Used for showing the last 20 modifications
  */

    // Establecemos conexión con la base de datos
    if(!isset($_SESSION)){session_start();}


  	$select_header = "<html>
      <head>
        <title>
          Table Select
		    </title>
		    <meta charset=\"UTF-8\">
	   </head>
     ";

     $select_welcome = "<body>
     <div>
     <center>
        <img src=\".\LogoStimey.jpg\" alt=\"Logo Stimey\"/>
        <form name=\"selectListaAdmin\" action=\"generarHTML.php\" method=\"post\">
           <div>
              <?php
                 session_start();
                 echo \"Bienvenido: \". $_SESSION['usuario'];?>
              <br><br>
              Seleccione la tabla a la que desea acceder.
              <br><br>";

    $select_body = "<select name=\"origen\" id=\"origen\">
       <option value=\"usuarios\">Usuarios</option>
       <option value=\"grupos\">Grupos</option>
       <option value=\"incidences\" >Incidencias</option>
       <option value=\"tests\">Pruebas</option>
       <option value=\"status\">Estados</option>
       <option value=\"test_types\" >Tipos de Pruebas</option>
       <option value=\"contracting\">Contratación</option>
       <option value=\"s&b\">Subcontratación y Facturas</option>
       <option value=\"existences\" >Existencias</option>
       <option value=\"fa\" >Inmovilizado</option>
    </select>
    <input type=\"submit\" value=\"Cargar\" name=\"cargar\" onclick=\" >";

    $select_footer = " </div>
  </form>
</center>
</body>
</html>";





?>
