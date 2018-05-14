
<?php

session_start();

echo"<!DOCTYPE html>
	<html lang='es'>
		<head>
			<meta charset='UTF-8'>
			<title>Perfil</title>
			



		</head>

		<style>

			.img-rounded {


				 width:300px;
          		height:300px;
		    -webkit-border-radius: 50%;
		    -moz-border-radius: 50%;
		    border-radius: 50%;
				}




		</style>
		<body>";

		error_reporting(0);
		$users=[];

		$arch=fopen('documents/imasusu.txt','r');
		$var=fread($arch,filesize('documents/imasusu.txt'));
		//echo $var;
		$separacion=explode(";",$var);
		//print_r($separacion);
	//obtenemos usuarios y contraseñas
		for ($i=0; $i < count($separacion) ; $i++) { 
			$separacion[$i] = explode(',', $separacion[$i]);

			$users[$separacion[$i][0]] = $separacion[$i][1];
		}


	if(isset($users[$_SESSION['nom']]))
	{

		
					echo "<img class='img-rounded' src='".$users[$_SESSION['nom']]."' name='efectojs'>";
				
	}else{
					echo'<script type="text/javascript">
					    alert("Tu usuario no tiene imagen!!");
					  </script>';
		}	
			
	

echo"<a href='juego.php'>JUGAR</a>
			
		</body>


	</html>	";
?>	