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
        
		$insert = $db65-> prepare("INSERT INTO $db65.usuarios (nombre_usuario, contrasena, tipo) values(?, ?, 'artista');");
		$insert -> execute(array($artista.nombre_artista,floor(random()*999999-100000+1)+100000));
	}
  ?>


<?php include('../templates/footer.html'); ?>