<!DOCTYPE html>
<html>
<head>
	<title>calculadora</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="calculadora.php>" method="post">
		<input type="text" name="formula">Ingrese formula</input>
		<br>
		<input type="text" name="A"></input>
		<input type="text" name="B"></input>
		<input type="submit" value="enviar"></input>
	</form>
	<?php
		$conec=mysqli_connect("localhost","root","","user");
		$a=$_REQUEST
	?>
</body>
</html>