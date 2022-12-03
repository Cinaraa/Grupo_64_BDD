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
        <?php if ($_SESSION['tipo'] == 'artista') { ?>
          <ul>
            <li><a herf='#'>Eventos programados</a></li>
            <li><a herf='#'>Pendientes</a></li>
            <li><a herf='#'>Aceptados</a></li>
            <li><a herf='#'>Hospedajes</a></li>
          </ul>
        <?php } ?>
      <?php } ?>
      </img>
    </div>
  </div>
  <div class="columns is-centered">
    <a class="is-underlined has-text-info" href="consultas/importar_usuarios.php">Importar Usuarios</a>
  </div>

  

<?php
// Si no está asignada la variable mostrar form para ingresar 
  if(!isset($_SESSION['nombre_usuario'])){?>

  <h1 align="center">Inicio de sesión </h1>
  <p style="text-align:center;">Aquí podrás iniciar sesión.</p>
  <div>
    <form method="POST" action = 'login.php'>
      <input type="text" name="nombre_usuario" required>
      <input type="password" name="contrasena" required>
      <button type="submit" name="login">Login</button>
    </form> 
  </div>

  <?php } else { ?>

    <h1> Sesión Iniciada </h1>
    <h2 align="center"> Bienvenido <?php echo $_SESSION['nombre_usuario'] ?>! </h2>

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

    <br>
    
    <form align="center" action="logout.php" method="post">
        <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
    </form>

  <?php } ?> 

  <br>
  <br>
  <br>

  <h1 align="center">Buscador informacion de eventos </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre tus eventos favoritos.</p>


  <h3 align="center"> usuarios</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <br>
    <input type="submit" value="Buscar">
  </form>
</body>
</html>