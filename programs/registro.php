<?php

	session_start();


	$usu=$_POST['username'];
	$contra=$_POST['contra'];
	//Validación de usuario que empieze con mayuscula y que siga con minuscula, ademas de tener una extension de 4 a 10 caracteres, no se aceptan espacios
	$usuario="/^[A-Z]{1}[a-z]{4,10}$/";
  	//Contraseña (mínimo 9 caracteres, con mayúsculas y minúsculas, digitos y  carácter especial)
  	$contrasenia="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*[0-9]){1}(?=.*[#?!@$%^&*-]){1}.{9,}$/";

  	//Coincidencias
  	$valcontra=preg_match($contrasenia,$contra);
  	$valusuario=preg_match($usuario,$usu);
	

  	if(($valusuario==1)&&($valcontra==1)){

		$arch=fopen('documents/usuarios.txt','a');
		$imas=fopen('documents/imasusu.txt','a');



		//Cargar archivo---------------------------------------------------------------------------

	$ruta="../resources/images/";
	//Se concatena la ruta en donde se guardara el archivo con la ruta de la imagen
	$ruta_arch=$ruta.basename($_FILES["archpru"]["name"]);
	//echo $ruta_arch;
	//ESTO SOLO CONVIERTE A MINUSCULAS MI RUTA
	$tipo=strtolower(pathinfo($ruta_arch,PATHINFO_EXTENSION));
	echo "<br/>";
	//ya con el tipo puedo validar
	//echo $tipo;
	echo "<br/>";
	//Para subir ya el archivo al servidor

	if(file_exists($ruta_arch)){
		echo "El archivo ya existe";
		//Y si quiero borrar el archivo
		unlink($ruta_arch);
	}else{	
			if(move_uploaded_file($_FILES["archpru"]["tmp_name"], $ruta_arch)){
				//echo "Archivo cargado";
				//si quiero copiar el archivo
				//$ruta_arch2=$ruta.basename('puma2.'.$tipo);
				//copy($ruta_arch,$ruta_arch2);

				//echo "<img src='".$ruta_arch."' name='efectojs'>";
				

			}else{
				echo "Error en el archivo";
			}

	}		


//Escribiendo en el archivo de usuarios-------------------------------------------------------------------------
		$src=$ruta_arch;
		$src.=";";
		$usu.=",";
		$contra.=";";
		$campos=$usu.$contra;
		
		
		$campos2=$usu.$src;

		$_SESSION['src']=$src;

		fwrite($arch, $campos);
		fwrite($imas, $campos2);

		fclose($arch);
		fclose($imas);

		

		echo'<script type="text/javascript">
					    alert("Usuario registrado");
					    window.location.href="../index.html";
		</script>';


  	}else{

		echo'<script type="text/javascript">
					    alert("Usuario o contraseña incorrectos");
					    window.location.href="../registro.html";
		</script>';

  	}


?>