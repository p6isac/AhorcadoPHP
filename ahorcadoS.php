<?php

session_start();

if (isset($_SESSION['nom'])){

		if(isset($_POST['letra'])){
			

			$letra=$_POST['letra'];
			echo $letra;
			echo "<br/>";

			$palabra=$_POST['palabra'];
			$pp=$palabra;
			echo $palabra;
			echo "<br/>";

			$length=strlen($palabra);

			$ayu=$_POST['ayuda'];
			echo ''.$ayu.'<br/>';
		//Validando si existe la letra en la palabra
			$vallet='/['.$letra.']/';
			$letra2=preg_match($vallet,$palabra);
			
			echo "<br/>";

			$vidas=5;

			if($letra2==1){
						
			
						echo "Vidas:'".$vidas."'";
						echo "<br/>";
							echo "La letra SI esta en la palabra";
							echo "<br/>";
							
							echo "<br/>";
						
						for($a=0;$a<$length;$a++){
						
								echo "   ";
							if(($palabra[$a]!=$ayu)&&($palabra[$a]!=$letra)){
								$palabra[$a]="___";
								
								echo $palabra[$a];
								echo "   ";
								
							}elseif ($palabra[$a]=$ayu) {

								$palabra[$a]=$ayu;
								echo $palabra[$a];	
								echo "   ";		
							}elseif ($palabra[$a]=$letra) {
								 $palabra[$a]=$letra;	
								echo $palabra[$a]; 
								
								
							}

						}		

						echo "<br/></br><br/><br/>";

							echo"<form method='POST' action='ahorcado.php'>";

							echo"<input type='hidden' name='palabra' value='".$pp."'/>   <br/><br/>";
							echo"<input type='hidden' name='ayuda' value='".$ayu."'/>   <br/><br/>";
							
							echo"					Introduce una letra que creas está entre las faltantes:<br/>";
							echo"					<input type='text' size='1' maxlength='1' name='letra' />";
							echo"					<br/><br/>";
							echo"					<input type='submit' value='Checar'/>";
							echo"</form>";

						

				}else if($letra2==0){

						echo "La letra NO esta en la palabra<br/>";
						echo "<br/>";
						$vidas--;

						echo "Vidas:'".$vidas."'";
						echo "<br/>";


						for($a=0;$a<$length;$a++){
						
								echo "   ";
							if(($palabra[$a]!=$ayu)&&($palabra[$a]!=$letra)){
								$palabra[$a]="___";
								
								echo $palabra[$a];
								echo "   ";
								
							}elseif ($palabra[$a]=$ayu) {

								$palabra[$a]=$ayu;
								echo $palabra[$a];	
								echo "   ";		
							}elseif ($palabra[$a]=$letra) {
								 $palabra[$a]=$letra;	
								echo $palabra[$a]; 
								
								
							}

						}		

							echo"<form method='POST' action='ahorcado.php'>";

							echo"<input type='hidden' name='palabra' value='".$pp."'/>   <br/><br/>";
							echo"<input type='hidden' name='ayuda' value='".$ayu."'/>   <br/><br/>";
							
							echo"					Introduce una letra que creas está entre las faltantes:<br/>";
							echo"					<input type='text' size='1' maxlength='1' name='letra' />";
							echo"					<br/><br/>";
							echo"					<input type='submit' value='Checar'/>";
							echo"</form>";

					}




			
			
		}else{

		echo"<DOCTYPE html>
			<html lang='es'>
				<head>
					<meta charset='UTF-8'>
					<title>Ahorcado</title>
				</head>
				<body>
					<h1>Probando obtener las palabras</h1><br/>";
				echo '<h1>Hola'.$_SESSION['nom'].'</h1>';

				$arch=fopen('palabras.txt','r');
				$var=fread($arch,filesize('palabras.txt'));
				//echo $var;

				$separacion=explode(" ",$var);
			
				$random=rand(0, 19);

		//palabra random seleccionada del archivo
				$opcion=$separacion[$random];
				$PAL=$opcion;
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
			
				fclose($arch);

					echo "<br/></br><br/><br/>";

					echo"<form method='POST' action='ahorcado.php'>";
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


		echo		"</body>
			</hmtl>	";	



		}




	}else{


					echo "<script>";
					echo "alert('Inicia sesion');";  
					echo "window.location = 'index.php'";
					echo "</script>";


	}

		





?>