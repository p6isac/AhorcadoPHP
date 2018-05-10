<?php
extract($_POST);
if (!isset($palabra)) {

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
				<input type="hidden" name="casillas" value="">
				<input type="hidden" name="valores" value="">
				</body>
				<script type="text/javascript">
						window.alert(numCasillas);
						madeCas(numCasillas);
				</script>
				</html>';


}else{

	echo "la palabra es: ".$palabra."<br>";
	echo "la letra es: ".$letra."<br>";
	echo "Casillas es igual a: ".$casillas."<br>";
	echo "valores es igual a :".$valores."<br>";
	
	$numCasillas = strlen($palabra);
	$arrPal = str_split($palabra);

	for ($i=0; $i < $numCasillas; $i++) 
	{

		if ($arrPal[$i] == $letra) {
			$casillas.= $i.",";
			$valores.=$letra.",";
		}
	}

	echo "Casillas es igual a: ".$casillas."<br>";
	echo "valores es igual a :".$valores."<br>";



}



 ?>