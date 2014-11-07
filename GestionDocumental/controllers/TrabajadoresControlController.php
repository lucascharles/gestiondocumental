<?php
class TrabajadoresControlController extends ControllerBase
{

	public function admin($param)
	{
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/trabajador.php", $data);

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
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaTrabajador($array);
	
		$this->view->show("admin/lista_trabajadores.php", $data);

	}
		
	public function alta($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/trabajador.php", $data);
	}
	
	public function editar($param)
	{
		require 'models/TrabajadoresControlModel.php';
		
		$dato = new TrabajadoresControlModel();
		
		$data['rs'] = $dato->getTrabajador($param);
		$data['nom_sistema'] = $param["nombre_sistema"];
		$data['controller'] = $param["controlador"];
		$data['tipop'] = "M";
		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/trabajador.php", $data);
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
		
		$dato = new TrabajadoresControlModel();
		
		$trabajador = $dato->getTrabajador($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $trabajador;
		
		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/doctrabajador.php", $data);
	}

	
	public function listar_documentos($array)
	{
	
		require 'models/TrabajadoresControlModel.php';
		require 'models/DocumentoModel.php';

		$_SESSION["f_nombre"] = $array["trbNombre"];
		$_SESSION["f_apellido"] = $array["trbApPaterno"];
	
		$data['controller'] = $array["controlador"];
		$data['inicio'] = $array["inicio"];
		$data['inicio_pag'] = $array["inicio_pag"];
		
		if($array["opt"] == "ANTECEDENTES_LABORALES" ){
			$dato = new DocumentoModel();
			$lista = $dato->getListaRemuneraciones($array);
			$data['result'] = $lista;
							
			
			$this->view->show("docs/lista_antecedentes_laborales.php", $data);
		}
			
		if($array["opt"] == "REMUNERACION_ASISTENCIA" ){
			$dato = new DocumentoModel();
			$lista = $dato->getListaRemuneraciones($array);
			$data['listaRemuneraciones'] = $lista;
				
			$this->view->show("docs/lista_remuneracion_asistencia.php", $data);
		}
		
		if($array["opt"] == "CONTRATO_TRABAJO" ){
			$this->view->show("docs/lista_contrato_trabajo.php", $data);
		}
		
		if($array["opt"] == "PLANPAGOPREVISIONAL" ){
			$this->view->show("docs/lista_pago_previsionales.php", $data);
		}
		
		if($array["opt"] == "PREVENCIONRIESGO" ){
			$this->view->show("docs/lista_prevencion_riesgo.php", $data);
		}
		
	
	}
}
?>