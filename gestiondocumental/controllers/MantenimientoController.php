<?php
class MantenimientoController extends ControllerBase
{
	public function actualiza($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("mantenimiento.js");
		$this->view->show("mantenimiento/actualiza.php", $data);
	}
	
	public function procesa_act($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("mantenimiento.js");
		$this->view->show("mantenimiento/procesos.php", $data);
	}
	
	public function descarga_act($array)
	{
		require 'models/MantenimientoModel.php';
		$mant = new MantenimientoModel();
		
		$resp = $mant->descarga_archivo_act();
		
		echo($resp);
	}
	
	
	public function exportar($array)
	{
		$data['nom_sistema'] = $array["nombre_sistema"];
		$data['arrayscriptJs'] = array("mantenimiento.js");
		$this->view->show("mantenimiento/exportar.php", $data);
	}
	
	public function upload_datos($array)
	{
		require 'models/MantenimientoModel.php';
		$mant = new MantenimientoModel();
		
		$resp = $mant->upload_datos();
		
		echo($resp);
	}
	
}
?>
