<?php session_start(); ?>
<?php
    require("../config/conexion.php");
    include('../templates/header.html');

    if (isset($_GET['nombre_evento'])) {
        $nombre_evento = $_GET['nombre_evento'];
        $productora = $_GET['nombre_productora'];
        $pais = $_GET['pais'];
    }

    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artista = str_replace('_', ' ', $nombre_art);
    
    $query_acepto = "UPDATE eventos SET estado = 'aceptado' WHERE lower(nombre_artista) LIKE '$nombre_artista'
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(nombre_evento) LIKE lower('$nombre_evento')
    AND lower(pais) LIKE lower('$pais')
    ;";

    $result_acepto = $db65 -> prepare($query_acepto);
    $result_acepto -> execute();

    $msg = "Evento aceptado";
    #header("Location: ../index.php?msg=$msg");


    #Revisa si todos los eventos estan aceptados y ahi los pone como programado
    $query_programado = "SELECT * FROM eventos WHERE lower(nombre_evento) = lower('$nombre_evento')
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(pais) LIKE lower('$pais');";

    $result_programado = $db65 -> prepare($query_programado);
    $result_programado -> execute();
    $eventos = $result_programado -> fetchAll();

    $query_cont = "SELECT  COUNT(*) FROM eventos WHERE lower(nombre_evento) = lower('$nombre_evento')
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(pais) LIKE lower('$pais');";

    $result_cont = $db65 -> prepare($query_cont);
    $result_cont -> execute();
    $number = $result_cont -> fetchAll();
    ?>

    <?php
    $cont = 0;

    foreach ($eventos as $evento) {
        if ($evento[7] = 'pendiente'){
            break;
        } elseif (intval($number) = $cont) {
            $query_programado1 = "UPDATE eventos SET estado = 'programado' WHERE lower(nombre_evento) = lower('$nombre_evento')
            AND lower(nombre_productora) LIKE lower('$productora') 
            AND lower(pais) LIKE lower('$pais');";
            $result_programado1 = $db65 -> prepare($query_programado1);
            $result_programado1 -> execute();    
        }
        $cont++;
    }

?>

