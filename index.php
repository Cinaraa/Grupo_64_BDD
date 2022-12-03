<?php session_start(); ?>
<head>
  <title>DCCarnaval</title>
  <link rel="stylesheet" href="styles/mystyles.css">
</head>

<body>
  <div class="banner">
    <div class="navbar">
      <img src="styles/logo.png" class="logo">
      <?php if(isset($_SESSION['nombre_usuario'])){?>

        <ul>
        </ul>

      <?php } ?>
      </img>
    </div>
    <div class="content">
      <?php if(!isset($_SESSION['nombre_usuario'])){?>
        <h1>Iniciar Sesion:</h1>
        <p>Aquí podrás iniciar sesión</p>
        <div>
          <form method="POST" action = 'login.php'>
            <p>Nombre de usuario</p><input type="text" name="nombre_usuario" required>
            <p>contraseña</p><input type="password" name="contrasena" required>
            <br>
            <button type="submit" name="login">Login</button>
          </form>
        </div>
        <a class="is-underlined has-text-info" href="consultas/importar_usuarios.php">Importar  Usuarios</a>


        <?php } else { ?>
          <h1> Bienvenido <?php echo $_SESSION['nombre_usuario'] ?>! </h1>

            <?php if ($_SESSION['tipo'] == 'artista') { ?>
              <form align="center" action="consultas/eventos_programados.php" method="post">
                  <button type="submit" >Eventos programados</button>
              </form>
              <br>
              <form align="center" action="consultas/eventos_pendientes.php" method="post">
                  <button type="submit" >Eventos pendientes</button>
              </form>
              <br>
              <form align="center" action="consultas/eventos_aceptados.php" method="post">
                  <button type="submit" >Eventos aceptados</button>
              </form>
              <br>
              <form align="center" action="consultas/hospedajes.php" method="post">
                  <button type="submit" >Hospedajes</button>
              </form>
          <?php } ?>

        <?php if ($_SESSION['tipo'] == 'productora') { ?>
            <form align="center" action="consultas/prod_programados.php" method="post">
                <button type="submit" >Eventos programados</button>
            </form>
            <br>
            <form align="center" action="consultas/prod_pendientes.php" method="post">
                <button type="submit" >Eventos pendientes</button>
            </form>
            <br>
            <form align="center" action="consultas/prod_aceptados.php" method="post">
                <button type="submit" >Eventos aceptados</button>
            </form>
            <br>
            <form align="center" action="consultas/prod_rechazados.php" method="post">
                <button type="submit" >Eventos rechazados</button>
            </form>
            <br>
            <form align="center" action="consultas/buscar_evento.php" method="post">
                <button type="submit" >Buscar evento por fecha</button>
            </form>
            <br>
            <form align="center" action="consultas/crear_evento.php" method="post">
                <button type="submit" >Crear evento</button>
            </form>

          
        <?php } ?>

        



        <form align="center" action="logout.php" method="post">
        <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
        </form>





      <?php } ?>

    </div>
  </div>

 
</body>
</html>