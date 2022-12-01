<?php session_start(); ?>
<?php include('../templates/header.html'); ?>
<?php require("../config/conexion.php");  ?>


<body>
  <h1 align="center">Crear Evento </h1>
  <br>

  <h3 align="center"> ¿Quieres crear un evento?</h3>

  <form align="center" action="crear.php" method="post">
    Nombre Evento:
    <input type="text" name="nombre_evento" required>
    <br/><br/>
    Nombre Recinto:
    <input type="text" name="nombre_recinto" required>
    <br/><br/>
    Nombre Artista:
    <input type="text" name="nombre_artista" required>
    <br/><br/>
    Ciudad:
    <input type="text" name="ciudad" required>
    <br/><br/>
    Fecha de Inicio:
    <input type="date" name="fecha_inicio" required> 
    <br/><br/>
    <input type="submit" value="Crear">
  </form>

  <br>
  <br>
  <br>


  <?php include('../templates/footer.html'); ?>
