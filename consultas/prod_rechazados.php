<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  require("../config/conexion.php");

    $nombre_prod = $_SESSION['nombre'];
    $pais_prod = $_SESSION['pais'];

 	$query = "SELECT * FROM eventos WHERE nombre_productora = '$nombre_prod' AND pais = '$pais_prod' 
  AND estado = 'rechazados' ORDER BY fecha_inicio;";
	$result = $db65 -> prepare($query);
	$result -> execute();
	$eventos = $result -> fetchAll();
  ?>

<h2> Eventos rechazados de <?php  echo $nombre_prod ?> </h2>
<br>
	<table align="center">
    <tr>
	  <th>Nombre Evento</th>
    <th>Recinto</th>
    <th>Nombre Artista</th>
	  <th>Ciudad</th>
	  <th>Pais</th>
    <th>Fecha de Inicio</th>
	  

    </tr>
  <?php
	foreach ($eventos as $evento) {
  		echo "<tr>
        <td>$evento[0]</td>
        <td>$evento[1]</td>
        <td>$evento[2]</td>
        <td>$evento[3]</td>
        <td>$evento[4]</td>
        <td>$evento[5]</td>        
        </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>