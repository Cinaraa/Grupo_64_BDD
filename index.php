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

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT pais FROM productoras;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_3.php" method="post">
    Nombre productora:
    <input type="text" name="nombre_productora_elegida">
    <br/>
    Pais productora:
    <select name="pais_productora_elegida">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>
  
  <h3 align="center"> Dada una productora, liste a los artistas con los que ha trabajado dicha productora</h3>

<form align="center" action="consultas/consulta_4.php" method="post">
  Nombre productora:
  <input type="text" name="nombre_productora_elegida">
  <br/>
  Pais productora:
  <input type="text" name="pais_productora_elegida">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

<br>
<br>
<br>
<h3 align="center"> Dado un evento, entregue la suma total de ingresos por ventas de entradas de dicho evento</h3>

<?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT nombre_evento FROM eventos;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_5.php" method="post">
    Nombre evento:
    <select name="nombre_evento_elegido">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>


<h3 align="center"> Liste todos los eventos, junto al numero total de artistas que se presentaran en cada uno</h3>

<form align="center" action="consultas/consulta_6.php" method="post">
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

<br>
<br>
<br>

<h3 align="center"> Muestre el nombre del evento que tiene la mayor cantidad de entradas vendidas</h3>

<form align="center" action="consultas/consulta_7.php" method="post">
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
