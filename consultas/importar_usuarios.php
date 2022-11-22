<?php
    require("../config/conexion.php");
    include('../templates/header.html');

    $query = "SELECT existencia_productoras();";
    $result = $db_impar -> prepare($query);
    $result -> execute();
    $result -> fetchAll();

    $query2 = "SELECT existencia_artistas();";
    $result2 = $db_impar -> prepare($query2);
    $result2 -> execute();
    $result2 -> fetchAll();

?>

<?php
    $msg = "Usuarios importados";
    header("Location: ../index.php?msg=$msg");
?>