
//esta funcion hace las casillas de acuerdo al numero de letras de la palabra
//Y tambien añade el espacio para la letra y el boton enviar
function madeCas(num)
		{
				for (var i = 0; i < num; i++) {
				var etiqueta = '<div id="casilla'+num+'" ></div>';	
					document.write(etiqueta);
				}
				document.write('<input type="text" id="letra" name="letra" placeholder="letra">\n<input type="submit" value="Enviar">\n</form> ');
		}