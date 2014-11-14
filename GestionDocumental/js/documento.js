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

function editarEstado(obj)
{
	
	var elemento = $(obj);
	var posicion = elemento.position();
	var id = "popupeditar_estado_"+$(obj).attr("id");
	var url = "index.php?controlador=Documento&accion=editar_estado&id="+$(obj).attr("id");
	//onclick='cerrarPopEditarPrecio()'
	var $div = $("<div id='"+id+"' />");
	$div.css({
		padding: '5px',
    	background: '#F4F4F4',
		left: (posicion.left-270)+'px',
		top: posicion.top+'px',
		position: 'absolute',
		display: 'none',
		overflow: 'auto',
		width:'270px',
		heigth:'20px',
		'border-top-left-radius': '5px',
	    'border-top-right-radius': '5px',
		'border-bottom-left-radius': '5px',
    	'border-bottom-right-radius': '5px',
		'-moz-box-shadow': '1px 1px 5px #0B4F92',
	    '-webkit-box-shadow': '1px 1px 5px #0B4F92',
    	'box-shadow': '1px 1px 5px #0B4F92'
	});
 	$("body").append($div);
	$div.load(url);
	$div.slideToggle();
}

function grabarEditEstado(id)
{
	var datos = "controlador=Documento&accion=grabar_editar_estado&id="+id;
	datos += "&id_estado="+$("#id_estado_documento"+id).val();
		$.ajax({
			url: "index.php",
			data: datos,
			cache: false,
			success: function(res)
			{
				$("#popupeditar_estado_"+id).hide("slow");
				$("#popupeditar_estado_"+id).remove();
				var id_d = $("#id_sub_tipodocumento").val();
				var id_t = $("#id_trabajador").val();
				var id_f = $("#id_faena").val(); 
				var id_c = $("#id_contratista").val(); 
				var url = "index.php?controlador=DashBoard&accion=carga_documento&id_d="+id_d+"&id_t="+id_t+"&id_f="+id_f+"&id_c="+id_c;
				window.location = url;
			},
			error: function(){
				//alert("Ha ocurrido un error y no se ha podido borrar el registro.");
			}
		});
}

function borrarDocumento(obj)
{
	var datos = "controlador=Documento&accion=borrar_documento&id="+$(obj).attr("id");;
	datos += "&id_contratista="+$("#id_contratista").val();
	datos += "&id_faena="+$("#id_faena").val();
	
		$.ajax({
			url: "index.php",
			data: datos,
			cache: false,
			success: function(res)
			{
				var id_d = $("#id_sub_tipodocumento").val();
				var id_t = $("#id_trabajador").val();
				var id_f = $("#id_faena").val(); 
				var id_c = $("#id_contratista").val(); 
				var url = "index.php?controlador=DashBoard&accion=carga_documento&id_d="+id_d+"&id_t="+id_t+"&id_f="+id_f+"&id_c="+id_c;
				window.location = url;
			},
			error: function(){
				//alert("Ha ocurrido un error y no se ha podido borrar el registro.");
			}
		});
}



function cerrarEditEstado(id)
{
	$("#popupeditar_estado_"+id).hide("slow");
	$("#popupeditar_estado_"+id).remove();
}

