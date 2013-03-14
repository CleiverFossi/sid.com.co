function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}


function llenarDatos(idSelectOrigen)
{
	var selectOrigen=document.getElementById(idSelectOrigen);
	var opcionSeleccionada=selectOrigen.options[selectOrigen.selectedIndex].value;
	if(opcionSeleccionada==0)
	{
	}
	else
	{
		
	
		
		var mensage= "mensage";
		var objetoMensage=document.getElementById(mensage);
		// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax3=nuevoAjax();
		ajax3.open("GET", "procesarMensajeBriday.php?select="+mensage+"&opcion="+opcionSeleccionada, true);
		ajax3.onreadystatechange=function()
		{
			if (ajax3.readyState==1)
			{
			
			}
			if (ajax3.readyState==4)
			{
				objetoMensage.parentNode.innerHTML=ajax3.responseText;
			}
		}
		ajax3.send(null);
	}
}