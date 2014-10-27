$(document).ready(function()
{
	//tipoIngreso();
	//documentacionVencida();
	//habilitacionVehiculos();
	//habilitacionContratista();
	//banderaPendientes();
	//banderaActualiza();
});



function banderaActualiza()
{
	var datos = "controlador=Avisos";
	datos += "&accion=bandera_actualiza";
	
				$.ajax({
					url: "index.php",
					type: "GET",
					data: datos,
					cache: false,
					success: function(res)
					{
						if(res == "S")
						{
							$("#bandera_actualiza").show("slow");
						}
					},
					error: function()
					{
						//$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
						//setTimeout("$('#mensaje').text('')",3000);
					}
				});
}

function banderaPendientes()
{
	var datos = "controlador=Avisos";
	datos += "&accion=mostrar_bandera_aviso";
				
				$.ajax({
					url: "index.php",
					type: "GET",
					data: datos,
					cache: false,
					success: function(res)
					{
						if(res == "S")
						{
							$("#bandera_aviso").show("slow");
						}
					},
					error: function()
					{
						//$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
						//setTimeout("$('#mensaje').text('')",3000);
					}
				});
}

function salirSistema()
{
	var datos = "controlador=Index";
	datos += "&accion=logoff";
				
				$.ajax({
					url: "index.php",
					type: "POST",
					data: datos,
					cache: false,
					success: function(res)
					{
						window.location = "index.php";
					},
					error: function()
					{
						$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
						setTimeout("$('#mensaje').text('')",3000);
					}
				});
}

function cambiarClave()
{
	window.location = 'index.php?controlador=Usuario&accion=cambia_clave';
}

function abrirAvisos()
{
	$("#avisos").slideDown("slow");
	document.getElementById("frmlistapendientes").src = "index.php?controlador=Avisos&accion=lista_avisos";
}

function abrirActualizacion()
{
	window.location = 'index.php?controlador=Mantenimiento&accion=actualiza';
}

function correrControles()
{
	window.location = 'index.php?controlador=Habilitacion&accion=controles';
}

function correrBackupBD()
{
	window.location = 'index.php?controlador=BaseDatos&accion=admin';
}

function verAvisoParametrizacion()
{
	window.location = 'index.php?controlador=Avisos&accion=lista_aviso_param';
}
//actualiza00003