<?php

	session_start();
	session_unset();
	session_destroy();
	
	echo "<script>";	 
	echo "window.location = '../index.html'";
	echo "</script>";



?>