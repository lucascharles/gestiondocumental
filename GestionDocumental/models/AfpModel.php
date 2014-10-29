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
		
		$dato = new Afp();
		if($tipop=="M")
		{
			$dato->add_filter("afpIdAfp","=",$array["afpIdAfp"]);
			$dato->load();
		}
		
//autonumerico		if(trim($array["afpIdAfp"])<>"")$dato->set_data("afpIdAfp",$array["afpIdAfp"]);
		if(trim($array["afpEstado"])<>"")$dato->set_data("afpEstado",$array["afpEstado"]);
		if(trim($array["afpFechaCreacion"])<>"")$dato->set_data("afpFechaCreacion",$array["afpFechaCreacion"]);
		if(trim($array["afpFechaModificacion"])<>"")$dato->set_data("afpFechaModificacion",$array["afpFechaModificacion"]);
		if(trim($array["afpNombre"])<>"")$dato->set_data("afpNombre",$array["afpNombre"]);
		if(trim($array["afpUsuarioCreacion"])<>"")$dato->set_data("afpUsuarioCreacion",$array["afpUsuarioCreacion"]);
		if(trim($array["afpUsuarioModificacion"])<>"")$dato->set_data("afpUsuarioModificacion",$array["afpUsuarioModificacion"]);

		$dato->set_data("activo","S");
		$dato->save();
	}

	public function getAfp($id_afp)
	{
		$dato = new Constructora();
		$dato->add_filter("afpIdAfp","=",$id_afp);
		$dato->load();
		
		return $dato;
	}
	

	public function getAfpIDint($array)
	{
		$dato = new Afp();
		$dato->add_filter("afpIdAfp","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}
	
	public function getDatosAfp($array)
	{
		$dato = new Afp();
		$dato->add_filter("afpIdAfp","=",$array["idafp"]);
		$dato->load();
		
		return $dato;
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