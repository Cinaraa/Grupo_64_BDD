<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artis = str_replace('_', ' ', $nombre_art);
    $nombre_artista = ucwords($nombre_artis);

 	$query = "SELECT * FROM eventos WHERE nombre_artista = $nombre_artista AND estado = 'pendiente';";
	$result = $db65 -> prepare($query);
	$result -> execute();
	$eventos = $result -> fetchAll();
  ?>

	<table>
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
  		echo "<tr><td>$evento[0]</td><td>$evento[1]</td><td>$evento[3]</td><td>$evento[4]</td><td>$evento[5]</td><td>$evento[6]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>