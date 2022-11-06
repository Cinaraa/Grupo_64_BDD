<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_nuevo = $_POST["nombre_evento_elegido"];


  $query = "SELECT SUM(entradas.precio)
  FROM entradas, acceso, eventos
  where entradas.id_entrada = acceso.id_entrada
  AND acceso.id_evento = eventos.id_evento
  AND UPPER(eventos.nombre_evento) LIKE UPPER('%$nombre_nuevo%');";


	$result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Artistas</th>
      <th>Productora</th>
      <th>Pais productora</th>
    </tr>
  <?php
	foreach ($artistas as $artista) {
        echo "<tr><td>$artista[0]</td><td>$artista[1]</td><td>$artista[2]</td></tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
