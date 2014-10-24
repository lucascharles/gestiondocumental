<?php
class TipoAlertaModel extends ModelBase
{


	public function getTipoAlerta($array)
	{
		$dato = new TipoAlerta();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}


	public function getListaTipoAlerta($array=array())
	{
		$dato = new TipoAlertaCollection();
		$dato->add_filter("estado","=","S");
		$dato->load();
		
		return $dato;
	}
	

}
?>