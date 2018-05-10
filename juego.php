<?php 
if (!isset($palabra)) {
	echo "no existe palabra";
		$arch = fopen('palabras.txt','r');
		$var = fread($arch,filesize('palabras.txt'));
		//separa las palabras en un arreglo
		$texto = explode(" ",$var);

		$numPalabras = count($texto);	
		//un numero al azar
		$random = rand(0, $numPalabras-1);
		$palabra = $texto[$random];
		$numCasillas = strlen($palabra);
		
		//pasamos la variable a javascript
		echo "<script>\n";
		echo "var numCasillas = ".$numCasillas.";"; 
		echo "</script>";
		//se muestra el primer contacto con el juego
		echo '<!DOCTYPE html>
				<html>
				<head>
					<script type="text/javascript" src="funciones.js"></script>
					<link rel="stylesheet" type="text/css" href="estilos.css">
					<title></title>
				</head>
				<body>
				<H1>Bienvenido al juego de Ahorcado</H1>
				<img src="vivo.png">
				<form method="POST" action="juego.php">
				<input type="hidden" name="palabra" value="'.$palabra.'">
				<input type="hidden" name="Casillas" value="">
				<input type="hidden" name="valores" value="">
				</body>
				<script type="text/javascript">
						window.alert(numCasillas);
						madeCas(numCasillas);
				</script>
				</html>';


}else{



}



 ?>