<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT * FROM artistas;";

	$result = $db65 -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>

	
  <?php
	foreach ($artistas as $artista) {
        
		$insert = $db65-> prepare("INSERT INTO usuarios (nombre_usuario, contrasena, tipo) values(?, ?, 'artista');");
		$insert -> execute(array($artista[0],strval(random_int(100000, 999999))));
	}
  ?>


<?php include('../templates/footer.html'); ?>