<?php

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

		$usu.=",";
		$contra.=";";
		$campos=$usu.$contra;
		fwrite($arch, $campos);
		fclose($arch);

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