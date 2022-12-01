<?php session_start(); ?>
<?php include('../templates/header.html'); ?>
<?php require("../config/conexion.php");  ?>


<body>
  <h1 align="center">Buscar evento por fecha</h1>
  <br>

  <form align="center" action="buscar.php" method="post">
    Fecha de Inicio:
    <input type="date" name="fecha_inicio">
    <br/><br/>
    Fecha de Término:
    <input type="date" name="fecha_termino">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <br>
<br>
<form action="buscar.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>