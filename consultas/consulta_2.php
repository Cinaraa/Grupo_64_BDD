<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT usuarios.nombre_usuario FROM usuarios;";


	$result = $db65 -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>usuarios</th>

    </tr>
  <?php
	foreach ($usuarios as $usuario) {
  		echo "<tr><td>$usuario[0]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>