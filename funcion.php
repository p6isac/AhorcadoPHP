<?php


$letra=strtoupper($_POST['letra']);
			
echo $letra;
echo "<br/>";

$palabra=$_POST['palabra'];

echo $palabra;
echo "<br/>";

$ayu=$_POST['ayuda'];
echo ''.$ayu.'<br/>';

function ahorcado($palabra,$ayu,$letra){

					$length=strlen($palabra);

			
					$pp=$palabra;

					$intentos=0;
					$vidas=5;

					if($intentos<$vidas){
								


								$vallet='/['.$letra.']/';
								$letra2=preg_match($vallet,$palabra);

								if($letra2==1){
									echo $vidas;
									echo "<br/>";

									for($a=0;$a<$length;$a++){	
										echo "   ";
									if(($palabra[$a]!=$ayu)&&($palabra[$a]!=$letra)){
										$palabra[$a]="___";
										
										echo $palabra[$a];
										echo "   ";
										
									}else {
											

											echo $palabra[$a];	
											
									}
								}		

									$ayuu=$ayu.$letra;


									
									//$_SESSION['palabras']=$pp;

							echo"<form method='POST' action='ahorcado2.php'>";


							echo"<input type='hidden' name='palabra' value='".$pp."'/>   <br/><br/>";
							echo"<input type='hidden' name='ayuda' value='".$ayuu."'/>   <br/><br/>";
							
							echo"Introduce una letra que creas está entre las faltantes:<br/>";
							echo"					<input type='text' size='1' maxlength='1' name='letra' />";
							echo"					<br/><br/>";
							echo"					<input type='submit' value='Checar'/>";
							echo"</form>";



									
								}else if($letra2==0){	

								echo'<script type="text/javascript">
									alert("Intentalo de nuevo");
									</script>';
										$intentos++;
										$vidas--;
										echo $vidas;
									echo "<br/>";

									for($a=0;$a<$length;$a++){	
										echo "   ";
									if(($palabra[$a]!=$ayu)&&($palabra[$a]!=$letra)){
										$palabra[$a]="___";
										
										echo $palabra[$a];
										echo "   ";
										
									}else {
											echo $palabra[$a];	
									}
								}		


								
									
									//$_SESSION['palabras']=$pp;

							echo"<form method='POST' action='ahorcado2.php'>";


							echo"<input type='hidden' name='palabra' value='".$pp."'/>   <br/><br/>";
							echo"<input type='hidden' name='ayuda' value='".$ayu."'/>   <br/><br/>";
							
							echo"Introduce una letra que creas está entre las faltantes:<br/>";
							echo"					<input type='text' size='1' maxlength='1' name='letra' />";
							echo"					<br/><br/>";
							echo"					<input type='submit' value='Checar'/>";
							echo"</form>";



								}
							
							}
								
					return;


				}


			ahorcado($palabra,$ayu,$letra);


























?>