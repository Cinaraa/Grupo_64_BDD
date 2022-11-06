<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_prod = $_POST["productora_elegida"];

  $query = "SELECT DISTINCT ar.nombre_artistico
    FROM artistas AS ar, productoras AS pd, presenta AS pr, eventos AS e, recintos AS r
    WHERE e.productora = pd.nombre_productora
    AND r.pais = pd.pais
    AND e.recinto = r.nombre_recinto
    AND e.id_evento = pr.id_evento
    AND pr.id_artista = ar.id_artista
    AND UPPER(pd.nombre_productora) LIKE UPPER('%$nombre_prod%');";


	$result = $db -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Artistas </th>
    </tr>
  <?php
	foreach ($artistas as $artista) {
        echo "<tr><td>$artista[0]</td></tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
