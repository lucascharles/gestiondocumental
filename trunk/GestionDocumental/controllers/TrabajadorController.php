<?php
class TrabajadorController extends ControllerBase
{

	public function admin($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/ConstructoraModel.php';
		require 'models/FaenasModel.php';
		$dato = new ContratistaModel();
		$faenas = new FaenasModel();
		$cons = new ConstructoraModel();
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_trabajador.js");
		
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E")
		{
			$destino = "empresa/";
			$param["id_empresa"] = $_SESSION["idempresa"];
			//$param["id_agencia"] = $_SESSION["idagencia"];
// 			$data['result'] = $faenas->getListaFaenas($param);
			$data['result'] = $dato->getListaContratistas($param);	
			//$data['result'] = $faenas->getListaFaenas($param);	
		}
		else
		{
			$idsql = $cons->getListaConstructora($param);
			$rs = mysql_fetch_array($idsql);
			$param["consIdConstructora"] = ($_SESSION["f_consIdConstructora"]>0)?$_SESSION["f_consIdConstructora"]:$rs["consIdConstructora"];
			$data['idsql_empresa'] = $cons->getListaConstructora($param);
			$data['result'] = $dato->getListaContratistas($param);	
			//$data['list_faenas'] = $faenas->getListaFaenas($param);
			
		}
	
		$this->view->show($destino."admin/trabajador.php", $data);

	}
	
	public function baja($array)
	{
		require 'models/TrabajadoresModel.php';
		
		$dato = new TrabajadoresModel();
		$dato->bajaRegistro($array);
	}
	
	
	public function listaritemsadmin($param)
	{
		require 'models/TrabajadorModel.php';
		$dato = new TrabajadorModel();		
		$_SESSION["f_nombre"] = $param["trbNombre"];
		$_SESSION["f_apellido"] = $param["trbApPaterno"];		
		$_SESSION["f_consIdConstructora"] = $param["consIdConstructora"];
		$_SESSION["f_ctrIdContratista"] = $param["ctrIdContratista"];
		
		$data['controller'] = $param["controlador"];
		$data['result'] = $dato->getListaTrabajador($param);
		$data['id_c'] = $param["ctrIdContratista"];
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."admin/lista_trabajadores.php", $data);

	}
	
	public function listardoctrb($array)
	{
		require 'models/DocumentoModel.php';
		$dato = new DocumentoModel();		
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getDocumentos($array);
		
		
		$this->view->show("admin/lista_doctrabajadores.php", $data);
		
	}
		
	public function alta($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/ConstructoraModel.php';
		require 'models/FaenasModel.php';
		require 'models/CiudadesModel.php';
		require 'models/RegionesModel.php';
		require 'models/ComunasModel.php';
		require 'models/IsapresModel.php';
		require 'models/AfpModel.php';
		require 'models/SupervisoresModel.php';
		require 'models/TrabajadorModel.php';
		
		$datocons = new ConstructoraModel();
		$datoc = new ContratistaModel();
		$datof = new FaenasModel();
		$trabajador = new TrabajadorModel();
		
		$regiones = new RegionesModel();
		$ciudades = new CiudadesModel();
		$comunas = new ComunasModel();
		$afps = new AfpModel();
		$isapres = new IsapresModel();
		$supervisores = new SupervisoresModel();
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("form_trabajador.js","funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['faenas'] = $datof->getListaFaenas($param);
		$data['regiones'] = $regiones->getListaRegiones($param);
		$data['ciudades'] = $ciudades->getListaCiudades($param);
		$data['comunas'] = $comunas->getListaComunas($param);
		$data['isapres'] = $isapres->getListaIsapres($param);
		$data['idsql_pactoisapres'] = $isapres->getListaPactoIsapres($param);
		$data['afps'] = $afps->getListaAfp($param);
		$data['idsql_empresa'] = $datocons->getListaConstructora();
		$idsql = $datocons->getListaConstructora();
		$rs = mysql_fetch_array($idsql);
		$data['contratistas'] = $datoc->getListaContratistas(array("consIdConstructora"=>$rs["consIdConstructora"]));
		$data['idsql_cargo'] = $trabajador->getListaCargos();
		$data['supervisores'] = $supervisores->getListaSupervisores($param);
		
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/trabajador.php", $data);
	}
	
	public function editar($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/ConstructoraModel.php';
		require 'models/FaenasModel.php';
		require 'models/CiudadesModel.php';
		require 'models/RegionesModel.php';
		require 'models/ComunasModel.php';
		require 'models/IsapresModel.php';
		require 'models/AfpModel.php';
		require 'models/TrabajadorModel.php';
		require 'models/SupervisoresModel.php';
		
		$datoc = new ContratistaModel();
		$datocons = new ConstructoraModel();
		$datof = new FaenasModel();
		$regiones = new RegionesModel();
		$ciudades = new CiudadesModel();
		$comunas = new ComunasModel();
		$afps = new AfpModel();
		$isapres = new IsapresModel();
		$trabajador = new TrabajadorModel();
		$supervisores = new SupervisoresModel();
						
		$data['contratistas'] = $datoc->getListaContratistas($param);
		$data['faenas'] = $datof->getListaFaenas($param);
		$rs = $trabajador->getTrabajador($param);
		$data['rs'] = $rs;
		$param["idRegion"] = $rs["idRegion"];
		$param["idCiudad"] = $rs["idCiudad"];
		$data['faenas'] = $datof->getListaFaenas($param);
		$data['regiones'] = $regiones->getListaRegiones($param);
		$data['ciudades'] = $ciudades->getListaCiudades($param);
		$data['comunas'] = $comunas->getListaComunas($param);
		$data['isapres'] = $isapres->getListaIsapres($param);
		$data['afps'] = $afps->getListaAfp($param);
		$data['idsql_pactoisapres'] = $isapres->getListaPactoIsapres($param);
		
		$rs_cont = $datoc->getContratista(array("id"=>$rs["ctrIdContratista"]));
		$data["consIdConstructora"] = $rs_cont["consIdConstructora"];
		$data['contratistas'] = $datoc->getListaContratistas(array("consIdConstructora"=>$rs_cont["consIdConstructora"]));
		$data['idsql_empresa'] = $datocons->getListaConstructora();
		$data['idsql_cargo'] = $trabajador->getListaCargos();
		$data['supervisores'] = $supervisores->getListaSupervisores($array);
		
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['tipop'] = "M";
		$data['arrayscriptJs'] = array("form_trabajador.js","funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/trabajador.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/TrabajadorModel.php';
		$dato = new TrabajadorModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	
	public function documentos_trabajador($array)
	{
		
		require 'models/TrabajadorModel.php';
		require 'models/DocumentoModel.php';

		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		
		$dato = new TrabajadorModel();
		$trabajador = $dato->getTrabajador($array);
		$data['rs'] = $trabajador;
		
		$doc = new DocumentoModel();
		$data['idsql_tip_doc'] = $doc->getListaTipoDocumento();
		$data['grupo_doc'] = $doc->getListaTipoDocumento();

		$data["id_f"] = $array["id_f"];
		$data["id_t"] = $array["id"];
		$data["id_d"] = $array["id_d"];
		$data["id_c"] = $array["id_c"];
		$data["id_td"] = $array["id_td"];

		$_SESSION["id_f"] = $array["id_f"];
		$_SESSION["id_t"] = $array["id_t"]; 
		$_SESSION["id_c"] = $array["id_c"]; 
		$_SESSION["id_d"] = $array["id_d"];
		
		$data['arrayscriptJs'] = array("doctrabajador.js","funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/doctrabajador.php", $data);
	}

	


	public function grabasubir_archivo($param)
	{
		require 'models/ContratistaModel.php';
		require 'models/DocumentoModel.php';
		require 'models/FaenasModel.php';
		require 'models/TrabajadorModel.php';
		$doc = new DocumentoModel();
		$faena = new FaenasModel();
		$trabajador = new TrabajadorModel();
		
		$doc->uploadDocumento($param);
		
		$data['grupo_doc'] = $doc->getListaTipoDocumento();
		$data['rs_tip_doc'] = $doc->getListaSubTipoDocumento("");

		$data['rs'] = $trabajador->getTrabajador(array("id"=>$param["id_trabajador"]));
		
		$data['controller'] = $param["controlador"];
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['arrayscriptJs'] = array("doctrabajador.js","validacampos.js","documento.js");
		
		$data["id_tdoc"] = $param["id_tipo_documento"];
 		$data["tipoDoc"] = $doc->getTipoDocumento($param["id_tipo_documento"]);
 		$data["subTipoDoc"] = $doc->getSubTipoDocumento($param["id_sub_tipodocumento"]);
 		
		$data["id_f"] = $param["id_faena"];
		$data["id_t"] = $param["id_trabajador"];
		$data["id_d"] = $param["id_sub_tipodocumento"];
		$data["id_c"] = $param["id_contratista"];
		
		$_SESSION["id_f"] = $param["id_f"];
		$_SESSION["id_t"] = $param["id_t"];
		$_SESSION["id_c"] = $param["id_c"];
		$_SESSION["id_d"] = $param["id_d"];

		$data['arrayscriptJs'] = array("doctrabajador.js","funciones.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		$destino = "";	
		if($_SESSION["tip_usuario"] == "E") $destino = "empresa/";
		$this->view->show($destino."form/doctrabajador.php", $data);
	}
	
}
?>