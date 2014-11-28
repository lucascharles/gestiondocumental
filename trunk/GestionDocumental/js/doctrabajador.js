$(document).ready(function() 
{
	mostrar();
});


function grabarFormUploadArch(id)
{
	if(validar('N'))
	{
		if($.trim($("#archivo").val()) == "" || $.trim($("#doctNombreArchivo").val()) == "") return false;
		setTimeout("document.frmcargadoc.action = 'index.php?controlador=TrabajadoresControl&accion=grabasubir_archivo'",1);
		setTimeout("document.frmcargadoc.submit()",10);
	}
}


function mostrar()
{
	var op = document.getElementById('controller').value;
	var url = "index.php?controlador="+op+"&accion=listardoctrb";
	var arrayInput = document.getElementsByTagName('input');
	for(var i=0; i<arrayInput.length; i++)
	{	 
  		 if(arrayInput[i].getAttribute('filtro') == "S")
   		 {
			url += "&"+arrayInput[i].getAttribute('name')+"="+arrayInput[i].value;
		 }
	}
	var arraySelect = document.getElementsByTagName('select');
	for(var i=0; i<arraySelect.length; i++)
	{	 
  		 if(arraySelect[i].getAttribute('filtro') == "S")
   		 {
			url += "&"+arraySelect[i].getAttribute('name')+"="+arraySelect[i].value;
		 }
	}
	$("#frmitemsadmin").load(url);
}

