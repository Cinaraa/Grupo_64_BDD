<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  require("../config/conexion.php");


    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artista = str_replace('_', ' ', $nombre_art);

 	$query = "SELECT * FROM eventos WHERE lower(nombre_artista) = '$nombre_artista' AND estado = 'aceptado';";
	$result = $db65 -> prepare($query);
	$result -> execute();
	$eventos = $result -> fetchAll();
  ?>
<h2> Eventos aceptados de <?php  echo $nombre_art ?> </h2>
<br>
	<table style="margin-left:auto;margin-right:auto;">
    <tr>
	  <th>Nombre Evento</th>
      <th>Recinto</th>
	  <th>Ciudad</th>
	  <th>Pais</th>
      <th>Fecha de Inicio</th>
	  <th>Productora</th>

    </tr>
  <?php
	foreach ($eventos as $evento) {
  		echo "<tr><td>$evento[0]</td>
        <td>$evento[1]</td>
        <td>$evento[3]</td>
        <td>$evento[4]</td>
        <td>$evento[5]</td>
        <td>$evento[6]</td>
        </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>