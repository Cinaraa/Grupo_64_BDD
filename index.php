<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Buscador informacion de eventos </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre tus eventos favoritos.</p>

 
  <h3 align="center"> Entregue los nombres y numeros de contacto de todas las productoras de eventos</h3>

  <form align="center" action="consultas/consulta_1.php" method="post">
    <br>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Entregue el nombre de las productoras, junto a la cantidad de eventos que han producido</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">
    <br>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Dado el nombre de una productora, entregue los datos del ultimo evento que ha producido</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Nombre productora:
    <input type="text" name="nombre_productora">
    <br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>
  
  <br>
  <br>
</body>
</html>
