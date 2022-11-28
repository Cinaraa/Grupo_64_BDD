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
		$nombre_usuario_artis = ''
		$nombre_usuario_artis .= $artista[0]
		$nombre_usuario_artis = str_replace(' ', '_', $nombre_usuario_artis);
		$nombre_usuario_artista = strtolower($nombre_usuario_artis);
		$insert -> execute(array($nombre_usuario_artista,strval(random_int(100000, 999999))));
	}
	foreach ($productoras as $productora) {
        
		$insert_2 = $db65-> prepare("INSERT INTO usuarios (nombre_usuario, contrasena, tipo) values(?, ?, 'productora');");
		$nombre_usuario_prod = '';
		$nombre_usuario_prod .= $productora[1];
		$nombre_usuario_prod .= '_';
		$nombre_usuario_prod .= $productora[2];
		$nombre_usuario_prod = str_replace(' . ', '', $nombre_usuario_prod);
		$nombre_usuario_prod = str_replace(' .', '', $nombre_usuario_prod);
		$nombre_usuario_prod = str_replace('. ', '', $nombre_usuario_prod);
		$nombre_usuario_prod = str_replace('.', '', $nombre_usuario_prod);
		$nombre_usuario_prod = str_replace(' ', '_', $nombre_usuario_prod);
		$nombre_usuario_productora = strtolower($nombre_usuario_prod);
		$insert_2 -> execute(array($nombre_usuario_productora,strval(random_int(100000, 999999))));
	}
  ?>

<?php include('../templates/footer.html'); ?>