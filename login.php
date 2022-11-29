<?php
// Llamar a la función al inicio del script 
session_start();
// Almacenar variables de sesión en array global 
?>
<?php
    require("../config/conexion.php");
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT nombre_usuario, contrasena, tipo FROM usuarios;";
    $result = $db65 -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

    foreach ($usuarios as $usuario) {
        if ($nombre_usuario == $usuario['nombre_usuario'] && $contrasena == $usuario['contrasena']) {
            $_SESSION['nombre_usuario'] = $_POST['nombre_usuario'];
            $_SESSION['contrasena'] = $_POST['contrasena'];
            $_SESSION['tipo'] = $usuario['tipo'];

            $msg = "Sesión iniciada correctamente";
            header("Location: ../index.php?msg=$msg");
            $login = TRUE;
            break;
        } else {
            $login = FALSE;
        }
    }
    if (!$login) {
        $msg = "Usuario o contraseña incorrecta";
        header("Location: ../index.php?msg=$msg");
    }
?>