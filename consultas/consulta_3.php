<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_nuevo = $_POST["nombre_productora_elegida"];
  $pais_nuevo = $_POST["pais_productora_elegida"];

  $query = "SELECT e.id_evento, e.nombre_evento, e.recinto, e.fecha_inicio, e.fecha_termino, e.productora, p.pais
     FROM productoras AS p, eventos AS e, recintos AS  r
     WHERE e.productora = p.nombre_productora
     AND r.nombre_recinto = e.recinto
     AND r.pais = p.pais
     AND e.fecha_inicio >= ALL (SELECT eventos.fecha_inicio FROM eventos, productoras, recintos WHERE eventos.productora = productoras.nombre_productora AND recintos.nombre_recinto = eventos.recinto AND recintos.pais = productoras.pais AND productoras.id_productora = p.id_productora) AND LOWER(p.nombre_productora) LIKE LOWER('%$nombre_nuevo%') AND LOWER(p.pais) LIKE LOWER('%$pais_nuevo%');";


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
