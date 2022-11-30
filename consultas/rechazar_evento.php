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
    $nombre_productora = str_replace('%20', ' ', $productora);

    $query_rechazo = "UPDATE eventos SET estado = 'rechazado' WHERE lower(nombre_artista) LIKE 'abba';"; 
    
    #AND lower(nombre_productora) LIKE lower($nombre_productora) AND lower(nombre_evento) LIKE lower($nombre_evento);";

    $result_rechazo = $db65 -> prepare($query_rechazo);
    $result_rechazo -> execute();

    #$msg = "$nombre_evento-$nombre_artista-$productora-$pais";
    $msg = "$nombre_artista";
    header("Location: ../index.php?msg=$msg");

?>