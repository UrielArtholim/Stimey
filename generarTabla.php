<?php
  /*
    PHP File to generate dynamically one HTML table
    Used for showing the last 20 modifications
  */

    // Establecemos conexión con la base de datos
    if(!isset($_SESSION)){session_start();}

    $tabla = $_POST['origen'];

  	$user_id = $_SESSION['id'];
    $conexion = mysqli_connect ("localhost", "root", "", "Stimey")
    			or die("Error al conectar a la base de datos");


    $post_header = "<html>
      <head>
        <title>
          POST Request
		    </title>
		    <meta charset=\"UTF-8\">
	   </head>
     ";

     $post_body = "
     <body>
        <form method = \"POST\" action = \"generarHTML.php\">
            <input type = \"hidden\" name = \"tabla\" value = \"$tabla\">
        </form>
    </body>
      ";

      $post_footer = "</html>";

      $post_request = $post_header.$post_body.$post_footer;
      echo $post_request;
      header("Location: generarHTML.php");
?>
