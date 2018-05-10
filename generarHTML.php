<?php

  $table = $_POST['table'];
  $page_name = $_POST["page_name"];
  $page_ext = $_POST["page_ext"];
  $file_name = $page_name.$page_ext;

  $id = $_SESSION['id'];

  $header = "<!DOCTYPE html>
  <html lang=\"es\">
  <head>
  <meta charset=\"utf-8\">
  <title>View</title></head>
  <body>
  <div>
  <center>
  <table border = 1>
  ";


  // CONTENT
  $conexion = mysqli_connect ("localhost", "root", "", "Stimey")
  			or die("Error al conectar a la base de datos");

  $consulta_filas = "SELECT count(*) from " . $table . "' where id='" . $id . "'";
  $result_filas = mysqli_query($conexion, $consulta_filas);
  $row = mysqli_fetch_array($result_filas);
  $filas = $row[1];

  $consulta_columnas = "SELECT Table_Name, count(*) as num from Information_Schema.Columns where Table_Name = '".$tabla."' group by Table_Name";
  $result_columnas = mysqli_query($conexion, $consulta_columnas);
  $row = mysqli_fetch_array($result_columnas);
  $columnas = $row[0];

  $consulta_schema = "SELECT table_name, column_name
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE table_schema = 'YourDBName'
    ORDER BY table_name, ordinal_position";
  $result_schema = mysqli_query($conexion, $consulta_schema);
  $schema = mysqli_fetch_array($result_schema);

  $schema_text = "<tr>
  ";

  for($i = 0; $i < $columnas; ++$i)
  {
    $schema_text = $schema_text."<td>'" . $schema[$i] . "'</td>
    ";
  }
  $schema_text = $schema_text."</tr>";

  echo "Schema text = ".$schema_text;

  $final_header = $header.$schema_text;

  echo "Final header =".$final_header;

  $consulta = "SELECT * from '" . $table . "'";
  $result_data = mysqli_query($conexion, $consulta);


  while($row = mysqli_fetch_array($result_data))
  {
    $data = "<tr>
    ";
    for($i = 0; $i < $columnas; ++$i)
    {
      $data = $data."<td>'" . $row[$i] . "' </td>
      ";
    }
    $data = $data."</tr>";
  }

  echo "Data = ".$data;
  $content = $schema_text.$data;

  echo "Content = ".$content;

  $footer = "</table>
  </center>
  </div>
  </body>
  </html>";

  $htmlpage = $final_header.$content.$footer;

  if(file_exists($file_name))
    $mensaje = "El fichero $file_name ha sido modificado\n";
  else
    $mensaje = "Se ha generado el fichero $file_name \n";

  if($file = fopen($file_name, "a"))
  {
      if(fwrite($file, $htmlpage))
      {
        echo "Se ha ejecutado correctamente\n";
      //  header("Location: $file_name");
    		exit();
      }
      else
        echo "Ha habido un problema al crear el fichero\n";
  }



?>
