<?php
class DireccionController extends ControllerBase
{	
	public function get_combo_ciudad($param)
	{
		require 'models/CiudadesModel.php';
		$dato = new CiudadesModel();
		
		$result = $dato->get_combo_ciudad($param);
		
		echo($result);
	}
	
	public function get_combo_comuna($param)
	{
		require 'models/ComunasModel.php';
		$dato = new ComunasModel();
		
		$result = $dato->get_combo_comuna($param);
		
		echo($result);
	}
}
?>