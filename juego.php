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
				<img src="A1.jpg">
				<form method="POST" action="juego.php">
				<input type="hidden" name="palabra" value="'.$palabra.'">
				<input type="hidden" name="casillas" value="">
				<input type="hidden" name="valores" value="">
				<input type="hidden" name="errores" value="0">

				</body>
				<script type="text/javascript">
						window.alert(numCasillas);
						madeCas(numCasillas);
				</script>
				</html>';


}else{
	$letra = strtoupper($letra);

	echo "la palabra es: ".$palabra."<br>";
	echo "la letra es: ".$letra."<br>";
	echo "Casillas es igual a: ".$casillas."<br>";
	echo "valores es igual a :".$valores."<br>";
	
	$numCasillas = strlen($palabra);
	$arrPal = str_split($palabra);
		$coincidencias=0;

	for ($i=0; $i < $numCasillas; $i++) 
	{
		if ($arrPal[$i] == $letra) 
		{
			if ($coincidencias>0 || strlen($valores) != 0 ) {
			$casillas.= ",";
			$valores .= ",";		
			}
			$casillas.= $i;
			$valores .= $letra;
			$coincidencias++;
		}
	}

	if ($coincidencias==0) {
		$alerta= 'window.alert("No hay coincidencias");';
		$errores++;
	}	
	echo "Coincidencias: ".$coincidencias."<br>";
	echo "Casillas es igual a: ".$casillas."<br>";
	echo "valores es igual a :".$valores."<br>";
//enviamos las variables a javascript
	echo "<script>\n";
	echo "var numCasillas = ".$numCasillas.";\n"; 
	echo "var casillas = '".$casillas."';\n"; 
	echo "var coincidencias = ".$coincidencias.";\n"; 
	echo "var valores = '".$valores."';\n"; 	
	echo "var errores = ".$errores.";\n"; 	
	echo "</script>";

	echo '<!DOCTYPE html>
				<html>
				<head>
					<script type="text/javascript" src="funciones.js">
					'.$alerta.'
					</script>
					<link rel="stylesheet" type="text/css" href="estilos.css">
					<title></title>
				</head>
				<body>
				<H1>Bienvenido al juego de Ahorcado</H1>
				<H3 id="error"></H3>
				<img src="A1.jpg">
				<form method="POST" action="juego.php">
				<input type="hidden" name="palabra" value="'.$palabra.'">
				<input type="hidden" name="casillas" value="'.$casillas.'">
				<input type="hidden" name="valores" value="'.$valores.'">
				<input type="hidden" name="errores" value="'.$errores.'">
				</body>
				<script type="text/javascript">
						window.alert(numCasillas);
						madeCas(numCasillas);
						validarLetra(coincidencias,errores,casillas,valores);
				</script>
				</html>';
}



 ?>