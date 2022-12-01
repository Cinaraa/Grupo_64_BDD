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
    
    $query_acepto = "UPDATE eventos SET estado = 'aceptado' WHERE lower(nombre_artista) LIKE '$nombre_artista'
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(nombre_evento) LIKE lower('$nombre_evento')
    AND lower(pais) LIKE lower('$pais')
    ;";

    $result_acepto = $db65 -> prepare($query_acepto);
    $result_acepto -> execute();

    #$msg = "Evento aceptado";
    #header("Location: ../index.php?msg=$msg");


    #Revisa si todos los eventos estan aceptados y ahi los pone como programado
    $query_programado = "SELECT * FROM eventos WHERE lower(nombre_evento) LIKE lower('$nombre_evento')
    AND lower(nombre_productora) LIKE lower('$productora') 
    AND lower(pais) LIKE lower('$pais');";

    $result_programado = $db65 -> prepare($query_programado);
    $result_programado -> execute();
    $eventos = $result_programado -> fetchAll();
    ?>


<table>
    <tr>
	  <th>Nombre Evento</th>
      <th>Recinto</th>
	  <th>Ciudad</th>
	  <th>Pais</th>
      <th>Fecha de Inicio</th>
	  <th>Productora</th>
      <th>Estado</th>

    </tr>
  <?php
	foreach ($eventos as $evento) {
  		echo "<tr><td>$evento[0]</td>
        <td>$evento[1]</td>
        <td>$evento[3]</td>
        <td>$evento[4]</td>
        <td>$evento[5]</td>
        <td>$evento[6]</td>
        <td>$evento[7]</td>
        </tr>";
	}
  ?>
	</table>













    <?php
    require("../config/conexion.php");
    $rows = 0;
    foreach ($eventos as $evento) {
        ++$rows;
    }    
    ?>

    <?php
    $cont = 0;
    $que = "no_entra";
    foreach ($eventos as $evento) {
        $cont += 1;
        if ($evento[7] == 'pendiente'){
            $que = "entro mal";
            break;
        } if ($rows = $cont) {
            $query_programado1 = "UPDATE eventos SET estado = 'programado' WHERE lower(nombre_evento) = lower('$nombre_evento')
            AND lower(nombre_productora) LIKE lower('$productora') 
            AND lower(pais) LIKE lower('$pais');";
            $result_programado1 = $db65 -> prepare($query_programado1);
            $result_programado1 -> execute();  
            $que = "entra";
        }
    }
    #$msg = "$rows-$cont-$que";
    #header("Location: ../index.php?msg=$msg");

?>

