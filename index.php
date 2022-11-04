<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Buscador informacion de eventos </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre tus eventos favoritos.</p>

 
  <h3 align="center"> ¿Quieres buscar un evento por su ID?</h3>

  <form align="center" action="consultas/consulta_stats.php" method="post">
    id_evento:
    <input type="text" name="id_elegido">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>
  <br>
  <br>
</body>
</html>
