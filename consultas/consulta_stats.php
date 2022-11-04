<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT productoras.nombre_productora, poductoras.contacto_productora FROM productoras;";
	$result = $db -> prepare($query);
	$result -> execute();
	$productoras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>nombre productora</th>
      <th>contacto productora</th>
    </tr>
  <?php
	foreach ($productoras as $productora) {
  		echo "<tr><td>$productora[0]</td><td>$productora[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
