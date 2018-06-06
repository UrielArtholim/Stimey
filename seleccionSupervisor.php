<?php
  /*
    PHP File to generate dynamically one HTML table
    Used for showing the last 20 modifications
  */

    $option = $_POST['origen'];

    if(!isset($_SESSION)){session_start();}

    if($_SESSION['grupo'] != 1)
        echo "<script>alert(\'Acceso no autorizado.\'); window.location = \'Index.html\';</script>";

    echo $option;
    switch ($option) {
        case 'revisarSeccion':
            header('Location: seleccionGrupo.php');
            break;

         case 'revisarIncidencias':
            header('Location: revisarIncidencias.php');
            break;
    }
?>