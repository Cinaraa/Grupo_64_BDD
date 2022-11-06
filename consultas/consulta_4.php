<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_nuevo = $_POST["nombre_productora_elegida"];
  $pais_nuevo = $_POST["pais_productora_elegida"];


  $query = "SELECT DISTINCT ar.nombre_artistico, pd.nombre_productora, pd.pais
    FROM artistas AS ar, productoras AS pd, presenta AS pr, eventos AS e, recintos AS r
    WHERE e.productora = pd.nombre_productora
    AND r.pais = pd.pais
    AND e.recinto = r.nombre_recinto
    AND e.id_evento = pr.id_evento
    AND pr.id_artista = ar.id_artista
    AND pd.nombre_productora = '%$nombre_nuevo%'
    AND UPPER(pd.pais) LIKE UPPER('%$pais_nuevo%');";


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
