<?php
class ComunasModel extends ModelBase
{
	public function bajaRegistro($param)
	{
		$sql = " UPDATE comunas SET activo = 'N' WHERE i = idComuna".$param["id"];
		//echo($sql);
		consulta($sql);
	}
	

	public function getComuna($param)
	{
		$sql =  " SELECT idComuna, comuna, idRegion ";
		$sql .= " FROM comunas WHERE activo = 'S' and idComuna = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
		
	public function getListaComunas($param)
	{
		include("config.php");
		
		$sql .= " SELECT * ";
		$sql .= " FROM comunas c";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " ORDER BY c.comuna ";

		$result = consulta($sql);
		
    	return $result;	
	}
	

}
?>