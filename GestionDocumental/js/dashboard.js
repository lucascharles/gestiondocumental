function mostrar()
{
	var op = document.getElementById('controller').value;
	var url = "index.php?controlador="+op+"&accion=listar_documentos";
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


$(document).ready(function() 
{
	mostrar();
});


function verDocTrb(op,id)
{
	window.location = 'index.php?controlador='+op+'&accion=verDocTrb'+'&id='+id;
}


function cargarTab(op,id)
{
	$("#id_tipodocumento").val(id);
	//url = "index.php?controlador="+op+"&accion=listar_documentos&tipo_doc="+id;
	//document.getElementById("frmsubpantalla").src = url;
	mostrar();
}

function volverAdmin(op,id)
{
	var url = 'index.php?controlador='+op+'&accion=admin';
	if(id > 0) url += "&id="+id; 
	window.location = url;
}

function abrirVentanaDoc(id_trab, id_ts_doc)
{
	var idf = $("#id_faena").val();
	var id_tipo_doc = $("#id_tipodocumento").val();
	var id_contratista = $("#id_contratista").val();
	var url = "index.php?controlador=Dashboard&accion=carga_documento";
	url += "&id_td="+id_tipo_doc;
	url += "&id_d="+id_ts_doc;
	url += "&id_t="+id_trab;
	url += "&id_f="+idf;
	url += "&id_c="+id_contratista;
	
	window.location = url;
}