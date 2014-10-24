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
	
	
	public function listaritemsadmin($array)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();
		
		$_SESSION["f_ctrRut"] = $array["ctrRut"];
		$_SESSION["f_ctrRazonSocial"] = $array["ctrRazonSocial"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaContratistas($array);
		$data['inicio'] = $array["inicio"];
		$data['inicio_pag'] = $array["inicio_pag"];
	
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
	
	public function editar($array)
	{
		require 'models/ContratistaModel.php';
		
		$dato = new ContratistaModel();
		
		$usuario = $dato->getContratistaIDint($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $usuario; 

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