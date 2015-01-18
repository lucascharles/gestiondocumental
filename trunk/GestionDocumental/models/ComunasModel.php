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

		if($param["idCiudad"] > 0)
		{
			$sql .= " AND c.idCiudad = ".$param["idCiudad"];
		}

		$result = consulta($sql);
		
    	return $result;	
	}
	
	public function get_combo_comuna($param)
	{
		include("config.php");
		
		$sql = " SELECT c.idComuna 	, c.comuna ";
		$sql .= " FROM comunas c ";
		$sql .= " WHERE c.activo = 'S' ";
		
	
		if(trim($param["idCiudad"]) <> "")
		{
			$sql .= " and c.idCiudad = ".$param["idCiudad"];
		}
		
		$sql .= " ORDER BY c.comuna ";
		
// 		echo($sql);
// 		exit;
		
		$idsql = consulta($sql);
		$html_combo = "";
		$html_combo .= "<option value=''></option> ";
		while($rs=mysql_fetch_array($idsql))
		{
			$html_combo .= "<option value='".$rs["idComuna"]."'>".utf8_encode($rs["comuna"])." </option> ";
		}
				
    	return $html_combo;	
	}

}
?>