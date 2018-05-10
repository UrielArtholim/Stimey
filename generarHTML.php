<?php

  $header = $_POST['header'];
  $content =  $_POST['content'];
  $footer = $_POST['footer'];
  $page_name = $_POST["page_name"];
  $page_ext = $_POST["page_ext"];
  $file_name = $page_name.$page_ext;


  $header = "<!DOCTYPE html>
  <html lang=\"es\">
  <head>
  <meta charset=\"utf-8\">
  <title>View</title></head>
  <body>
  <div>
  <center>
  ";

  $content = "<img src=\"./LogoStimey.jpg\" alt=\"Logo Stimey\"/>
  <form method=\"POST\" action=\"validar.php\">
  <input type=\"text\" name=\"nnombre\" placeholder=\"Usuario\" />
  <br />
  <input type=\"password\" name=\"npassword\" placeholder=\"Contraseña\" />
  <br />
  <button type=\"submit\">Iniciar Sesion</button>";

  $footer = "</form>
  </center>
  </div>
  </body>
  </html>";

  $htmlpage = $header.$content.$footer;

  if(file_exists($file_name))
    $mensaje = "El fichero $file_name ha sido modificado\n";
  else
    $mensaje = "Se ha generado el fichero $file_name \n";

  if($file = fopen($file_name, "a"))
  {
      if(fwrite($file, $htmlpage))
      {
        echo "Se ha ejecutado correctamente\n";
        header("Location: $file_name");
    		exit();
      }
      else
        echo "Ha habido un problema al crear el fichero\n";
  }



?>
