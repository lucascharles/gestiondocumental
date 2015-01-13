<?php
class DocumentoController extends ControllerBase
{
	public function borrar_documento($param)
	{
		require 'models/DocumentoModel.php';
		
		$doc = new DocumentoModel();		
		
		$doc->borrar_documento($param);
	}
	
	public function grabar_editar_datos($param)
	{
		require 'models/DocumentoModel.php';
		
		$doc = new DocumentoModel();		
		
		$doc->grabar_editar_datos($param);
	}

	public function editar_estado($param)
    {
		require 'models/DocumentoModel.php';
		$doc = new DocumentoModel();
		$data["rs_doc"] = $doc->getDocumento($param);
		$data["idsql_estado"] = $doc->getListaEstadoDocumento($param);
		$data['arrayscriptJs'] = array("validacampos.js","documento.js");
		$data['id'] = $param["id"];
		$this->view->show("person/cambia_estado_documento.php", $data);
	}
	
	public function editar_nota($param)
    {
		require 'models/DocumentoModel.php';
		$doc = new DocumentoModel();
		$data["rs_doc"] = $doc->getDocumento($param);
		$data['arrayscriptJs'] = array("validacampos.js","documento.js");
		$data['id'] = $param["id"];
		$this->view->show("person/cambia_nota_documento.php", $data);
	}
	
    public function carga($param)
    {
		require 'models/ContratistaModel.php';
		require 'models/DocumentoModel.php';
		$dato = new ContratistaModel();
		$doc = new DocumentoModel();
		$param["id"] = $_SESSION["userid"];
		$data["dato"] = $dato->getContratista($param);
		$data["idsql_tip_doc"] = $doc->getListaTipoDocumento();
		if($param["id_faena"] > 0) $_SESSION["f_id_faena"] = $param["id_faena"]; else $param["id_faena"] = $_SESSION["f_id_faena"];
		if($param["id_tipo_documento"] > 0)	$_SESSION["f_id_tipo_documento"] = $param["id_tipo_documento"]; else $param["id_tipo_documento"] = $_SESSION["f_id_tipo_documento"];
		$data["idsql_faena"] = $dato->getFaenasContratista($param);

		if($param["id_faena"] > 0 && $param["id_tipo_documento"] > 0)
		{
			$param["id_contratista"] = $_SESSION["userid"];
			$data["idsql_doc"] = $doc->getDocumentos($param);
		}
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['nom_empresa'] = $param["nombre_empresa"];
		$data['arrayscriptJs'] = array("validacampos.js","documento.js","home.js","cabecera.js");
		$data['arrayscriptCss'] = array("home.css","sticky-navigation.css");
		
		$this->view->show("person/carga_doc_empresa.php", $data);
    }
	
	public function grabasubir_archivo($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/DocumentoModel.php';
		$dato = new ContratistaModel();
		$doc = new DocumentoModel();
		
		$_SESSION["f_id_faena"] = $param["id_faena"];
		$param["id_tipo_documento"] = $_SESSION["f_id_tipo_documento"];
		$param["id_contratista"] = $_SESSION["userid"];
		
		$doc->uploadDocumento($param);
		
		$param["id"] = $_SESSION["userid"];
		$data["dato"] = $dato->getContratista($param);
		$data["idsql_tip_doc"] = $doc->getListaTipoDocumento();
		if($param["id_faena"] > 0) $_SESSION["f_id_faena"] = $param["id_faena"]; else $param["id_faena"] = $_SESSION["f_id_faena"];
		if($param["id_tipo_documento"] > 0)	$_SESSION["f_id_tipo_documento"] = $param["id_tipo_documento"]; else $param["id_tipo_documento"] = $_SESSION["f_id_tipo_documento"];
		$data["idsql_faena"] = $dato->getFaenasContratista($param);
		
		$data["idsql_doc"] = $doc->getDocumentos($param);
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['arrayscriptJs'] = array("validacampos.js","documento.js","home.js","cabecera.js");
		$data['arrayscriptCss'] = array("home.css","sticky-navigation.css");
		
		$this->view->show("person/carga_doc_empresa.php", $data);
	}
}
?>