<?php
class ContratistasController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/contratistas.php", $data);
	}

	
	public function baja($array)
	{
		require 'models/ContratistaModel.php';
		
		$dato = new UsuarioModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($param)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();
		
		$_SESSION["f_ctrRut"] = $param["ctrRut"];
		$_SESSION["f_ctrRazonSocial"] = $param["ctrRazonSocial"];
				
		$data['controller'] = $param["controlador"];
		$data['result'] = $dato->getListaContratistas($param);
		
		$this->view->show("admin/lista_contratistas.php", $data);
	}
	
	public function alta($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/contratista.php", $data);
	}
	
	public function editar($param)
	{
		require 'models/ContratistaModel.php';
		
		$dato = new ContratistaModel();
		$data['dato'] = $dato->getContratista($param);
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['tipop'] = "M";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/contratista.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>