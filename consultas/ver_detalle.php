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

    <table>
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
            $exists = [$tour[0], $tour[1], $tour[2], $tour[3]];
            break;
        } 
    }?>

    <table>
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
 

<form action="eventos_programados.php" method="get">
    <input type="submit" value="Volver">
</form>
</body>

</html>