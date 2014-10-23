<?php
//actualiza00006
class AvisosController extends ControllerBase
{
	public function lista_avisos($array)
	{
		require 'models/AvisosModel.php';
		$avisos = new AvisosModel();
		
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['controller'] = $array["controlador"];
		
		//$data['cantAvisoTramites'] = $avisos->getAvisoTramite();
		//$data['cantDuracionTramites'] = $avisos->getDuracionTramite();
		//$data['cantSolicitudLegajo'] = $avisos->getSolicitudLegajoTramite();
		$data['difrespaldo'] = $avisos->getRespaldoActual();
		//$data['cantParam'] = $avisos->getParametrizacion();
		$data['dia_control'] = $avisos->getDiaControl();
		
		$this->view->show("person/lista_avisos.php", $data);
	}
	
	public function mostrar_bandera_aviso($array)
	{
		require 'models/AvisosModel.php';
		$avisos = new AvisosModel();
		/*
		if($_SESSION["precesado"] == "")
		{
			$_SESSION["precesado"] = "PROC";
			echo("S");
		}
		*/
		echo($avisos->habilita_bandera());
	}
	
	public function lista_aviso_param($array)
	{
		require 'models/AvisosModel.php';
		$avisos = new AvisosModel();
		
		
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['cantAvisoTramites'] = $avisos->getAvisoTramite();
		$data['cantDuracionTramites'] = $avisos->getDuracionTramite();
		$data['cantSolicitudLegajo'] = $avisos->getSolicitudLegajoTramite();
		$data['difrespaldo'] = $avisos->getRespaldoActual();
		$data['cantEstado'] = $avisos->getCantParamEstados();
		$data['colTipEstado'] = $avisos->getParamTipEstados();
		
		$this->view->show("person/lista_avisos_param.php", $data);
	}
	
	public function bandera_actualiza($array)
	{
		require 'models/AvisosModel.php';
		$avisos = new AvisosModel();

		if($_SESSION["precesado"] == "")
		{
			$_SESSION["precesado"] = "PROC";
			echo($avisos->habilita_bandera_actualiza());
		}
	}
}
//actualiza00003
?>
