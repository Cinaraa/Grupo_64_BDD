<?php session_start(); ?>
<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artista = str_replace('_', ' ', $nombre_art);

 	$query = "SELECT * FROM hospedajes WHERE lower(nombre_artista) = '$nombre_artista';";
	$result = $db65 -> prepare($query);
	$result -> execute();
	$hospedajes = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Lugar</th>
      <th>Hotel</th>
      <th>Fecha de Inicio</th>
	  <th>Fecha de Término</th>
      <th>Código de Reserva</th>
	  <th>Tipo de Traslado</th>
    </tr>
  <?php
	foreach ($hospedajes as $hospedaje) {
  		echo "<tr>
        <td>$hospedaje[4]</td>
        <td>$hospedaje[5]</td>
        <td>$hospedaje[2]</td>
        <td>$hospedaje[3]</td>
        <td>$hospedaje[0]</td>
        <td>$hospedaje[6]</td>
        </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>