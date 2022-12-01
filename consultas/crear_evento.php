<?php session_start(); ?>
<?php include('../templates/header.html'); ?>
<?php require("../config/conexion.php");  ?>


<body>
  <h1 align="center">Crear Evento </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre artistas y sus eventos.</p>

  <br>


  <h3 align="center"> ¿Quieres buscar cuántas entradas de cortesía ha entregado un artista?</h3>

  <form align="center" action="consultas/crear.php" method="post">
    Nombre Evento:
    <input type="text" name="nombre_evento">
    <br/><br/>
    Nombre Recinto:
    <input type="text" name="nombre_recinto">
    <br/><br/>
    Nombre Artista:
    <input type="text" name="nombre_artista">
    <br/><br/>
    Ciudad:
    <input type="text" name="ciudad">
    <br/><br/>
    Fecha de Inicio:
    <input type="text" name="fecha_inicio"> 
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>


  <?php include('../templates/footer.html'); ?>
