<?php
class TrabajadoresControlController extends ControllerBase
{

	public function admin($param)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js");
		$data['result'] = $dato->getListaContratistas($param);
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
	
		$this->view->show($destino."admin/trabajador.php", $data);

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
		$_SESSION["f_ctrIdContratista"] = $array["ctrIdContratista"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaTrabajador($array);
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."admin/lista_trabajadores.php", $data);

	}
		
	public function alta($array)
	{
		require 'models/ContratistaModel.php';
		require 'models/FaenasModel.php';
		
		$datoc = new ContratistaModel();
		$datof = new FaenasModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['contratistas'] = $datoc->getListaContratistas($param);
		$data['faenas'] = $datof->getListaFaenas($param);
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/trabajador.php", $data);
	}
	
	public function editar($param)
	{
		require 'models/TrabajadoresControlModel.php';
		
		$dato = new TrabajadoresControlModel();
		
		$data['rs'] = $dato->getTrabajador($param);
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['tipop'] = "M";
		$data['arrayscriptJs'] = array("funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/trabajador.php", $data);
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
	
	public function documentos_trabajador($array)
	{
		
		require 'models/TrabajadoresControlModel.php';
		require 'models/DocumentoModel.php';
		
		$dato = new TrabajadoresControlModel();
		$trabajador = $dato->getTrabajador($array);
		$data['rs'] = $trabajador;
		
		
		$doc = new DocumentoModel();
		$data['idsql_tip_doc'] = $doc->getListaTipoDocumento();
		$data['rs_tip_doc'] = mysql_fetch_array($doc->getListaTipoDocumento());
		$data['ctrIdContratista'] = $_SESSION["idempresa"];
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";		
		
		$data['arrayscriptJs'] = array("dashboard.js","funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/doctrabajador.php", $data);
	}

	

}
?>