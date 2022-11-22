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

        // Luego construimos las querys con nuestro procedimiento almacenado para ir agregando esas tuplas a nuestra bdd objetivo
        // Hacemos una verificacion para ver si el pokemon es legendario porque ese parámetro no se comporta muy bien entre php y sql
        // asi que lo agregamos manualmente al final (por eso los FALSE o TRUE)
        
        $query = "SELECT proc1($artista[0]);";
    }
?>