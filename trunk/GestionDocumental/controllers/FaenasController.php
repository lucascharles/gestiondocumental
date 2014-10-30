<?php
class FaenasController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/faenas.php", $data);
	}
	
	public function baja($array)
	{
		require 'models/FaenasModel.php';
		
		$dato = new FaenasModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($param)
	{

		require 'models/FaenasModel.php';
		$dato = new FaenasModel();		
		$_SESSION["f_faeNombre"] = $param["faeNombre"];
		$_SESSION["f_faeEstado"] = $param["faeEstado"];
				
		$data['controller'] = $param["controlador"];
		$data['result'] = $dato->getListaFaenas($param);

		$this->view->show("admin/lista_faenas.php", $data);
	}
		
	public function alta($array)
	{
		require 'models/FaenasModel.php';
		require 'models/ConstructoraModel.php';
		
		$dato = new FaenasModel();
		$cons = new ConstructoraModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['listConstructoras'] = $cons->getListaConstructora($array);
		
		$this->view->show("form/faena.php", $data);
	}
	
	public function editar($array)
	{
		require 'models/FaenasModel.php';
		require 'models/ConstructoraModel.php';
		
		$dato = new FaenasModel();
		$cons = new ConstructoraModel();
		
		$fae = $dato->getFaenaIDint($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $fae;

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['listConstructoras'] = $cons->getListaConstructora($array);
		
		$idcons = $fae->get_data("consIdConstructora");
		$data['cons'] = $cons->getConstructoraIDint($idcons);
		
		$this->view->show("form/faena.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/FaenasModel.php';
		$dato = new FaenasModel();
		

		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>