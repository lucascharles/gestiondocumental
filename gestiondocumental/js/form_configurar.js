function grabarFormConfigurar(op, id)
{
	if(validar('N'))
	{
		setTimeout("document.frmConfigurarDispositivo.action = 'index.php?controlador=Dispositivo&accion=grabar_form_configuracion'",1);
		setTimeout("document.frmConfigurarDispositivo.submit()",10);
	}
}
