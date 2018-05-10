<?php

echo"<DOCTYPE html>
	<html lang='es'>
		<head>
			<meta charset='UTF-8'>
			<title>Ahorcado</title>
		</head>
		<body>
			<h1>Probando obtener las palabras</h1>";
		$arch=fopen('palabras.txt','r');
		$var=fread($arch,filesize('palabras.txt'));
		//echo $var;

		$separacion=explode(" ",$var);
	
		$random=rand(0, 19);

//palabra random seleccionada del archivo
		$opcion=$separacion[$random];
		echo $opcion;
		echo "<br/>";
//tamaño de la palabra anterior
		$tamaño=strlen($opcion);
		echo ''.$tamaño.'<br/>';
//desordenamiento de la palabra seleccionada
		$desordena=str_shuffle($opcion);
		echo ''.$desordena.'<br/>';
//nuevo random para escoger localida de la letra de ayuda	
		$random2=rand(0,$tamaño);

		echo ''.$random2.'<br/>';
//letra de ayuda obtenida con el random anterior y la palabra desordenada		

		$layuda=$desordena[$random2-1];
		echo ''.$layuda.'<br/><br/>';


		for($i=0;$i<$tamaño;$i++){

				
				echo "<br/>";
			if($opcion[$i]!=$layuda){
				$opcion[$i]="___";
				
				echo $opcion[$i];
				echo "<br/>";
				
			}elseif ($opcion[$i]=$layuda) {

				$opcion[$i]=$layuda;
				echo $opcion[$i];			
			}

		}
	
		fclose($arch);




echo		"</body>
	</hmtl>	";	






















?>