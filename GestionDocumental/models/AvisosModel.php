<?php

class AvisosModel extends ModelBase
{

	
	
	public function getRespaldoActual()
	{
		include("config.php");
		
		$dif = 0;
		
		$select = " DATEDIFF( CURRENT_DATE() , r.fecha) dif ";
		$from = " gc_respaldo r ";
	  	$where = " r.activo = 'S' ";	
				
		$sqlpersonal = new SqlPersonalizado($config->get('dbhost'), $config->get('dbuser'), $config->get('dbpass') );
		$sqlpersonal->set_select($select); 
	  	$sqlpersonal->set_from($from);
		$sqlpersonal->set_where($where);
	
    	$sqlpersonal->load();
		
		
		$datoTmp = &$sqlpersonal->items[$sqlpersonal->get_count()-1];

		$dif = $datoTmp->get_data("dif");
		
    	return $dif;
	}	

	public function habilita_bandera()
	{
		$resp = "N";
		
		$dif_r = $this->getRespaldoActual();
				
		if($dif_r > 1)
		{
			$resp = "S";
		}
		
		$dato = new Agenda();
		$dato->add_filter("id","=",1);
		$dato->load();
		
		if(date("d") == $dato->get_data("dia"))
		{
			$resp = "S";
		}
		
		
		return $resp;
	}
	
	public function getDiaControl()
	{
		$dato = new Agenda();
		$dato->add_filter("id","=",1);
		$dato->load();
		
		return $dato->get_data("dia");
	}
	

}
//actualiza00003
?>