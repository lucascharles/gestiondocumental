<?php
class FaenasController extends ControllerBase
{
	public function bloquear_contratista($param)
	{
		require 'models/FaenasModel.php';
		$dato = new FaenasModel();		
		$res = $dato->bloquear_contratista($param);
		
		echo($res);
	}
	public function bloquear($param)
	{
		require 'models/FaenasModel.php';
		$dato = new FaenasModel();		
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['id_faena'] = $param["id"];
		$data["idsql_contratistas"] = $dato->getContratistas($param);
		$data['arrayscriptJs'] = array("bloquear_faena.js");
	
		$this->view->show("person/bloquear_faena.php", $data);
	}

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_faena.js");
	
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
		$_SESSION["f_faeResponsable"] = $param["faeResponsable"];
				
		$data['controller'] = $param["controlador"];
				
		$destino = "admin";	
		if($_SESSION["tip_usuario"] == "E")
		{
			$destino = "empresa";
			$param["id_empresa"] = $_SESSION["idempresa"];
		}
		
// 		$data['result'] = $dato->getListaFaenas($param);
		$data['result'] = $dato->getEstadoDocFaena($param);
		$this->view->show($destino."/lista_faenas.php", $data);

		
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

		$data['arrayscriptJs'] = array("validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['listConstructoras'] = $cons->getListaConstructora($array);
		
		$this->view->show("form/faena.php", $data);
	}
	
	public function editar($param)
	{
		require 'models/FaenasModel.php';
		require 'models/ConstructoraModel.php';
		
		$dato = new FaenasModel();
		$cons = new ConstructoraModel();
		
		$rsfaena = $dato->getFaena($param);
		$data['dato'] = $rsfaena;
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['tipop'] = "M";

		$data['arrayscriptJs'] = array("faena.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		if($_SESSION["tip_usuario"] == "E")
		{
			$data['arrayscriptJs'][] = "funcionesemp.js";
		}
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		$data['idsql_constructora'] = $cons->getListaConstructora($param);
		
		$this->view->show("form/faena.php", $data);
	}
	
	public function verDetalle($param)
	{
		require 'models/FaenasModel.php';
		require 'models/DocumentoModel.php';
		require 'models/ContratistaModel.php';
		
		$faena = new FaenasModel();
		$doc = new DocumentoModel();
		
		$data['datoFaena'] = $faena->getFaena($param);
		$data['idsql_tip_doc'] = $doc->getListaTipoDocumento();
		$data['idsql_tip_doc_aux'] = $doc->getListaTipoDocumento();
		$data['ctrIdContratista'] = $_SESSION["idempresa"];
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		$data['arrayscriptJs'] = array("faena_empresa.js","funciones.js");
		
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
		$this->view->show("empresa/lista_documento_empresa.php", $data);
		
	}
	
	public function carga_documento($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/DocumentoModel.php';
		require 'models/FaenasModel.php';
		require 'models/TrabajadoresControlModel.php';
		$dato = new ContratistaModel();
		$doc = new DocumentoModel();
		$faena = new FaenasModel();
		$trabajador = new TrabajadoresControlModel();
		
		$data["dato"]= $dato->getContratista(array("id"=>$param["id_c"]));
		$data["rs_faena"]= $faena->getFaena(array("id"=>$param["id_f"]));
		$data["rs_trabajador"]= $trabajador->getTrabajador(array("id"=>$param["id_t"]));
		$data["rs_sub_doc"]= $doc->getSubTipoDocumento(array("id"=>$param["id_d"]));
		$data['controller'] = $param["controlador"];
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['arrayscriptJs'] = array("validacampos.js","documento_empresa.js","funciones.js");
		$data["id_f"] = $param["id_f"];
		$data["id_t"] = $param["id_t"];
		$data["id_d"] = $param["id_d"];
		$data["id_c"] = $param["id_c"];
		$data["id_td"] = $param["id_td"];
		$data["idsql_doc"] = $doc->getDocumentos(array("id_sub_tipodocumento"=>$param["id_d"],"id_faena"=>$param["id_f"],"id_trabajador"=>$param["id_t"],"id_contratista"=>$param["id_c"]));
		
		$this->view->show("empresa/carga_documento.php", $data);
	}
	
	public function grabasubir_archivo($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/DocumentoModel.php';
		require 'models/FaenasModel.php';
		require 'models/TrabajadoresControlModel.php';
		$dato = new ContratistaModel();
		$doc = new DocumentoModel();
		$faena = new FaenasModel();
		$trabajador = new TrabajadoresControlModel();
		
		$doc->uploadDocumento($param);
		
		$data["dato"]= $dato->getContratista(array("id"=>$param["id_contratista"]));
		$data["rs_faena"]= $faena->getFaena(array("id"=>$param["id_faena"]));
		$data["rs_trabajador"]= $trabajador->getTrabajador(array("id"=>$param["id_trabajador"]));
		$data["rs_sub_doc"]= $doc->getSubTipoDocumento(array("id"=>$param["id_sub_tipodocumento"]));
		$data['controller'] = $param["controlador"];
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['arrayscriptJs'] = array("validacampos.js","documento.js");
		$data["id_f"] = $param["id_faena"];
		$data["id_t"] = $param["id_trabajador"];
		$data["id_d"] = $param["id_sub_tipodocumento"];
		$data["id_c"] = $param["id_contratista"];
		$data["id_td"] = $param["id_td"];
		$data["idsql_doc"] = $doc->getDocumentos($param);
		
		$this->view->show("empresa/carga_documento.php", $data);
	}
}
?>