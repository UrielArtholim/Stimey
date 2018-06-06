<?php
if(!isset($_SESSION)){session_start();}
$db = mysqli_connect("localhost", "root", "", "Stimey");
if(isset($POST["CorrectRadio"]) && $id == mysqli_query($db, "SELECT id FROM pruebas WHERE supervisor = $_SESSION['id']");){
  $sql = "";
  if($POST["CorrectRadio"] == "Correcto"){
      $sql = "UPDATE pruebas SET status = 4";
      mysqli_query($db, $sql);
    }else{
      $sql = "UPDATE pruebas SET status = 3";
      mysqli_query($db, $sql);
      $fecha = date('Y-m-d H:i:s');
      $motivo = $POST["motivo"];
      $sql = "INSERT INTO incidencias (test,fecha,descripcion) VALUES ('".$id."', '".$fecha."','".$motivo."')";
      mysqli_query($db, $sql);
      header("Location: Supervisar.php");
    }
    //ID incidencia test, fecha, descripcion
}



?>
