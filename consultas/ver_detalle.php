<?php session_start(); ?>
<?php
    require("../config/conexion.php");
    include('../templates/header.html');

    if (isset($_GET['nombre_evento'])) {
        $nombre_evento = $_GET['nombre_evento'];
        $productora = $_GET['nombre_productora'];
        $pais = $_GET['pais'];
    }

    $nombre_art = $_SESSION['nombre_usuario'];
    $nombre_artista = str_replace('_', ' ', $nombre_art);
    
    
    $query = "SELECT nombre_artista FROM eventos WHERE lower(nombre_evento) LIKE lower('$nombre_evento')
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(pais) LIKE lower('$pais');";
    $result = $db65 -> prepare($query);
    $result -> execute();
    $artistas = $result -> fetchAll();
    ?>

<h2> Evento: <?php  echo $nombre_evento ?> </h2>

    <table style="margin-left:auto;margin-right:auto;">
    <tr>
	  <th>Artistas invitados</th>
    </tr>

    <?php
	foreach ($artistas as $artista) {
  		echo "<tr><td>$artista[0]</td>
        </tr>";
	}
  ?>
	</table>

    <?php
    $query1 = "SELECT * FROM tours;";
    $result1 = $db65 -> prepare($query1);
    $result1 -> execute();
    $tours = $result1 -> fetchAll();
    ?>

    <?php

    $exists = [['-','-','-','-']];
    foreach ($tours as $tour) {
        if ($tour[0] == $nombre_evento){
            $exists = [[$tour['nombre_tour'], $tour['fecha_inicio'], $tour['fecha_termino'], $tour['nombre_artista']]];
        } 
    }?>
<br>
<br>
    <table style="margin-left:auto;margin-right:auto;">
    <tr>
    <th>Nombre Tour</th>
    <th>Fecha inicio</th>
    <th>Fecha termino</th>
    <th>Nombre artista</th>
    </tr>

    <?php
    foreach ($exists as $exist) {
        echo "<tr><td>$exist[0]</td><td>$exist[1]</td><td>$exist[2]</td><td>$exist[3]</td>
        </tr>";
	}
    ?>
    </table> 
<br>
<br>

<?php 
    $query3 = "SELECT * FROM entradas WHERE lower(nombre_evento) LIKE lower('$nombre_evento') ORDER BY categoria;";
    $result = $db64 -> prepare($query3);
    $result -> execute();
    $entradas = $result -> fetchAll();
    ?>

<table style="margin-left:auto;margin-right:auto;">
    <tr>
    <th colspan="3">Entradas de Cortes??a</th>
    </tr>
    <tr>
    <th>Categor??a</th>
    <th>N??mero de asiento</th>
    <th>Tipo</th>
    </tr>

    <?php
    foreach ($entradas as $entrada) {
        echo "<tr><td>$exist[2]</td><td>$exist[4]</td><td>$exist[5]</td></tr>";
	}
    ?>
</table>
<br>
<br>
<br>


<form action="eventos_programados.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>