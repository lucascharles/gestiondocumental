function resaltarSeccion(obj,id)
{
	$(obj).addClass('brillo');
	$("#ico_"+id).addClass('brillo');
	$("#info_dispositivos").html($("#info_disp_"+id).text());
	$("#info_dispositivos").show("slow");
	
}

function noresaltarSeccion(obj,id)
{	
	$(obj).removeClass('brillo');
	$("#ico_"+id).removeClass('brillo');
	$("#info_dispositivos").hide("slow").html('');
}

function resaltarDispositivo(obj,id)
{
	$(obj).addClass('brillo');
	$("#ico_"+id).addClass('brillo');
	$("#info_dispositivos").html($("#info_disp_"+id).text());
	$("#info_dispositivos").show("slow");
	
}

function noresaltarDispositivo(obj,id)
{	
	$(obj).removeClass('brillo');
	$("#ico_"+id).removeClass('brillo');
	$("#info_dispositivos").hide("slow").html('');
}

function zoomSeccion(id)
{
	var url = "index.php?controlador=PanelControl&accion=dispositivo_seccion&id_secc="+id;
	window.location = url;
}

function salirFormLayout(controler, op)
{
	var url = 'index.php?controlador='+controler+'&accion=admin';
	if(op == "DISP")
	{
		url = 'index.php?controlador='+controler+'&accion=camaras';
	}
	window.location = url;
	
}
function abrirCamaraIp(ip)
{
	alert("abre camara IP:"+ip);
}