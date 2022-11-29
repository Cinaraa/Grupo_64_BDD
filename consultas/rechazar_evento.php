<?php session_start(); ?>
<?php
    require("../config/conexion.php");
    include('../templates/header.html');

    if (isset($_GET['nombre_evento'])) {
        $nombre_evento = $_GET['nombre_evento'];
        $productora = $_GET['productora'];
        $pais = $_GET['pais'];
    }

    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artista = str_replace('_', ' ', $nombre_art);

    $query = "UPDATE eventos SET estado = 'rechazado' WHERE lower(nombre_artista) = '$nombre_artista' AND 
    nombre_productora = '$productora' AND nombre_evento = '$nombre_evento';";
    $result = $db65 -> prepare($query);
    $result -> execute();
    $result -> fetchAll();

    $msg = "$nombre_evento-$nombre_artista";
    header("Location: ../index.php?msg=$msg");

?>