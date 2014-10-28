<?php
class DashboardModel extends ModelBase
{
	
	public function getListaConstructoras($array)
	{
		include("config.php");
		
		$sql = " SELECT c.consIdConstructora consIdConstructora, c.consNombreFantasia consNombreFantasia, c.consRazonSocial consRazonSocial, c.consRut consRut ";
		$sql .= " FROM constructora c ";
		$sql .= " WHERE c.activo = 'S' ";
		
		if(trim($array["consRazonSocial"]) <> "")
		{
			$sql .= " and c.consRazonSocial LIKE '".trim($array["consRazonSocial"])."%'";
		}

		if(trim($array["consRut"]) <> "")
		{
			$sql .= " and c.consRut LIKE '".trim($array["consRut"])."%'";
		}
		
		$sql .= " ORDER BY c.consRazonSocial ";
	
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>