<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $nombre_nuevo = $_POST["nombre_evento_elegido"];


  $query = "SELECT eventos.id_evento,  eventos.nombre_evento, eventos.productora, COUNT(presenta.id_artista) AS artistas_participando
  FROM eventos, presenta
  WHERE eventos.id_evento = presenta.id_evento
  GROUP BY eventos.nombre_evento, eventos.id_evento
  ORDER BY eventos.nombre_evento;";


  $result = $db -> prepare($query);
  $result -> execute();
  $entradas = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Ingresos totales recaudados</th>
    </tr>
  <?php
	foreach ($entradas as $entrada) {
        echo "<tr><td>$entrada[0]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>