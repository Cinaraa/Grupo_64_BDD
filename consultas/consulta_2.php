<?php include('../templates/header.html');   ?>

<body>
<?php
  require("../config/conexion.php");

 	$query = "SELECT * FROM usuarios ORDER BY usuarios.nombre_usuario;";


	$result = $db65 -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>

	<table style="margin-left:auto;margin-right:auto;">
    <tr>
	  <th>Id</th>
      <th>Nombre</th>
	  <th>Contrasena</th>
	  <th>Tipo</th>
	  <th>Nombre</th>
	  <th>Pais</th>

    </tr>
  <?php
	foreach ($usuarios as $usuario) {
  		echo "<tr><td>$usuario[0]</td><td>$usuario[1]</td><td>$usuario[2]</td><td>$usuario[3]</td><td>$usuario[4]</td><td>$usuario[5]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>