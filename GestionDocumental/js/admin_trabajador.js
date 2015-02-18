// JavaScript Document
function documentosTrabajador(op,id,id_c)
{
	window.location = 'index.php?controlador='+op+'&accion=documentos_trabajador'+'&id='+id+'&id_c='+id_c;
}

function bloquear(id,bloq)
{
	if(bloq==1)	$("#"+id).hide();
	if(bloq==0)	$("#"+id).show();
}