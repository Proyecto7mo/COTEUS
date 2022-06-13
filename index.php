<<<<<<< HEAD:index.php
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>COTEUS</title>
	
	<!-- Links CSS -->
	<?php
	  require("partials/LinkCSS.php");
	?>
	
	<!-- Links IMG -->
	<link rel="icon" type="image/svg" href="/img/emblema.svg">
</head>

<body class="body">
	<center>
	<section class="section">
		<center><img src="img/logoAzul.svg" class="Clogo"></center>
		<div id="text_recuad">
			<br>
			<br>
			<br>
			<p>
				Coteus es un gestor de archivos en l&iacute;nea, pensado para ser utilizado
				por grupos de trabajo que manejen documentación digital.
			<p>
				Brind&aacute;ndoles nuestro sitio para agilizar esta tarea y sus labores en general,
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
		<button onclick="window.location.href = 'Login/'" id="logbuttons">Iniciar sesi&oacute;n</button>
		<button onclick="window.location.href = 'Registrarme/'" id="logbuttons">Crear cuenta</button>
		</span>
		</center>
	</section>
	</center>
</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
	<title>COTEUS</title>
	<link rel="stylesheet" type="text/css" href="COTEUS/assets/style_index.css">
	<link rel="icon" type="image/svg" href="COTEUS/Recurses/Coteus_Emblema.svg">
</head>
<body class="body">
	<center >
	<section class="section">
		<center><img src="COTEUS/Recurses/Coteus_Logo_Azul.svg" class="Clogo"></center>
		<div id="text_recuad">
			<br>
			<br>
			<br>
			<p>
				Coteus es un gestor de archivos en l&iacute;nea, pensado para ser utilizado
				por grupos de trabajo que manejen documentación digital.<p>
			<p>
				Brind&aacute;ndoles nuestro sitio para agilizar esta tarea y sus labores en general,
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
		<button id="logbuttons" onclick="Login()">Iniciar sesi&oacute;n</button>
		<button id="logbuttons" onclick="Logon()">Crear cuenta</button>
		</span>
		</center>
		<script type="text/javascript">
			function Login(){
				location.href = "COTEUS/LogIn/LogIn.html";
			}
			function Logon(){
				location.href = "COTEUS/Registrarse/index.php";
			}
		</script>
	</section>
	</center>
</body>
</html>
>>>>>>> 92fad7a9998368220492c22770b5e391a372a910:index.html
