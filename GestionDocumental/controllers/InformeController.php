<?php
class InformeController extends ControllerBase
{
	public function alarmas($array)
	{
		require 'models/InformeModel.php';
		require 'models/ModoCamaraModel.php';
		require 'models/EstadoDispositivoModel.php';
		
		$listado = new InformeModel();
		$modo = new ModoCamaraModel();
		$estado = new EstadoDispositivoModel();
			
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		$data['accion'] = $array["accion"];
		$data['col_modo_camara'] = $modo->getListaModoCamara();
		$data['col_estado_disp'] = $estado->getListaEstadoDispositivo();
		
		if($array["fecha_desde"] == '')
		{
			$fechaHoy = date("Y-m-d");
			$dias = 30;
			$calculoPasado = strtotime("$fechaHoy -$dias days");
			$array["fecha_desde"] = date("d/m/Y", $calculoPasado);
		}
		if($array["fecha_hasta"] == '')
		{
			$array["fecha_hasta"] = date("d/m/Y");
		}
		

		$_SESSION['f_fechadesde'] = $array["fecha_desde"];
		$_SESSION['f_fechahasta'] = $array["fecha_hasta"];
		$_SESSION['f_id_modo_camara'] = $array["id_modo_camara"];
		$_SESSION['f_id_estado_dispositivo'] = $array["id_estado_dispositivo"];
		
		
		$data['arrayscriptJs'] = array("funciones.js","funcioneslistado.js","inform_alarmas.js","jquery-ui-1.8.16.custom.min.js","jquery-ui-timepicker-addon.js","i18n/jquery.ui.datepicker-es.js","jquery-ui-sliderAccess.js");
		$data['arrayscriptCss'] = array("smoothness/jquery-ui-1.8.17.custom.css");
		
		$data['idsql'] = $listado->get_informe_alarmas($array);
	
		$this->view->show("person/informe_alarmas.php", $data);
	}
	
	
}
?>
