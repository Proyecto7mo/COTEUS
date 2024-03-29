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
	<link rel="icon" type="image/png" href="img/COTEUS_Emblema_Azul.svg">
	
	<title>COTEUS</title>
	
	<link rel="stylesheet"  type="text/css"  href="styles/main.css">

	<!--<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />-->
    <link rel="stylesheet" href="styles/bootstrap.min.css">
	
</head>

<body class="body">
	<center>
	<div class="section">
		<div class="content">
		<img src="img/COTEUS_Logo_Azul.svg" class="Clogo">
		<div class="text_recuad">
			<p id="firstext">
				Coteus es un gestor de archivos en línea, pensado para ser utilizado
				por grupos de trabajo que manejen documentación digital.
			</p>
			<p>
				Brindándoles nuestro sitio para agilizar esta tarea y sus labores en general,
				ofreciendo otras herramientas junto a los repositorios de archivos que pueden
				ingresar y trabajar junto a sus compañeros.
			</p>
			<br>
			<p>Para acceder al sitio es necesario que accedas a una cuenta</p>
		</div>
		<div class="cbuttons">
		<span>
		<button onclick="window.location.href = 'Login/'" class="logbuttons" id="Loginbutton">Iniciar sesión</button>
		<button onclick="window.location.href = 'Registrarme/'" class="logbuttons" id="Logonbutton">Crear Cuenta</button>
		</span>
		</div>
		</div>
	</div>
	</center>

	<link rel="stylesheet" href="partials/HTML/footer/footer.css">
  <?php
    require("partials/HTML/footer/footer.php");
  ?>

</body>
</html>
