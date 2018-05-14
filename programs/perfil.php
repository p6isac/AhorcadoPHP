
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
	//obtenemos usuarios y contraseñas
		for ($i=0; $i < count($separacion) ; $i++) { 
			$separacion[$i] = explode(',', $separacion[$i]);
			$users[$separacion[$i][0]] = $separacion[$i][1];
		}
	

	if(isset($users[$_SESSION['nom']])){

		if($users[$_SESSION['nom']]==$_SESSION['src']){

					echo "<img src='".$_SESSION['src']."' name='efectojs'>";
				
			}else{
					echo'<script type="text/javascript">
					    alert("Tu usuario no tiene imagen!!");
					  
					    </script>';
			}	
			
		
	}else{

		echo'<script type="text/javascript">
			alert("El usuario no existe");
			window.location.href="../index.html";
			</script>';
	}







echo"
		<a href='juego.php'>JUGAR</a>
			
		</body>


	</html>	";
?>	