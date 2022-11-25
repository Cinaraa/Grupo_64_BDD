<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT tours.nombre_tour FROM tours;";


	$result = $db65 -> prepare($query);
	$result -> execute();
	$tours = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Tour</th>

    </tr>
  <?php
	foreach ($tours as $tour) {
  		echo "<tr><td>$tour[0]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>