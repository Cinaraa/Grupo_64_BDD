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
    $nombre_productora = str_replace('%20', ' ', $productora);

    $query_rechazo = "UPDATE eventos SET estado = 'rechazado' WHERE lower(nombre_artista) LIKE lower($nombre_artista);"; 
    
    #AND lower(nombre_productora) LIKE lower($nombre_productora) AND lower(nombre_evento) LIKE lower($nombre_evento);";

    $result_rechazo = $db65 -> prepare($query_rechazo);
    $result_rechazo -> execute();
    ?>

    <body>
    <?php
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
        require("../config/conexion.php");

        
        $rechazados = $result_rechazo -> fetchAll();
    ?>

        <table>
        <tr>
        <th>Tour</th>

        </tr>
    <?php
        
            echo "<tr><td>lower($nombre_artista)</td></tr>";
        
    ?>
        </table>

    <?php
    #$msg = "$nombre_evento-$nombre_artista-$productora-$pais";
    $msg = "";
    #header("Location: ../index.php?msg=$msg");

?>



