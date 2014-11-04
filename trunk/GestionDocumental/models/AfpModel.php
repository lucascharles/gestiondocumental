<?php
class AfpModel extends ModelBase
{
	
	public function bajaRegistro($array)
	{
		$dato = new Afp();
		$dato->add_filter("afpIdAfp","=",$array["afpIdAfp"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];

		$sql = " SELECT * ";
		$sql .= " FROM afp ";
		$sql .= " WHERE afpIdAfp = ".$array["afpIdAfp"];
		
		$idsql = consulta($sql);
		
		if(mysql_num_rows ($idsql) == 0)
		{
			$sql = " INSERT INTO afp (afpNombre, activo) VALUES ('".$array["afpNombre"]."','S')  ";
		}else{
			$sql = " UPDATE afp SET afpNombre = '".$array["afpNombre"]."' WHERE afpIdAfp = ".$array["afpIdAfp"];
			
		}
		consulta($sql);
		
	}

	public function getFaenasContratista($param)
	{
		$sql = " SELECT a.* ";
		$sql .= " FROM afp a ";
		$sql .= " WHERE a.activo = 'S' ";
		$sql .= " AND a.afpIdAfp = ".$param["id"];

		$idsql = consulta($sql);
		
		return $idsql;
	}
		
	public function getAfp($array)
	{
		include("config.php");
		
		$sql = "  SELECT a.afpIdAfp , a.afpEstado , a.afpFechaCreacion , a.afpFechaModificacion , a.afpNombre , a.afpUsuarioCreacion , a.afpUsuarioModificacion  ";
		$sql .= " FROM afp a ";
		$sql .= " WHERE a.activo = 'S' ";
		$sql .= " AND a.afpIdAfp = " . $array["id"];
		
		$result = consulta($sql);
		
    	return $result;	
	}
		
	public function getListaAfp($array)
	{
		include("config.php");
		
		$sql = "  SELECT a.afpIdAfp afpIdAfp, a.afpEstado afpEstado, a.afpFechaCreacion afpFechaCreacion, a.afpFechaModificacion afpFechaModificacion, a.afpNombre afpNombre, a.afpUsuarioCreacion afpUsuarioCreacion, a.afpUsuarioModificacion afpUsuarioModificacion ";
		$sql .= " FROM afp a ";
		$sql .= " WHERE a.activo = 'S' ";
		
		if(trim($array["afpNombre"]) <> "")
		{
			$sql .= " and a.afpNombre LIKE '".trim($array["afpNombre"])."%'";
		}
		
		$sql .= " ORDER BY a.afpNombre ";
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>