<?php
class SupervisoresModel extends ModelBase
{
	
	public function bajaRegistro($param)
	{
		
		$sql = " UPDATE  supervisores ";
		$sql .= " SET activo = 'N' ";
		$sql .= " WHERE idSupervisor = ".$param["id"];

		consulta($sql);
		
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];

		$sql = " SELECT * ";
		$sql .= " FROM supervisores ";
		$sql .= " WHERE idSupervisor = ".$array["idSupervisor"];
		
		$idsql = consulta($sql);
		
		if(mysql_num_rows ($idsql) == 0)
		{
			$sql = " INSERT INTO supervisores (supNombre, activo) VALUES ('".$array["supNombre"]."','S')  ";
		}else{
			$sql = " UPDATE supervisores SET supNombre = '".$array["supNombre"]."' WHERE idSupervisor = ".$array["idSupervisor"];
			
		}
		consulta($sql);
		
	}


	public function getSupervisor($array)
	{
		include("config.php");
		
		$sql = "  SELECT * ";
		$sql .= " FROM supervisores a ";
		$sql .= " WHERE a.activo = 'S' ";
		$sql .= " AND a.idSupervisor = " . $array["idSupervisor"];
		
		$result = consulta($sql);
		
    	return $result;	
	}
		
	public function getListaSupervisores($array)
	{
		include("config.php");
		
		$sql = "  SELECT * ";
		$sql .= " FROM supervisores a ";
		$sql .= " WHERE a.activo = 'S' ";
		
		if(trim($array["supNombre"]) <> "")
		{
			$sql .= " and a.supNombre LIKE '".trim($array["supNombre"])."%'";
		}
		
		$sql .= " ORDER BY a.supNombre ";
		
// 		echo($sql);
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>