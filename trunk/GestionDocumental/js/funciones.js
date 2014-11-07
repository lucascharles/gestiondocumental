function resaltar(obj)
{
	if($(obj).attr("class") != "notFilled" && $(obj).attr("class") != "notFilled_medio" && $(obj).attr("class") != "notFilled_min"
 && $(obj).attr("class") != "notFilled_largo")
	{
		if($(obj).attr("class") == "text_area_form")
		{
			$(obj).removeClass('text_area_form');
			$(obj).addClass('resalta_text_area');
		}
		
		if($(obj).attr("class") == "input_form")
		{
			$(obj).removeClass('input_form');
			$(obj).addClass('resalta');
		}
		
		if($(obj).attr("class") == "input_form_medio")
		{
			$(obj).removeClass('input_form_medio');
			$(obj).addClass('resalta_medio');
		}
		
		if($(obj).attr("class") == "input_form_min")
		{
			$(obj).removeClass('input_form_min');
			$(obj).addClass('resalta_min');
		}
		
		if($(obj).attr("class") == "input_form_largo")
		{
			$(obj).removeClass('input_form_largo');
			$(obj).addClass('resalta_largo');
		}
	}
}

function noresaltar(obj)
{
	if($(obj).attr("class") != "notFilled" && $(obj).attr("class") != "notFilled_medio" && $(obj).attr("class") != "notFilled_min" && $(obj).attr("class") != "notFilled_largo")
	{
		if($(obj).attr("class") == "resalta_text_area")
		{
			$(obj).removeClass('resalta_text_area');
			$(obj).addClass('text_area_form');
		}
		
		if($(obj).attr("class") == "resalta")
		{
			$(obj).removeClass('resalta');
			$(obj).addClass('input_form');
		}
		
		if($(obj).attr("class") == "resalta_medio")
		{
			$(obj).removeClass('resalta_medio');
			$(obj).addClass('input_form_medio');
		}
		
		if($(obj).attr("class") == "resalta_min")
		{
			$(obj).removeClass('resalta_min');
			$(obj).addClass('input_form_min');
		}
		
		if($(obj).attr("class") == "resalta_largo")
		{
			$(obj).removeClass('resalta_largo');
			$(obj).addClass('input_form_largo');
		}
	}
}

function overClassBoton(obj)
{
	$(obj).removeClass('boton_form');
	$(obj).addClass('boton_form_brillante');
	
}

function outClassBoton(obj)
{
	$(obj).removeClass('boton_form_brillante');
	$(obj).addClass('boton_form');
}

function resaltarImagen(obj)
{
	$(obj).addClass('brillo');
}

function noresaltarImagen(obj)
{	
	$(obj).removeClass('brillo');
}



function grabarForm(op)
{
	if(validar('N'))
	{
		setTimeout("document.frm"+op+".action = 'index.php?controlador="+op+"&accion=grabar_form'",1);
		setTimeout("document.frm"+op+".submit()",10);
	}
}

function salirForm(op)
{
	if(typeof (document.getElementById("fromformu") ) != "undefined" && document.getElementById("fromformu") != null)
	{
		if($("#fromformu").val() == "S")
		{
  			window.close();
		}
		else
		{
			window.location = 'index.php?controlador='+op+'&accion=admin';
		}
	}
	else
	{
		window.location = 'index.php?controlador='+op+'&accion=admin';
	}
}

function abrirPopUp(id)
{
	$("#"+id).slideDown(1000);	
}

function cerrarPopUp(id)
{
	$("#"+id).slideUp(1000);
}

function borrarFila(id)
{
	$("#fila_"+id).hide("slow");
	$("#fila_sep_"+id).hide("slow");
	
}

//----------------------------
$(document).ready(function()
{
	var arrayInput = document.getElementsByTagName('input');
	
	for(var i=0; i<arrayInput.length; i++)
	{	 
		if(arrayInput[i].getAttribute('tabindex') == "0")
   		{
			arrayInput[i].focus();
			break;
		}
	}
	
	var arraySelect = document.getElementsByTagName('select');
	
	for(var i=0; i<arraySelect.length; i++)
	{	 
		if(arraySelect[i].getAttribute('tabindex') == "0")
   		{
			arraySelect[i].focus();
			break;
		}
	}
	 
	$("form").keypress(function(e) 
	{
		if(window.event)
		{
			key = window.event.keyCode; //IE
		}
		else
		{
			key = e.which; //firefox 
		}
				
		if(key==13)
		{
			return false;
		}
		else
		{
			return true;
		}
	});
});