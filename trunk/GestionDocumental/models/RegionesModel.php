<?php
class RegionesModel extends ModelBase
{
	public function bajaRegistro($param)
	{
		$sql = " UPDATE regiones SET activo = 'N' WHERE i = idRegion".$param["id"];
		//echo($sql);
		consulta($sql);
	}
	

	public function getRegion($param)
	{
		$sql =  " SELECT idRegion, region ";
		$sql .= " FROM regiones WHERE activo = 'S' and idRegion = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
		
	public function getListaRegiones($param)
	{
		include("config.php");
		
		$sql = " SELECT * ";
		$sql .= " FROM regiones c";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " ORDER BY c.region ";

		$result = consulta($sql);
		
    	return $result;	
	}
}
?>