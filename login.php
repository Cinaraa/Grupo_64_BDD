<?php
session_start();
?>
<?php
  require("config/conexion.php");
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT nombre_usuario, contrasena, tipo, nombre, pais FROM usuarios;";
    $result = $db65 -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

    foreach ($usuarios as $usuario) {
        if ($nombre_usuario == $usuario['nombre_usuario'] && $contrasena == $usuario['contrasena']) {
            $_SESSION['nombre_usuario'] = $_POST['nombre_usuario'];
            $_SESSION['contrasena'] = $_POST['contrasena'];
            $_SESSION['tipo'] = $usuario['tipo'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['pais'] = $usuario['pais'];

            $msg = "Sesión iniciada correctamente ";
            header("Location: index.php?msg=$msg");
            $login = TRUE;
            break;
        } else {
            $login = FALSE;
        }
    }
    if (!$login) {
        $msg = "Usuario o contraseña incorrecta";
        header("Location: index.php?msg=$msg");
    }
?>