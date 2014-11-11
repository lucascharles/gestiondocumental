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

	public function faenasempresa($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
	
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("empresa/faenas.php", $data);
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

		$_SESSION["idusuario"] = $param["usrLogin"];
		$_SESSION["userid"] = $resp[1]["id"];
		
		if($_SESSION["tip_usuario"] == "E")
		{
			$idempresa = $_SESSION["idempresa"];
			$data['result'] = $dato->getListaFaenasEmpresa($idempresa);
			$this->view->show("empresa/lista_faenas.php", $data);
		}
		else
		{
		
			$data['result'] = $dato->getListaFaenas($param);
			$this->view->show("admin/lista_faenas.php", $data);
		}

		
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
		
		$fae = $dato->getFaena($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $fae;

		$data['arrayscriptJs'] = array("funcionesemp.js","usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['listConstructoras'] = $cons->getListaConstructora($array);
		
		$idcons = $fae->get_data("consIdConstructora");
		$data['cons'] = $cons->getConstructoraIDint($idcons);
		
		$this->view->show("form/faena.php", $data);
	}
	
	public function verDetalle($array)
	{
		require 'models/FaenasModel.php';
		require 'models/DocumentoModel.php';
		require 'models/ContratistaModel.php';
		
		$faena = new FaenasModel();
		$fae = $faena->getFaena($array);
		$data['datoFaena'] = $fae;

		$doc = new DocumentoModel();
		$data['idsql_tip_doc'] = $doc->getListaTipoDocumento();
		$data['rs_tip_doc'] = mysql_fetch_array($doc->getListaTipoDocumento());
		$data['ctrIdContratista'] = $_SESSION["idempresa"];
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		$data['arrayscriptJs'] = array("dashboard.js","funciones.js");
		
		$this->view->show("empresa/detalle_faena.php", $data);
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
	
	public function listar_documentos($param)
	{
		require 'models/DocumentoModel.php';
		$dato = new DocumentoModel();
		$data['controller'] = $param["controlador"];
		$data["idsql_doc_trabajador"] = $dato->getListaDocumentos($param);
		$this->view->show("empresa/lista_dashboard_contatista.php", $data);
		
	}
	
}
?>