<?php
class AfpController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/afps.php", $data);
	}
	
	public function baja($array)
	{
		require 'models/AfpModel.php';
		
		$dato = new AfpModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($param)
	{
		require 'models/AfpModel.php';
		$dato = new AfpModel();		
		$_SESSION["f_afpNombre"] = $param["afpNombre"];
		$_SESSION["f_afpEstado"] = $param["afpEstado"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaAfp($param);
	
		$this->view->show("admin/lista_afps.php", $data);
	}
		
	public function alta($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/afp.php", $data);
	}
	
	public function editar($array)
	{
		require 'models/AfpModel.php';
		
		$dato = new AfpModel();

		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['result'] = $dato->getAfp($array); 

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/afp.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/AfpModel.php';
		$dato = new AfpModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>