<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  $query = "SELECT eventos.id_evento,  eventos.nombre_evento, eventos.productora, COUNT(presenta.id_artista) AS artistas_participando
  FROM eventos, presenta
  WHERE eventos.id_evento = presenta.id_evento
  GROUP BY eventos.nombre_evento, eventos.id_evento
  ORDER BY eventos.nombre_evento;";


$result = $db -> prepare($query);
$result -> execute();
$eventos = $result -> fetchAll();
?>

<table>
<tr>
  <th>Id</th>
  <th>Evento</th>
  <th>Productora</th>
  <th>Artistas participando</th>
</tr>
<?php
foreach ($eventos as $evento) {
    echo "<tr><td>$evento[0]</td><td>$evento[1]</td><td>$evento[2]</td><td>$evento[3]</td></tr>";
}
?>
</table>

<?php include('../templates/footer.html'); ?>