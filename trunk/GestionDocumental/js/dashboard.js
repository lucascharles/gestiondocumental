
function verDocTrb(op,id)
{
	window.location = 'index.php?controlador='+op+'&accion=verDocTrb'+'&id='+id;
}

function abrirLiquidaciones((id)
{
	$("#popup_confirmacion").css("margin-top",($(window).scrollTop()+50));
	$("#popup_confirmacion").slideDown(1000);	
	$("#id_reg").val(id)
}

