<?php
class TrabajadoresControlModel extends ModelBase
{
	
	public function bajaRegistro($array)
	{
		$dato = new Usuarios();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Trabajador();
		if($tipop=="M")
		{
			$dato->add_filter("trbIdTrabajador","=",$array["id_usu"]);
			$dato->load();
		}
		
//autonumerico		if(trim($array["trbIdTrabajador"])<>"")$dato->set_data("trbIdTrabajador",$array["trbIdTrabajador"]);
		if(trim($array["afpIdAfp"])<>"")$dato->set_data("afpIdAfp",$array["afpIdAfp"]);
		if(trim($array["comIdComuna"])<>"")$dato->set_data("comIdComuna",$array["comIdComuna"]);
		if(trim($array["ctrIdContratista"])<>"")$dato->set_data("ctrIdContratista",$array["ctrIdContratista"]);
		if(trim($array["dirIdDireccion"])<>"")$dato->set_data("dirIdDireccion",$array["dirIdDireccion"]);
		if(trim($array["isaIdIsapre"])<>"")$dato->set_data("isaIdIsapre",$array["isaIdIsapre"]);
		if(trim($array["nacIdNacionalidad"])<>"")$dato->set_data("nacIdNacionalidad",$array["nacIdNacionalidad"]);
		if(trim($array["tgrlIdCargoContractual"])<>"")$dato->set_data("tgrlIdCargoContractual",$array["tgrlIdCargoContractual"]);
		if(trim($array["tgrlIdOficioCab"])<>"")$dato->set_data("tgrlIdOficioCab",$array["tgrlIdOficioCab"]);
		if(trim($array["tgrlIdOficioDet"])<>"")$dato->set_data("tgrlIdOficioDet",$array["tgrlIdOficioDet"]);
		if(trim($array["tgrlIdTipoContrato"])<>"")$dato->set_data("tgrlIdTipoContrato",$array["tgrlIdTipoContrato"]);
		if(trim($array["tjorIdTipoJornada"])<>"")$dato->set_data("tjorIdTipoJornada",$array["tjorIdTipoJornada"]);
		if(trim($array["trbAfectoArt22"])<>"")$dato->set_data("trbAfectoArt22",$array["trbAfectoArt22"]);
		if(trim($array["trbAntiguedadMeses"])<>"")$dato->set_data("trbAntiguedadMeses",$array["trbAntiguedadMeses"]);
		if(trim($array["trbApMaterno"])<>"")$dato->set_data("trbApMaterno",$array["trbApMaterno"]);
		if(trim($array["trbApPaterno"])<>"")$dato->set_data("trbApPaterno",$array["trbApPaterno"]);
		if(trim($array["trbCeco"])<>"")$dato->set_data("trbCeco",$array["trbCeco"]);
		if(trim($array["trbDireccion"])<>"")$dato->set_data("trbDireccion",$array["trbDireccion"]);
		if(trim($array["trbEstado"])<>"")$dato->set_data("trbEstado",$array["trbEstado"]);
		if(trim($array["trbFechaContrato"])<>"")$dato->set_data("trbFechaContrato",$array["trbFechaContrato"]);
		if(trim($array["trbFechaCreacion"])<>"")$dato->set_data("trbFechaCreacion",$array["trbFechaCreacion"]);
		if(trim($array["trbFechaModificacion"])<>"")$dato->set_data("trbFechaModificacion",$array["trbFechaModificacion"]);
		if(trim($array["trbFechaNac"])<>"")$dato->set_data("trbFechaNac",$array["trbFechaNac"]);
		if(trim($array["trbHorasSemanales"])<>"")$dato->set_data("trbHorasSemanales",$array["trbHorasSemanales"]);
		if(trim($array["trbIngresoObraFecha"])<>"")$dato->set_data("trbIngresoObraFecha",$array["trbIngresoObraFecha"]);
		if(trim($array["trbNombre"])<>"")$dato->set_data("trbNombre",$array["trbNombre"]);
		if(trim($array["trbPensionado"])<>"")$dato->set_data("trbPensionado",$array["trbPensionado"]);
		if(trim($array["trbPerteneceSindicato"])<>"")$dato->set_data("trbPerteneceSindicato",$array["trbPerteneceSindicato"]);
		if(trim($array["trbRut"])<>"")$dato->set_data("trbRut",$array["trbRut"]);
		if(trim($array["trbRutJefe"])<>"")$dato->set_data("trbRutJefe",$array["trbRutJefe"]);
		if(trim($array["trbSeguroCesantia"])<>"")$dato->set_data("trbSeguroCesantia",$array["trbSeguroCesantia"]);
		if(trim($array["trbSexo"])<>"")$dato->set_data("trbSexo",$array["trbSexo"]);
		if(trim($array["trbTelefono"])<>"")$dato->set_data("trbTelefono",$array["trbTelefono"]);
		if(trim($array["trbTitulo"])<>"")$dato->set_data("trbTitulo",$array["trbTitulo"]);
		if(trim($array["trbUsuarioCreacion"])<>"")$dato->set_data("trbUsuarioCreacion",$array["trbUsuarioCreacion"]);
		if(trim($array["trbUsuarioModificacion"])<>"")$dato->set_data("trbUsuarioModificacion",$array["trbUsuarioModificacion"]);
		if(trim($array["trbVisa"])<>"")$dato->set_data("trbVisa",$array["trbVisa"]);

		$dato->set_data("activo","S");
		$dato->save();
	}

	public function getUsuario($id_usuario)
	{
		$dato = new Usuarios();
		$dato->add_filter("id_usuario","=",$id_usuario);
		$dato->load();
		
		return $dato;
	}
	
	public function getTrabajador($array)
	{
		$sql = " SELECT t.* ";
		$sql .= " FROM trabajador t ";
		$sql .= " WHERE t.activo = 'S' ";
		$sql .= " AND t.trbIdTrabajador = ".$array["id"];
	
		$idsql = consulta($sql);
	
		return mysql_fetch_array($idsql);
	}
	
	public function getDatosUsuario($array)
	{
		$dato = new Usuarios();
		$dato->add_filter("id_usuario","=",$array["idusuario"]);
		$dato->load();
		
		return $dato;
	}
		
	public function getListaTrabajador($array)
	{
		include("config.php");
		
		$sql = " SELECT t.trbIdTrabajador trbIdTrabajador, t.trbNombre trbNombre, t.trbApPaterno trbApPaterno, t.trbRut trbRut ";
		$sql .= " FROM trabajador t ";
		$sql .= " WHERE t.activo = 'S' ";
		
		if(trim($array["trbNombre"]) <> "")
		{
			$sql .= " and t.trbNombre LIKE '".trim($array["trbNombre"])."%'";
		}

		if(trim($array["trbApPaterno"]) <> "")
		{
			$sql .= " and t.trbApPaterno LIKE '".trim($array["trbApPaterno"])."%'";
		}
		
		$sql .= " ORDER BY t.trbApPaterno ";
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>