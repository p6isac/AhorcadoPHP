
//esta funcion hace las casillas de acuerdo al numero de letras de la palabra
//Y tambien añade el espacio para la letra y el boton enviar
function madeCas(num)
		{
				for (var i = 0; i < num; i++) {
				var etiqueta = '<div id="casilla'+i+'" ></div>';	
					document.write(etiqueta);
				}
				document.write('<input type="text" id="letra" name="letra" placeholder="letra">\n<input id="enviar" type="submit" value="Enviar">\n</form> ');
				document.write('<button id="salir">SALIR</button>');
				document.getElementById("salir").addEventListener("click", function(){
   				window.location.href="cerrar.php";
   			});
		}


function perdiste(){

		var none=document.getElementById("enviar").setAttribute("disabled","true");

		document.write("<button id='mybtn'>Volver a jugar</button>");
		document.getElementById("mybtn").addEventListener("click", function(){
   			window.location.href="juego.php";
   		});
		return;

}

function ganaste(){

		var none=document.getElementById("enviar").setAttribute("disabled","true");

		document.write("<button id='mybtn'>Volver a jugar</button>");
		document.getElementById("mybtn").addEventListener("click", function(){
   			window.location.href="juego.php";
   		});
		return;


}


function validarLetra(coincidencias,errores,casillas,valores,numCasillas)
{
    var donde = casillas.split(",");
	var letras = valores.split(",");
	console.log(numCasillas);
	console.log(coincidencias);
	console.log(casillas);
	console.log(valores);
	var NT=casillas.length-(numCasillas-1);
	console.log(NT);
	//console.log(letra);

	//
	//console.log(ULTI);

	
		

			if(coincidencias >0 || casillas.length != 0)
			{
				console.log(donde);
				console.log(letras);
				for (var i = 0; i < donde.length; i++) {

				
				
			
					document.getElementById('casilla'+donde[i]).innerHTML = letras[i];

			}
					if(numCasillas==NT){

					alert("Ya ganaste");
					ganaste();
					}

			}

		
			

		
		switch(errores)
		{
		case 1:
		document.getElementsByTagName('img')[0].setAttribute('src','../resources/images/A2.jpg');
		break;
		case 2:
		document.getElementsByTagName('img')[0].setAttribute('src','../resources/images/A3.jpg');
		break;
		case 3:
		document.getElementsByTagName('img')[0].setAttribute('src','../resources/images/A4.jpg');
		break;
		case 4:
		document.getElementsByTagName('img')[0].setAttribute('src','../resources/images/A5.jpg');
		break;
		case 5:
		document.getElementsByTagName('img')[0].setAttribute('src','../resources/images/A6.jpg');
		//window.alert("Ya perdiste");
		perdiste();

		break;

		default:
		}
		if (coincidencias == 0) {
		document.getElementById('error').innerHTML = 'MAL! Error número '+errores;
		}
	
}