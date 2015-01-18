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
		$sql .= " FROM ciudades c ";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " ORDER BY c.ciudad ";

		if($param["idRegion"] > 0)
		{
			$sql .= " AND c.idRegion = ".$param["idRegion"];
		}

		$result = consulta($sql);
		
    	return $result;	
	}
	
	public function get_combo_ciudad($param)
	{
		include("config.php");
		
		$sql = " SELECT c.idCiudad 	, c.ciudad ";
		$sql .= " FROM ciudades c ";
		$sql .= " WHERE c.activo = 'S' ";
		
	
		if(trim($param["idRegion"]) <> "")
		{
			$sql .= " and c.idRegion = ".$param["idRegion"];
		}
		
		$sql .= " ORDER BY c.ciudad ";
		
// 		echo($sql);
// 		exit;
		
		$idsql = consulta($sql);
		$html_combo = "";
		$html_combo .= "<option value=''></option> ";
		while($rs=mysql_fetch_array($idsql))
		{
			$html_combo .= "<option value='".$rs["idCiudad"]."'>".utf8_encode($rs["ciudad"])." </option> ";
		}
				
    	return $html_combo;	
	}
	
}
?>