<?php
  
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: Home');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>COTEUS</title>
	
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="partials/general/main.css">
  
</head>

<body class="body">
	<center>
	<section class="section">
		<center><img src="img/emblema.svg" class="Clogo"></center>
		<div id="text_recuad">
			<br>
			<br>
			<br>
			<p>
				Coteus es un gestor de archivos en línea, pensado para ser utilizado
				por grupos de trabajo que manejen documentación digital.
			<p>
				Brindándoles nuestro sitio para agilizar esta tarea y sus labores en general,
				ofreciendo otras herramientas junto a los repositorios de archivos que pueden
				ingresar y trabajar junto a sus compañeros.
			</p>
			<br>
			<br>
			<p>Para acceder al sitio es necesario que accedas a una cuenta</p>
		</div>
		<br>
		<br>
		<center>
		<span>
		<button onclick="window.location.href = 'Login/'" id="logbuttons">Iniciar sesión</button>
		<button onclick="window.location.href = 'Registrarme/'" id="logbuttons">Registrarme</button>
		</span>
		</center>
	</section>
	</center>

  <?php
    require("partials/HTML/footer/footer.php");
  ?>
</body>
</html>
