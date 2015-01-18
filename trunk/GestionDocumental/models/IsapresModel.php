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
	
	
	
	public function getListaPactoIsapres($array)
	{
		include("config.php");
		
		$sql = "  SELECT id, descripcion ";
		$sql .= " FROM isapre_pacto a ";	
		$sql .= " ORDER BY a.descripcion ";
		
		//echo($sql);
		
		$result = consulta($sql);
		
    	return $result;	
	}

}
?>