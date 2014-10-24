<?php
class DispositivoController extends ControllerBase
{
	
	public function grabar_form_configuracion($array)
	{
		require 'models/DispositivoModel.php';
		$dato = new DispositivoModel();
		
		$dato->grabar_datosFormConfigurar($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	
	public function configuarar_dispositivo($array)
	{
		require 'models/TipoAlertaModel.php';
		require 'models/ModoCamaraModel.php';
		require 'models/DispositivoModel.php';
		
		$disp = new DispositivoModel();
		$tipo_alerta = new TipoAlertaModel();
		$modo = new ModoCamaraModel();
		
		$data['col_tipo_alerta'] = $tipo_alerta->getListaTipoAlerta();
		$data['col_modo_camara'] = $modo->getListaModoCamara();
		$data['dispositivo'] = $disp->getDispositivo($array);
		$data['dato'] = $disp->getConfiguracionDispositivo($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		
		$data['tipop'] = "M";

		$data['arrayscriptJs'] = array("validacampos.js","form_configurar.js");
		
		$this->view->show("form/configurar_dispositivo.php", $data);
	}
	
	public function baja($array)
	{
		require 'models/DispositivoModel.php';
		
		$dato = new DispositivoModel();
		$dato->bajaRegistro($array);
	}
	
	public function admin($array)
	{
		require 'models/TipoDispositivoModel.php';
		require 'models/EstadoDispositivoModel.php';
		$tipo_disp = new TipoDispositivoModel();
		$estado_disp = new EstadoDispositivoModel();
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
						
		$data['arrayscriptJs'] = array("funcionesadmin.js","admin_configurar.js");
		$data['col_tipo_dispositivo'] = $tipo_disp->getListaTipoDispositivo();
		$data['col_estado_dispositivo'] = $estado_disp->getListaEstadoDispositivo();
		$data['modulo'] = $_SESSION["config_obj"]->get('modulo_dispositivo');

		$this->view->show("admin/dispositivo.php", $data);
	}
	
	public function listaritemsadmin($array)
	{
		require 'models/DispositivoModel.php';
		$dato = new DispositivoModel();
		
		$_SESSION["f_descripcion"] = $array["descripcion"];
		$_SESSION["f_id_tipo_dispositivo"] = $array["id_tipo_dispositivo"];
		$_SESSION["f_id_estado_dispositivo"] = $array["id_estado_dispositivo"];
			
		$data['controller'] = $array["controlador"];
		$data['result'] = $dato->getListaDispositivo($array);
		$data['inicio'] = $array["inicio"];
		$data['inicio_pag'] = $array["inicio_pag"];
		$data['modulo'] = $_SESSION["config_obj"]->get('modulo_dispositivo');
		$this->view->show("admin/lista_dispositivo.php", $data);
	}
	
	public function alta($array)
	{
		require 'models/TipoDispositivoModel.php';
		require 'models/EstadoDispositivoModel.php';
		$tipo_disp = new TipoDispositivoModel();
		$estado_disp = new EstadoDispositivoModel();
		
		$data['col_tipo_dispositivo'] = $tipo_disp->getListaTipoDispositivo();
		$data['col_estado_dispositivo'] = $estado_disp->getListaEstadoDispositivo();
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "A";

		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/dispositivo.php", $data);
	}
	
	public function editar($array)
	{
		require 'models/DispositivoModel.php';
		require 'models/TipoDispositivoModel.php';
		require 'models/EstadoDispositivoModel.php';
		$tipo_disp = new TipoDispositivoModel();
		$estado_disp = new EstadoDispositivoModel();
		$dato = new DispositivoModel();
		
		$dispositivo = $dato->getDispositivo($array);
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['tipop'] = "M";
		$data['dato'] = $dispositivo; 
		$data['col_tipo_dispositivo'] = $tipo_disp->getListaTipoDispositivo();
		$data['col_estado_dispositivo'] = $estado_disp->getListaEstadoDispositivo();


		$data['arrayscriptJs'] = array("usuario_form.js","validacampos.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$this->view->show("form/dispositivo.php", $data);
	}
	
	public function grabar_form($array)
	{
		require 'models/DispositivoModel.php';
		$dato = new DispositivoModel();
		
		$dato->grabar_datosForm($array);
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['arrayscriptJs'] = array("funcionesadmin.js");
	
		redir("index.php?controlador=".$array["controlador"]."&accion=admin");
	}
	

}
?>