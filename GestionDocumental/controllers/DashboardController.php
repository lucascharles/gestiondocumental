<?php
class DashboardController extends ControllerBase
{
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
		$data["idsql_doc"] = $doc->getDocumentos($param);
		
		$this->view->show("person/carga_documento.php", $data);
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
		$data['arrayscriptJs'] = array("validacampos.js","documento.js");
		$data["id_f"] = $param["id_f"];
		$data["id_t"] = $param["id_t"];
		$data["id_d"] = $param["id_d"];
		$data["id_c"] = $param["id_c"];
		$data["idsql_doc"] = $doc->getDocumentos(array("id_sub_tipodocumento"=>$param["id_d"],"id_faena"=>$param["id_f"],"id_trabajador"=>$param["id_t"],"id_contratista"=>$param["id_c"]));
		
		$this->view->show("person/carga_documento.php", $data);
	}

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		$this->view->show("admin/dashboard.php", $data);
	}
	
	public function listaritemsadmin($param)
	{
		require 'models/ContratistaModel.php';
		$dato = new ContratistaModel();		
				
		$data['controller'] = $param["controlador"];
		$data['result'] = $dato->getListaContratistas($param);
	
		$this->view->show("admin/lista_dashboard.php", $data);
	}
	
	public function verDetalle($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/DocumentoModel.php';
		
		$contratista = new ContratistaModel();
		$doc = new DocumentoModel();
		
		$data["idsql_faena"] = $contratista->getFaenasContratista(array("id"=>$param["id"]));
		$data['idsql_tip_doc'] = $doc->getListaTipoDocumento();
		$data['rs_tip_doc'] = mysql_fetch_array($doc->getListaTipoDocumento());
		$data['dato'] = $contratista->getContratista($param);
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['arrayscriptJs'] = array("dashboard.js","funciones.js");
	
		$this->view->show("person/dashboard_contatista.php", $data);
	}

	public function listar_documentos($param)
	{
		require 'models/DocumentoModel.php';
		$dato = new DocumentoModel();
		
		$data['controller'] = $param["controlador"];
		$data["idsql_doc_trabajador"] = $dato->getListaDocumentos($param);

		$this->view->show("person/lista_dashboard_contatista.php", $data);
		
	}
	
	
	public function verDocTrb($array)
	{
		require 'models/DocumentoModel.php';
		
		$dato = new DocumentoModel();
		
		$constructora = $dato->getDocumentoTrb($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $constructora;
		
		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("docs/liquidaciones_trabajador.php", $data);
		
	}	

}
?>