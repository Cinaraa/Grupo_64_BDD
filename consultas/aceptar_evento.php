<?php
    require("../config/conexion.php");
    include('../templates/header.html');

    if (isset($_GET['nombre_evento'])) {
        $nombre_evento = $_GET['nombre_evento'];
    }

    $query = "SELECT * FROM vuelos WHERE codigo_vuelo = '$codigo_vuelo';";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $vuelos = $result -> fetchAll();
    $vuelo = $vuelos[0];

?>