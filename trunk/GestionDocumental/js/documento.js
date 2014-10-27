function cargarDocumento(id)
{
	
	window.location = "index.php?controlador=Documento&accion=carga&id_tipo_documento="+id+"&id_faena="+$("#id_faena").val();
	/*
	alert(document.frmcargadoc.action);
	document.frmcargadoc.submit();
	*/
}
function grabarFormUploadArch(id)
{
	if(validar('N'))
	{
		if($.trim($("#archivo").val()) == "" || $.trim($("#doctNombreArchivo").val()) == "") return false;
		setTimeout("document.frmcargadoc.action = 'index.php?controlador=Documento&accion=grabasubir_archivo&id_tipo_documeto="+id+"'",1);
		setTimeout("document.frmcargadoc.submit()",10);
	}
}

