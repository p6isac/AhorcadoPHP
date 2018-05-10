<?php  
	$users= [];

        $arch=fopen('usuarios.txt','r');
		$var=fread($arch,filesize('usuarios.txt'));
		//echo $var;

		$separacion=explode(";",$var);
	//obtenemos usuarios y contraseñas
		for ($i=0; $i < count($separacion) ; $i++) { 
			$separacion[$i] = explode(',', $separacion[$i]);
			$users[$separacion[$i][0]] = $separacion[$i][1];
		}
		print_r($users);




?>