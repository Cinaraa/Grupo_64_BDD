<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");
    $nombre_prod = $_SESSION['nombre'];
    $pais = $_SESSION['pais'];
?>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $nombre_evento = '';
  $nombre_evento .= $_POST["nombre_evento"];

  $nombre_recinto = '';
  $nombre_recinto .= $_POST["nombre_recinto"];

  $nombre_artista = '';
  $nombre_artista .= $_POST["nombre_artista"];

  $ciudad = '';
  $ciudad .= $_POST["ciudad"];

  $fecha_inicio = $_POST["fecha_inicio"];
  $fecha_inicio = date($fecha_inicio);
  ?>

	
  <?php

		$insert = $db65-> prepare("INSERT INTO eventos (nombre_evento, nombre_recinto, nombre_artista, ciudad, pais, fecha_inicio, nombre_productora) 
        values(?, ?, ?, ?, ?, ?, ?);");

		$insert -> execute(array($nombre_evento, $nombre_recinto, $nombre_artista, $ciudad, $pais, $fecha_inicio, $nombre_prod ));		


	
  ?>

<?php
    $msg = "Evento creado";
    header("Location: ../index.php?msg=$msg");
?>