<?php

session_start();

if(isset($_SESSION['nom']))
{

			extract($_POST);
			if (!isset($palabra)) //si no existe se hace la palabra y empieza el juego
			{

					$arch = fopen('documents/palabras.txt','r');
					$var = fread($arch,filesize('documents/palabras.txt'));
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
								<script type="text/javascript" src="../js/funciones.js"></script>
								<link rel="stylesheet" type="text/css" href="../css/estilos.css">
								<title></title>
							</head>
							<header>';
						echo		'<H1>Bienvenido '.$_SESSION['nom'].' al juego de Ahorcado</H1>

							</header>
							<body>
						
							<img src="../resources/images/A1.jpg">
							<form method="POST" action="juego.php">
								<input type="hidden" name="palabra" value="'.$palabra.'">
								<input type="hidden" name="casillas" value="">
								<input type="hidden" name="valores" value="">
								<input type="hidden" name="errores" value="0">

							</body>
							<script type="text/javascript">
									madeCas(numCasillas);
							</script>
							</html>';
			}
			else
			{

			 if(ctype_alpha($letra))
				{	
				//que no la haya escrito antes
				if (strpos($valores, $letra) === false)
				{
					//si no ha perdido y no ha ganado,checalo
						if(($errores < 5 && $aciertos < strlen($palabra)))	
						{
							$letra = strtoupper($letra);
							$let=$letra;
						
							
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
								$errores++;
							}	
							 //Despues de validar contamos lo aciertos
							$aciertos = count(explode(",", $valores));

							//si la cantidad de letras acertadas es igual a la cantidad de letras de la palabra 
							if($aciertos == $numCasillas)
							{
							echo"<script>\nwindow.alert('Ya ganaste!');\n</script> ";
							$GameOver="\n ganaste(); \n";
							}
							//si llego a 5 errores
							else if ($errores == 5)
							{

								echo"<script>\nwindow.alert('Ya perdiste!');\n</script> ";
								$GameOver="\n perdiste(); \n";
							}


							
								
						}		
				}
				else
				{
					echo'<script type="text/javascript">
					alert("Ya has escrito esta letra");
					</script>';
				}
			}
			else
			{

				echo'<script type="text/javascript">
					alert("Introduce solo letras");
				</script>';

			}	
		
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
											<script type="text/javascript" src="../js/funciones.js"></script>
										
											<link rel="stylesheet" type="text/css" href="../css/estilos.css">
											<title></title>
										</head>
											<header>';
									echo		'<hgroup>
														<H1>Bienvenido '.$_SESSION['nom'].' al juego de Ahorcado</H1>
												 		<H3 id="error"></H3>	
												 </hgroup>			
										</header>
										<body>
										
										
										<img src="../resources/images/A1.jpg">
										<form method="POST" action="juego.php">
											<input type="hidden" name="palabra" value="'.$palabra.'">
											<input type="hidden" name="casillas" value="'.$casillas.'">
											<input type="hidden" name="valores" value="'.$valores.'">
											<input type="hidden" name="errores" value="'.$errores.'">
											
										

										</body>
										<script type="text/javascript">
												madeCas(numCasillas);
												validarLetra(coincidencias,errores,casillas,valores,numCasillas);
												'.$GameOver.'
										</script>
									</html>';






		}		
			
	}
	else
	{
		echo'<script type="text/javascript">
			alert("Inicia Sesión");
			window.location.href="../index.html";
			</script>';

	}		


 ?>