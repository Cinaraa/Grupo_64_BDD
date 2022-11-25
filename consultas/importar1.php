<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    $query = "SELECT * FROM artistas;";
    $result = $db65 -> prepare($query);
    $result -> execute();
    $artistas = $result -> fetchAll();

    foreach ($artistas as $artista){

        $query = "SELECT proc1_bueno($artista[0]);";

        $result = $db65 -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }
?>