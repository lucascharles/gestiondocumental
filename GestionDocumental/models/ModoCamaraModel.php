<?php
class ModoCamaraModel extends ModelBase
{


	public function getModoCamara($array)
	{
		$dato = new ModoCamara();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}


	public function getListaModoCamara($array=array())
	{
		$dato = new ModoCamaraCollection();
		$dato->add_filter("estado","=","S");
		$dato->load();
		
		return $dato;
	}
	

}
?>