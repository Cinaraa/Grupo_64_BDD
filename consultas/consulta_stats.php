<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $id_nuevo = $_POST["id_elegido"];

 	$query = "SELECT * FROM eventos where id_evento = $id_nuevo;";
	$result = $db -> prepare($query);
	$result -> execute();
	$eventos = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>id_evento</th>
      <th>nombre_evento</th>
      <th>recinto</th>
      <th>fecha_inicio</th>
      <th>fecha_termino</th>
      <th>productora</th>
    </tr>
  <?php
	foreach ($eventos as $evento) {
  		echo "<tr><td>$evento[0]</td><td>$evento[1]</td><td>$evento[2]</td><td>$evento[3]</td><td>$evento[4]</td><td>$evento[5]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
