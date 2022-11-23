<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    // Primero obtenemos todos los pokemons de la tabla que queremos agregar
    $query = "SELECT * FROM artistas;";
    $result = $db65 -> prepare($query);
    $result -> execute();
    $artistas = $result -> fetchAll();

    foreach ($artistas as $artista){

        $query = "SELECT proc1($artista[0]);";

        $result = $db65 -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }
?>