<?php
class IsapresModel extends ModelBase
{
	
	public function bajaRegistro($param)
	{
		
		$sql = " UPDATE  isapre ";
		$sql .= " SET activo = 'N' ";
		$sql .= " WHERE isaIdIsapre = ".$param["id"];

		consulta($sql);
		
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];

		$sql = " SELECT * ";
		$sql .= " FROM isapre ";
		$sql .= " WHERE isaIdIsapre = ".$array["isaIdIsapre"];
		
		$idsql = consulta($sql);
		
// 		if(mysql_num_rows ($idsql) == 0)
// 		{
// 			$sql = " INSERT INTO isapre (afpNombre, activo) VALUES ('".$array["afpNombre"]."','S')  ";
// 		}else{
// 			$sql = " UPDATE isapre SET afpNombre = '".$array["afpNombre"]."' WHERE afpIdAfp = ".$array["afpIdAfp"];
			
// 		}
		consulta($sql);
		
	}


	public function getIsapre($array)
	{
		include("config.php");
		
		$sql = "  SELECT *  ";
		$sql .= " FROM isapre a ";
		$sql .= " WHERE a.activo = 'S' ";
		$sql .= " AND a.isaIdIsapre = " . $array["id"];
		
		$result = consulta($sql);
		
    	return $result;	
	}
		
	public function getListaIsapres($array)
	{
		include("config.php");
		
		$sql = "  SELECT * ";
		$sql .= " FROM isapre a ";
		$sql .= " WHERE a.activo = 'S' ";
				
		$sql .= " ORDER BY a.isaIsapre ";
		
		//echo($sql);
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>