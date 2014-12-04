function mostrar()
{
	var op = document.getElementById('controller').value;
	var url = "index.php?controlador="+op+"&accion=listaritemsadmin";
	
	var arraySelect = document.getElementsByTagName('select');
	for(var i=0; i<arraySelect.length; i++)
	{	 
  		 if(arraySelect[i].getAttribute('filtro') == "S")
   		 {
			url += "&"+arraySelect[i].getAttribute('name')+"="+arraySelect[i].value;
		 }
	}
	var arrayInput = document.getElementsByTagName('input');
	for(var i=0; i<arrayInput.length; i++)
	{	 
  		 if(arrayInput[i].getAttribute('filtro') == "S")
   		 {
			url += "&"+arrayInput[i].getAttribute('name')+"="+arrayInput[i].value;
		 }
	}
	

	$("#frmitemsadmin").load(url);
}


$(document).ready(function() 
{
	mostrar();
});

function paginador(inicio)
{
	$("#inicio").val(inicio);
	mostrar();
}

function nuevoRegistro(op)
{
	window.location = 'index.php?controlador='+op+'&accion=alta';
}

function editarRegistro(op,id)
{
	window.location = 'index.php?controlador='+op+'&accion=editar'+'&id='+id;
}

function verDetalles(op,id)
{
//	alert('index.php?controlador='+op+'&accion=verDetalle'+'&id='+id);
	window.location = 'index.php?controlador='+op+'&accion=verDetalle'+'&id='+id;
}

function verDetalle(op,id)
{
//	alert('index.php?controlador='+op+'&accion=verDetalle'+'&id='+id);
	window.location = 'index.php?controlador='+op+'&accion=verDetalle'+'&id='+id;
}

function documentosTrabajador(op,id,id_f,id_c)
{
	window.location = 'index.php?controlador='+op+'&accion=documentos_trabajador'+'&id='+id+'&id_f='+id_f+'&id_c='+id_c;
}

function bajaRegistro(op)
{
	var datos = "controlador="+op;
	datos += "&accion=baja";
	datos += "&id="+$("#id_reg").val();
				
	$.ajax({
		url: "index.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			cerrarPopUp('popup_confirmacion');
			borrarFila($("#id_reg").val());
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error.");
			
		}
	});
}

function imprimirForm(op)
{
	var arrayInput = document.getElementsByTagName('input');
	var tip_form = "";
	for(var i=0; i<arrayInput.length; i++)
	{	 
  		 if(arrayInput[i].getAttribute('type') == "radio")
   		 {
			if(arrayInput[i].checked == true)
   			{ 
				tip_form = arrayInput[i].value;
				break;
			}
		 }
	}

	window.open('index.php?controlador='+op+'&accion=imprimir_form&id='+$("#id_reg").val()+"&tip_form="+tip_form);
	cerrarPopUp("popup_impresion");
}

function refrescarAdmin(op)
{
	window.location = 'index.php?controlador='+op+'&accion=admin';
}

function abrirVentanaConfirmacion(id)
{
	$("#popup_confirmacion").css("margin-top",($(window).scrollTop()+50));
	$("#popup_confirmacion").slideDown(1000);	
	$("#id_reg").val(id)
}
