<?php
class EstadoDispositivoModel extends ModelBase
{


	public function getEstadoDispositivo($array)
	{
		$dato = new EstadoDispositivo();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}


	public function getListaEstadoDispositivo($array=array())
	{
		$dato = new EstadoDispositivoCollection();
		$dato->add_filter("estado","=","S");
		$dato->load();
		
		return $dato;
	}
	

}
?>