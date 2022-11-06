<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_nuevo = $_POST["nombre_evento_elegido"];


  $query = "SELECT eventos.nombre_evento, SUM(entradas.precio)
  FROM entradas, acceso, eventos
  where entradas.id_entrada = acceso.id_entrada
  AND acceso.id_evento = eventos.id_evento
  AND UPPER(eventos.nombre_evento) LIKE UPPER('%$nombre_nuevo%');";


	$result = $db -> prepare($query);
	$result -> execute();
	$recaudo = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Evento</th>
      <th>Ingresos totales recaudados</th>
    </tr>
  <?php
	foreach ($recaudos as $recaudo) {
        echo "<tr><td>$recaudo[0]</td><td>$recaudo[1]</td></tr>";
  }
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
