<?php session_start(); ?>
<?php
    require("../config/conexion.php");
    include('../templates/header.html');

    if (isset($_GET['nombre_evento'])) {
        $nombre_evento = $_GET['nombre_evento'];
        $productora = $_GET['nombre_productora'];
        $pais = $_GET['pais'];
        $fecha = $_GET['fecha'];
    }

    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artista = str_replace('_', ' ', $nombre_art);
    
    $query_rechazo = "UPDATE eventos SET estado = 'rechazado' WHERE lower(nombre_artista) LIKE '$nombre_artista'
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(nombre_evento) LIKE lower('$nombre_evento')
    AND lower(pais) LIKE lower('$pais')
    AND fecha_inicio LIKE '$fecha'
    ;";

    $result_rechazo = $db65 -> prepare($query_rechazo);
    $result_rechazo -> execute();

    $msg = "Evento rechazado";
    header("Location: ../index.php?msg=$msg");

?>



