<?php
class ConstructoraController extends ControllerBase
{
	public function bloquear_contratista($param)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();		
		$res = $dato->bloquear_contratista($param);
		
		echo($res);
	}
	
	public function bloquear($param)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();		
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['id_empresa'] = $param["id"];
		$param['id_empresa'] = $param["id"];
		$data["idsql_contratistas"] = $dato->getListaContratistas($param);
		$data['arrayscriptJs'] = array("bloquear_contratista.js");
	
		$this->view->show("person/bloquear_contratista.php", $data);
	}

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_constructora.js");
	
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
		
		$constructora = $dato->getConstructora($array);
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