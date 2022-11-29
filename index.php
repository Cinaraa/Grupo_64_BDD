<?php session_start(); ?>
<?php include('templates/header.html');   ?>


<body>
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

    <h1 align="center">Sesión Iniciada </h1>
    <h2> <?php echo $_SESSION['nombre_usuario'] ?> </h2>

    <?php if ($_SESSION['tipo'] == 'artista') { ?>
        <form align="center" action="consultas/eventos_programados.php" method="post">
            <button type="submit" >Eventos programados</button>
        </form>
        <br>
        <form align="center" action="consultas/eventos_pendientes.php" method="post">
            <button type="submit" >Eventos pendientes</button>
        </form>
        <br>
        <form align="center" action="consultas/hospedajes.php" method="post">
            <button type="submit" >Hospedajes</button>
        </form>
    <?php } ?>

    <form align="center" action="logout.php" method="post">
        <button type="submit" class="btn btn-primary">Cerrar Sesión</button>
    </form>

  <?php } ?> 

  <br>
  <br>
  <br>

  <h3 align="center"> tours</h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <br>
    <input type="submit" value="Buscar">
  </form>

  <h1 align="center">Buscador informacion de eventos </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre tus eventos favoritos.</p>


  <h3 align="center"> usuarios</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <br>
    <input type="submit" value="Buscar">
  </form>
</body>
</html>