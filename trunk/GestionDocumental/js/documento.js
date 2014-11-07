function grabarFormUploadArch(id)
{
	if(validar('N'))
	{
		if($.trim($("#archivo").val()) == "" || $.trim($("#doctNombreArchivo").val()) == "") return false;
		setTimeout("document.frmcargadoc.action = 'index.php?controlador=DashBoard&accion=grabasubir_archivo'",1);
		setTimeout("document.frmcargadoc.submit()",10);
	}
}

function volverDocContratista(op,id)
{
	window.location = "index.php?controlador="+op+"&accion=verDetalle&id="+id;
}