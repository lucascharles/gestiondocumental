function mostrarListado(form)
{
	document.frmlistado.filtrar.value = 1;	
	document.frmlistado.submit();
}

function imprimirHtml()
{
	window.print();
}

function imprimirExcel()
{
	window.open("views/person/exportar_a_excel.php");
}

function imprimirPdf()
{
	window.open("index.php?controlador=Informes&accion=get_trabajdores_pdf");
}

function habilitarDescarga(obj)
{
	if($.trim($(obj).val()) != "")
	{
		$("#content_descarga").show("slow");
	}
	else
	{
		$("#content_descarga").hide("slow");
	}
}

function descargarDocumentos()
{
	
	var datos = "controlador=Informes&accion=bajar_trabajdores_pdf&id="+$("#id_tipodocumento").val();
	datos += "&lotes="+$("#lotes").val();
	
				$.ajax({
					url: "index.php",
					type: "GET",
					data: datos,
					cache: false,
					success: function(res)
					{
						window.open("index.php?controlador=Informes&accion=mostrar_descarga");
					},
					error: function()
					{
						//$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
						//setTimeout("$('#mensaje').text('')",3000);
					}
				});
	
}