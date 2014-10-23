<?php
class TrabajadoresControlController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/trabajadores.php", $data);
	}
	
	public function baja($array)
	{
		require 'models/TrabajadoresModel.php';
		
		$dato = new TrabajadoresModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($array)
	{

		require 'models/TrabajadoresControlModel.php';
		$dato = new TrabajadoresControlModel();		
		$_SESSION["f_nombre"] = $array["trbNombre"];
		$_SESSION["f_apellido"] = $array["trbApPaterno"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaTrabajador($array);
		$data['inicio'] = $array["inicio"];
		$data['inicio_pag'] = $array["inicio_pag"];
	
		$this->view->show("admin/lista_trabajadores.php", $data);

	}
		
	public function alta($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/trabajador.php", $data);
	}
	
	public function editar($array)
	{
		require 'models/TrabajadoresControlModel.php';
		
		$dato = new TrabajadoresControlModel();
		
		$trabajador = $dato->getTrabajadorIDint($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $trabajador; 

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/trabajador.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/TrabajadoresControlModel.php';
		$dato = new TrabajadoresControlModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>