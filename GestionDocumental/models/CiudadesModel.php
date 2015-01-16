<?php
class CiudadesModel extends ModelBase
{
	public function bajaRegistro($param)
	{
		$sql = " UPDATE ciudades SET activo = 'N' WHERE i = idCiudad".$param["id"];
		//echo($sql);
		consulta($sql);
	}
	

	public function getCiudad($param)
	{
		$sql =  " SELECT idCiudad, ciudad, idRegion ";
		$sql .= " FROM ciudades WHERE activo = 'S' and idCiudad = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
		
	public function getListaCiudades($param)
	{
		include("config.php");
		
		$sql .= " SELECT * ";
		$sql .= " FROM ciudades c";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " ORDER BY c.ciudad ";

		$result = consulta($sql);
		
    	return $result;	
	}
	
	
}
?>