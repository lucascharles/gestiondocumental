<?php
class DashboardController extends ControllerBase
{

	public function admin($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js");
	
		$this->view->show("admin/dashboard.php", $data);
	}
	
	public function listaritemsadmin($array)
	{

		require 'models/DashboardModel.php';
		$dato = new DashboardModel();		
		$_SESSION["f_const"] = $array["nombre"];
				
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaConstructoras($array);
	
		$this->view->show("admin/lista_dashboard.php", $data);
	}
	
	public function verDetalle($array)
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
	
		$this->view->show("dash/dashboard_constructora.php", $data);
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
	
	
	public function listar_documentos($array)
	{
	
		require 'models/DocumentoModel.php';
		$dato = new DocumentoModel();
		
		$_SESSION["f_nombre"] = $array["trbNombre"];
		$_SESSION["f_apellido"] = $array["trbApPaterno"];
	
		$data['controller'] = $array["controlador"];
		$data['inicio'] = $array["inicio"];
		$data['inicio_pag'] = $array["inicio_pag"];
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_usuario.js","dashboard.js");
		
		if($array["opt"] == "ANTECEDENTES_LABORALES" ){
			$lista = $dato->getListaAntecedentesLaborales($array);
			$data['result'] = $lista;
			$this->view->show("dash/lista_antecedentes_laborales.php", $data);
		}
			
		if($array["opt"] == "REMUNERACION_ASISTENCIA" ){
			$lista = $dato->getListaRemuneracionAsistencia($array);
			$data['result'] = $lista;
			$this->view->show("dash/lista_remuneracion_asistencia.php", $data);
		}
		
		if($array["opt"] == "CONTRATO_TRABAJO" ){
			$lista = $dato->getListaRemuneracionAsistencia($array);
			$data['result'] = $lista;
			$this->view->show("dash/lista_contrato_trabajo.php", $data);
		}
		
		if($array["opt"] == "PLANPAGOPREVISIONAL" ){
			$lista = $dato->getListaRemuneracionAsistencia($array);
			$data['result'] = $lista;
			$this->view->show("dash/lista_pago_previsionales.php", $data);
		}
		
		if($array["opt"] == "PREVENCIONRIESGO" ){
			$lista = $dato->getListaRemuneracionAsistencia($array);
			$data['result'] = $lista;
			$this->view->show("dash/lista_prevencion_riesgo.php", $data);
		}
	
	}
		

}
?>