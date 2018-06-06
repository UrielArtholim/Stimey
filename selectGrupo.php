<?php

    $option = $_POST['origen'];
    echo $option;
    if(!isset($_SESSION)){session_start();}
    $grupo = $_SESSION['grupo'];

    switch ($option) {
        case 'contratacion':
            // //Contratacion
            header('Location: Contrataciones/Contrataciones.php');
            break;

            case 'subcontratacion':
                // //Contratacion
                header('Location: Subcontrataciones/index.php');
                break;

                case 'existencias':
                    // //Contratacion
                    header('Location: contratacion.html');
                    break;

                    case 'inmovilizado':
                        // //Contratacion
                    header('Location: Inmovilizado/menuSupervisar.php');
                    break;
    }
?>
