<?php	

	session_start();

	$usuario=$_POST['username'];
	$contra=$_POST['contra'];

	$_SESSION['nom']=$usuario;

	$users= [];
	
        $arch=fopen('documents/usuarios.txt','r');
		$var=fread($arch,filesize('documents/usuarios.txt'));
		//echo $var;
		$separacion=explode(";",$var);
	//obtenemos usuarios y contraseñas
		for ($i=0; $i < count($separacion) ; $i++) { 
			$separacion[$i] = explode(',', $separacion[$i]);
			$users[$separacion[$i][0]] = $separacion[$i][1];
		}
	
	echo "<br/>";
	
echo "<br/>";
	if(isset($users[$usuario])){

		if($users[$usuario]==$contra){
					echo'<script type="text/javascript">
					    alert("Usuario y contraseña correctos");
					    window.location.href="perfil.php";
					    </script>';
				
			}else{
					echo'<script type="text/javascript">
					    alert("Usuario existe pero contraseña es incorrecta");
					    window.location.href="../index.html";
					    </script>';
			}	
			
		
	}else{

		echo'<script type="text/javascript">
			alert("El usuario no existe");
			window.location.href="../index.html";
			</script>';
	}


?>