
<?php

session_start();

echo"<!DOCTYPE html>
	<html lang='es'>
		<head>
			<meta charset='UTF-8'>
			<title>Perfil</title>
		</head>
		<body>";

		$users=[];

		$arch=fopen('documents/imasusu.txt','r');
		$var=fread($arch,filesize('documents/imasusu.txt'));
		//echo $var;
		$separacion=explode(";",$var);
	//obtenemos usuarios y urls
		for ($i=0; $i < count($separacion) ; $i++) { 
			$separacion[$i] = explode(',', $separacion[$i]);
			$users[$separacion[$i][0]] = $separacion[$i][1];
		}
		//print_r($users);
		//imprime asi:
		// [usuario]=> urlImagen;

	if(isset($users[$_SESSION['nom']]))
	{

		

					echo "<img src='".$users[$_SESSION['nom']]."' name='efectojs'>";
				
			
			
		
	}else{

	
					echo'<script type="text/javascript">
					    alert("Tu usuario no tiene imagen!!");
					  
					    </script>';
	}







echo"
		<a href='juego.php'>JUGAR</a>
			
		</body>


	</html>	";
?>	