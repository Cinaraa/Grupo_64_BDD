<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_nuevo = $_POST["nombre_productora_elegida"];
  $pais_nuevo = $_POST["pais_productora_elegida"];

  $query = "SELECT DISTINCT ar.nombre_artistico
  FROM artistas AS ar, productoras AS pd, presenta AS pr, eventos AS e, recintos AS r
  WHERE e.productora = pd.nombre_productora
  AND r.pais = pd.pais
  AND e.recinto = r.nombre_recinto
  AND e.id_evento = pr.id_evento
  AND pr.id_artista = ar.id_artista
  AND UPPER(pd.nombre_productora) LIKE UPPER('%$nombre_nuevo%')
  AND UPPER(p.pais) LIKE UPPER('%$pais_nuevo%');";


	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Id </th>
      <th>Evento</th>
      <th>Recinto</th>
      <th>Inicia</th>
      <th>Termina</th>
      <th>Productora</th>
      <th>Nacionalidad</th>
    </tr>
  <?php
	foreach ($productoras as $productora) {
        echo "<tr><td>$productora[0]</td><td>$productora[1]</td><td>$productora[2]</td><td>$productora[3]</td><td>$productora[4]</td><td>$productora[5]</td><td>$productora[6]</td></tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
