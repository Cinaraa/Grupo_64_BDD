<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT productoras.nombre_productora, productoras.pais,  COUNT(eventos.id_evento) AS cantidad_eventos
     FROM recintos
     JOIN eventos
     ON recintos.nombre_recinto = eventos.recinto
     RIGHT OUTER JOIN productoras
     ON eventos.productora = productoras.nombre_productora
     AND recintos.pais = productoras.pais
     GROUP BY productoras.nombre_productora, productoras.pais
     ORDER BY productoras.nombre_productora;";


	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Productora</th>
      <th>Nacionalidad</th>
      <th>Eventos producidos</th>
    </tr>
  <?php
	foreach ($productoras as $productora) {
        echo "<tr><td>$productora[0]</td><td>$productora[1]</td><td>$productora[2]</td></tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
