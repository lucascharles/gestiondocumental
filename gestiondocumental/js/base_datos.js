// JavaScript Document
function grabarRespaldoBD()
{
	var op = "BaseDatos";
	
	var datos = "controlador="+op;
	datos += "&accion=backup_bd";
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
				$("#mensaje").text("La copia de seguridad se realizó con éxito.");	
				mostrarTimer(false);
			}
			else
			{
				$("#mensaje").text("Ha ocurrido un error al realizar la copia de seguridad, reingrese a la opción y vuelva a intentarlo.");	
				mostrarTimer(false);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error.");
			
		}
	});	
}


function salirRespaldoBD()
{
	window.location = 'index.php?controlador=Index&accion=page_default';
}

function exportarExcel()
{
	//mostrarTimer(true);
	//window.location = 'index.php?controlador=BaseDatos&accion=exporta_archivo_excel';
	var op = "BaseDatos";
	
	var datos = "controlador="+op;
	datos += "&accion=exporta_archivo_excel";
	datos += "&id_planta="+$("#id_planta").val();
	mostrarTimer(true);
	
	$.ajax({
		url: "index.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			if($.trim(res) == "")
			{
				$("#mensaje").text("La planilla se generó con éxito.");	
				mostrarTimer(false);
				window.open("views/person/download.php");
			}
			else
			{
				
				$("#mensaje").text("Ha ocurrido un error al generar la planilla, reingrese a la opción y vuelva a intentarlo.");	
				mostrarTimer(false);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error y no se ha podido eliminar el registro.");
			
		}
	});	
}

function exportarBD()
{
	//mostrarTimer(true);
	//window.location = 'index.php?controlador=BaseDatos&accion=exporta_archivo_excel';
	var op = "BaseDatos";
	
	var datos = "controlador="+op;
	datos += "&accion=exportar_bd";
	mostrarTimer(true);
	
	$.ajax({
		url: "index.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			if($.trim(res) == "")
			{
				$("#mensaje").text("La el archivo de base de datos se generó con éxito.");	
				mostrarTimer(false);
				window.open("views/person/download.php?tip=bd");
			}
			else
			{
				
				$("#mensaje").text("Ha ocurrido un error al generar la planilla, reingrese a la opción y vuelva a intentarlo.");	
				mostrarTimer(false);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error.");
			
		}
	});	
}

function importarBD(op)
{
	if(validar('N'))
	{
		setTimeout("document.frm"+op+".action = 'index.php?controlador=BaseDatos&accion=importar_basedatos'",1);
		setTimeout("document.frm"+op+".submit()",10);
	}
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