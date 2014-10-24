function salirMantenimiento()
{
	window.location = 'index.php?controlador=Index&accion=page_default';
}

function actualizarSistema()
{
	var op = "Mantenimiento";
	
	var datos = "controlador="+op;
	datos += "&accion=descarga_act";
	mostrarTimer(true);
	
	$.ajax({
		url: "index.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			if(res == "")
			{
				// ejecutar archivo
				window.location = "index.php?controlador=Mantenimiento&accion=procesa_act";
			}
			else
			{
				$("#mensaje").text("Ha habido un problema. Por favor reintente la operación.");	
				mostrarTimer(false);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error");
			
		}
	});	
}

function exportarDatosSistema()
{
	var op = "Mantenimiento";
	
	var datos = "controlador="+op;
	datos += "&accion=upload_datos";
	mostrarTimer(true);
	
	$.ajax({
		url: "index.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			if(res == "")
			{
				$("#mensaje").text("Los datos se exportaron con éxito.");	
				mostrarTimer(false);
			}
			else
			{
				$("#mensaje").text(res+"Por favor reintente la operación.");	
				mostrarTimer(false);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error");
			
		}
	});	
}

function ejecutarActSistema()
{
	var datos = "";
	
	mostrarTimer(true);

	$.ajax({
		url: "ajax/actualiza.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			if($.trim(res) == "")
			{
				// ejecutar archivo
				$("#mensaje").text("La actualización se realizó con éxito.");	
				mostrarTimer(false);
			}
			else
			{
				$("#mensaje").text("Ha habido un problema. Por favor reintente la operación.");	
				mostrarTimer(false);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error.");
			
		}
	});	
}


function mostrarTimer(activo)
{
	if(activo)
	{
		$("#espera").slideDown("slow");
	}
	else
	{
		$("#espera").slideUp("slow");
	}
}