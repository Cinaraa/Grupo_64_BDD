<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


  $query = "SELECT eventos.id_evento, eventos.nombre_evento, COUNT(acceso.id_entrada) AS entradas_vendidas
  FROM eventos, acceso
  WHERE eventos.id_evento = acceso.id_evento
  GROUP BY eventos.id_evento, eventos.nombre_evento
  ORDER BY entradas_vendidas DESC
  LIMIT 1 ;";


$result = $db -> prepare($query);
$result -> execute();
$eventos = $result -> fetchAll();
?>

<table>
<tr>
  <th>Id</th>
  <th>Evento</th>
  <th>Entradas vendidas</th>
</tr>
<?php
foreach ($eventos as $evento) {
    echo "<tr><td>$evento[0]</td><td>$evento[1]</td><td>$evento[2]</td></tr>";
}
?>
</table>

<?php include('../templates/footer.html'); ?>