<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT * FROM artistas;";

	$result = $db65 -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();

	$query_2 = "SELECT * FROM productoras;";

	$result_2 = $db64 -> prepare($query_2);
	$result_2 -> execute();
	$productoras = $result_2 -> fetchAll();
  ?>

	
  <?php
	foreach ($artistas as $artista) {
        
		$insert = $db65-> prepare("INSERT INTO usuarios (nombre_usuario, contrasena, tipo) values(?, ?, 'artista');");
		$insert -> execute(array($artista[0],strval(random_int(100000, 999999))));
	}
	foreach ($productoras as $productora) {
        
		$insert_2 = $db65-> prepare("INSERT INTO usuarios (nombre_usuario, contrasena, tipo) values(?, ?, 'productora');");
		nombre_usuario_prod = $productora[1]+'_'+$productora[2]
		$insert_2 -> execute(array(nombre_usuario_prod,strval(random_int(100000, 999999))));
	}
  ?>

<?php include('../templates/footer.html'); ?>