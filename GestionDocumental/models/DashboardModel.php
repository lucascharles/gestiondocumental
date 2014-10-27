<?php
class DashboardModel extends ModelBase
{
	
	public function getListaConstructoras($array)
	{
		include("config.php");
		
		$select = " c.consIdConstructora consIdConstructora, c.consNombreFantasia consNombreFantasia, c.consRazonSocial consRazonSocial, c.consRut consRut ";
		$from = " constructora c ";
		$where = " c.activo = 'S' ";
		
		if(trim($array["consRazonSocial"]) <> "")
		{
			$where .= " and c.consRazonSocial LIKE '".trim($array["consRazonSocial"])."%'";
		}

		if(trim($array["consRut"]) <> "")
		{
			$where .= " and c.consRut LIKE '".trim($array["consRut"])."%'";
		}
		
		$where .= " ORDER BY c.consRazonSocial ";
		
		$sqlpersonal = new SqlPersonalizado($config->get('dbhost'), $config->get('dbuser'), $config->get('dbpass') );
		$sqlpersonal->set_select($select); 
	  	$sqlpersonal->set_from($from);
		$sqlpersonal->set_where($where);
		if(!($array["all_rows"] == "S"))
		{
			$sqlpersonal->set_limit(($array["inicio"]*40),($array["inicio"]*40)+40); // PARA MYSQL
		}
	
    	$sqlpersonal->load();
		$cant = $sqlpersonal->get_cant_registros();
		
		$result = array();
		$result[] = $sqlpersonal;
		$result[] = $cant;
    	return $result;	
	}

	
	

}
?>