<?php
class TipoDispositivoModel extends ModelBase
{


	public function getTipoDispositivo($array)
	{
		$dato = new TipoDispositivo();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}


	public function getListaTipoDispositivo($array=array())
	{
		$dato = new TipoDispositivoCollection();
		$dato->add_filter("estado","=","S");
		$dato->load();
		
		return $dato;
	}
	

}
?>