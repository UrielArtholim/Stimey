<?php
  /*
    PHP File to generate dynamically one HTML table
    Used for showing the last 20 modifications
  */

    // Establecemos conexión con la base de datos
    if(!isset($_SESSION)){session_start();}

    //$user_id = $_SESSION['id'];
    //$user_group = $_SESSION['group'];

    

    $conexion = mysqli_connect ("localhost", "root", "", "Stimey")
    			or die("Error al conectar a la base de datos");


    // Buscamos el identificador del grupo al que pertenece el usuario
    $consulta = "SELECT group_id from usuarios where id = '".$user_id."'";
    $result = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($result);
    $group = $row[0];

    // Comprobamos que el resultado es correcto
    if($group == 6)
    {
        header("Location: generarListaAdmin.php");
        exit();
    }

    else
    {
        // Buscamos la tabla del grupo al que pertenece el usuario
        $consulta = "SELECT tabla from grupos where id = '".$group."'";
        $result = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($result);
        $tabla = $row[0];

        // Comprobamos que el resultado es correcto
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
    }

?>
