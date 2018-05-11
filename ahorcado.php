<?php

session_start();

if (isset($_SESSION['nom'])){

		echo"<DOCTYPE html>
			<html lang='es'>
				<head>
					<meta charset='UTF-8'>
					<title>Ahorcado</title>
				</head>
				<body>
					<h1>JUEGO DEL AHORCADO</h1><br/>";
				echo '<h1>Hola '.$_SESSION['nom'].'</h1>';

				$arch=fopen('palabras.txt','r');
				$var=fread($arch,filesize('palabras.txt'));
				//echo $var;

				$separacion=explode(" ",$var);
			
				$random=rand(0, 19);

		//palabra random seleccionada del archivo
				$opcion=$separacion[$random];
				$PAL=$opcion;
				//echo $opcion;
				echo "<br/>";
		//tamaño de la palabra anterior
				$tamaño=strlen($opcion);
				//echo ''.$tamaño.'<br/>';
		//desordenamiento de la palabra seleccionada
				$desordena=str_shuffle($opcion);
				//echo ''.$desordena.'<br/>';
		//nuevo random para escoger localida de la letra de ayuda	
				$random2=rand(0,$tamaño);

				//echo ''.$random2.'<br/>';
		//letra de ayuda obtenida con el random anterior y la palabra desordenada		

				$layuda=$desordena[$random2-1];
				//echo ''.$layuda.'<br/><br/>';


				for($i=0;$i<$tamaño;$i++){
				
						echo "   ";
					if($opcion[$i]!=$layuda){
						$opcion[$i]="___";
						
						echo $opcion[$i];
						echo "   ";
						
					}elseif ($opcion[$i]=$layuda) {

						$opcion[$i]=$layuda;
						echo $opcion[$i];			
					}

				}
			
				

					echo "<br/></br><br/><br/>";

					echo"<form method='POST' action='ahorcado2.php'>";
					echo"<input type='hidden' name='palabra' value='".$PAL."'/>   <br/><br/>";
					echo"<input type='hidden' name='ayuda' value='".$layuda."'/>   <br/><br/>";
					
					echo"					Introduce una letra que creas está entre las faltantes:<br/>";
					echo"					<input type='text' size='1' maxlength='1' name='letra' />";
					echo"					<br/><br/>";
					echo"					<input type='submit' value='Checar'/>";
					echo"</form>";

					echo	"	
					<form action='cerrar.php'>
						<button type='submit' value='Cerrar'>Cerrar</button>
					</form>	";

					fclose($arch);
		echo		"</body>

			</hmtl>	";	



		}else{


					echo "<script>";
					echo "alert('Inicia sesion');";  
					echo "window.location = 'index.php'";
					echo "</script>";


	}

		





?>