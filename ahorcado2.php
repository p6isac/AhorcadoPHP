<?php

session_start();

if (isset($_SESSION['nom'])){

		if(isset($_POST['letra'])){
			
			include('funcion.php');

		}


	}else{


					echo "<script>";
					echo "alert('Inicia sesion');";  
					echo "window.location = 'index.php'";
					echo "</script>";


	}








?>