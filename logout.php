<?php 
    session_start();
    unset($_SESSION['contrasena']);
    unset($_SESSION['nombre_usuario']);
    unset($_SESSION['tipo']);
    session_destroy();
    header('Refresh: 0; url = ../index.php')
?>