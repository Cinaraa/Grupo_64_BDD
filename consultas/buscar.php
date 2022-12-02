<?php session_start();
include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion.php");
    $nombre_prod = $_SESSION['nombre'];
    $pais = $_SESSION['pais'];
?>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  $f_inicio = $_POST["fecha_inicio"];
  $f_inicio = date($f_inicio);

  $f_termino = $_POST["fecha_termino"];
  $f_termino = date($f_termino);
  ?>

<?php
    $query = "SELECT * FROM eventos WHERE nombre_productora = '$nombre_prod' AND
    fecha_inicio >= '$f_inicio' AND
    fecha_inicio <= '$f_termino';";
	$result = $db65 -> prepare($query);
	$result -> execute();
	$eventos = $result -> fetchAll();
  ?>

<table align="center">
    <tr>
	  <th>Nombre Evento</th>
    <th>Nombre Artista</th>
    <th>Recinto</th>
	  <th>Ciudad</th>
	  <th>Pais</th>
    <th>Fecha de Inicio</th>
	  

    </tr>
  <?php
	foreach ($eventos as $evento) {
  		echo "<tr>
        <td>$evento[0]</td>
        <td>$evento[1]</td>
        <td>$evento[2]</td>
        <td>$evento[3]</td>
        <td>$evento[4]</td>
        <td>$evento[5]</td>        
        </tr>";
	}
  ?>
	</table>

  <br>
<form action="buscar_evento.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>