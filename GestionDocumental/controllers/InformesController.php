<?php
class InformesController extends ControllerBase
{
	public function mostrar_descarga($param)
	{
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['nom_empresa'] = $param["nombre_empresa"];
		$data['arrayscriptJs'] = array("jquery-1.7.1.min.js","funcioneslistado.js","funciones.js");
		$this->view->show("person/descarga.php", $data);
	}
	
    public function listado_trabajador($param)
    {
		require 'models/TrabajadorModel.php';
		require 'models/DocumentoModel.php';
		require 'models/ContratistaModel.php';
		require 'models/ConstructoraModel.php';
		$dato = new TrabajadorModel();
		$doc = new DocumentoModel();
		$contratista = new ContratistaModel();
		$constructora = new ConstructoraModel();
		
		if($param["filtrar"] == 1)
		{
			
			$data['idsql'] = $dato->getListaTrabajador($param);
			$_SESSION["sql_exp_excel"] = $dato->sql;
			$_SESSION["f_consIdConstructora"] = $param["consIdConstructora"];
			$_SESSION["f_ctrIdContratista"] = $param["ctrIdContratista"];
			$_SESSION["f_id_tipodocumento"] = $param["id_tipodocumento"];
			
		}
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['nom_empresa'] = $param["nombre_empresa"];
		$data['accion'] = $param["accion"];
		$data['arrayscriptJs'] = array("jquery-1.7.1.min.js","funcioneslistado.js","funciones.js");
		$data["idsql_tipdoc"] = $doc->getListaTipoDocumento();
		$idsql = $constructora->getListaConstructora($param);
		$rs = mysql_fetch_array($idsql);
		$param["consIdConstructora"] = ($_SESSION["f_consIdConstructora"]>0)?$_SESSION["f_consIdConstructora"]:$rs["consIdConstructora"];
		$data['idsql_empresa'] = $constructora->getListaConstructora($param);
		$data['result'] = $contratista->getListaContratistas($param);	
		
		
		
		$this->view->show("listado/trabajadores.php", $data);
    }
	
	public function get_trabajdores_pdf($param)
	{
		require 'models/InformesModel.php'; 
		$dato = new InformesModel();
		$param["sql_exp_excel"] = $_SESSION["sql_exp_excel"];
		$param["titulo"] = "LISTADO DE TRABAJADORES";
		$param["sub_titulo"] = "";
		
		$dato->exportar_a_pdf($param);
	}
	
	public function bajar_trabajdores_pdf($param)
	{
		require 'models/InformesModel.php'; 
		$dato = new InformesModel();
		$param["sql_exp_excel"] = $_SESSION["sql_exp_excel"];
		$param["titulo"] = "DOCUMENTACION TRABAJADORES";
		
		$dato->bajar_trabajdores_pdf($param);
	}	
}
?>