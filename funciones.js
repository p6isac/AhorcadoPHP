
//esta funcion hace las casillas de acuerdo al numero de letras de la palabra
//Y tambien añade el espacio para la letra y el boton enviar
function madeCas(num)
		{
				for (var i = 0; i < num; i++) {
				var etiqueta = '<div id="casilla'+i+'" ></div>';	
					document.write(etiqueta);
				}
				document.write('<input type="text" id="letra" name="letra" placeholder="letra">\n<input type="submit" value="Enviar">\n</form> ');
		}


function validarLetra(coincidencias,errores,casillas,valores)
{
    var donde = casillas.split(",");
	var letras = valores.split(",");

	if(coincidencias > 0 || donde.length != 0)
	{
		console.log(donde);
		console.log(letras);
		for (var i = 0; i < donde.length; i++) {
			document.getElementById('casilla'+donde[i]).innerHTML = letras[i];
		}

	}else if (coincidencias == 0)
	{
		switch(errores)
		{
		case "1":
		document.getElementsByTagName('img').setAttribute('src','A2.jpg');
		break;
		case "2":
		document.getElementsByTagName('img').setAttribute('src','A3.jpg');
		break;
		case "3":
		document.getElementsByTagName('img').setAttribute('src','A4.jpg');
		break;
		case "4":
		document.getElementsByTagName('img').setAttribute('src','A5.jpg');
		break;
		case "5":
		document.getElementsByTagName('img').setAttribute('src','A6.jpg');
		window.alert("Ya perdiste");
		break;
		default:
		console.log("no se validan errores");
		}
	}
}