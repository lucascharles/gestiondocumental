<?php
class ConstructoraController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/constructoras.php", $data);
	}
	
	public function baja($array)
	{
		require 'models/ConstructoraModel.php';
		
		$dato = new ConstructoraModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($param)
	{

		require 'models/ConstructoraModel.php';
		$dato = new ConstructoraModel();		
		$_SESSION["f_consRut"] = $param["consRut"];
		$_SESSION["f_consRazonSocial"] = $param["consRazonSocial"];
				
		$data['controller'] = $param["controlador"];
		$data['result'] = $dato->getListaConstructora($param);
	
		$this->view->show("admin/lista_constructoras.php", $data);
	}
		
	public function alta($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/constructora.php", $data);
	}
	
	public function editar($array)
	{
		require 'models/ConstructoraModel.php';
		
		$dato = new ConstructoraModel();
		
		$constructora = $dato->getConstructoraIDint($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $constructora; 

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/constructora.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/ConstructoraModel.php';
		$dato = new ConstructoraModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>