<?php
class ContratistaModel extends ModelBase
{
	public function getContratista($param)
	{
		$sql = " SELECT c.*, CONCAT(d.dirCalle,' ',d.dirNumero,' ',d.dirEstado) direccion ";
		$sql .= " FROM contratista c LEFT JOIN direccion d ON (c.ctrIdContratista = d.dirIdDireccion and d.activo = 'S') ";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " AND ctrIdContratista = ".$param["id"];
 		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
	public function getFaenasContratista($param)
	{
		$sql = " SELECT f.* ";
		$sql .= " FROM faenasxcontratista fc, faena f ";
		$sql .= " WHERE f.activo = 'S' ";
		$sql .= " AND fc.id_faena = f.faeIdFaenas ";
		$sql .= " AND fc.fxcIdContratistaPadre = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function bajaRegistro($array)
	{
		$dato = new Contratista();
		$dato->add_filter("ctrIdContratista","=",$array["id"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Contratista();
		if($tipop=="M")
		{
			$dato->add_filter("ctrIdContratista","=",$array["id_usu"]);
			$dato->load();
		}
		
//autonumerico		if(trim($array["ctrIdContratista"])<>"")$dato->set_data("ctrIdContratista",$array["ctrIdContratista"]);
		if(trim($array["ccatIdAfiliado"])<>"")$dato->set_data("ccatIdAfiliado",$array["ccatIdAfiliado"]);
		if(trim($array["ctrEmail"])<>"")$dato->set_data("ctrEmail",$array["ctrEmail"]);
		if(trim($array["ctrEmailExpertoMutualidad"])<>"")$dato->set_data("ctrEmailExpertoMutualidad",$array["ctrEmailExpertoMutualidad"]);
		if(trim($array["ctrEstado"])<>"")$dato->set_data("ctrEstado",$array["ctrEstado"]);
		if(trim($array["ctrFechaCreacion"])<>"")$dato->set_data("ctrFechaCreacion",$array["ctrFechaCreacion"]);
		if(trim($array["ctrFechaModificacion"])<>"")$dato->set_data("ctrFechaModificacion",$array["ctrFechaModificacion"]);
		if(trim($array["ctrFonoExpertoMutualidad"])<>"")$dato->set_data("ctrFonoExpertoMutualidad",$array["ctrFonoExpertoMutualidad"]);
		if(trim($array["ctrIdAfiliadoMutualidad"])<>"")$dato->set_data("ctrIdAfiliadoMutualidad",$array["ctrIdAfiliadoMutualidad"]);
		if(trim($array["ctrIdServicioContratado"])<>"")$dato->set_data("ctrIdServicioContratado",$array["ctrIdServicioContratado"]);
		if(trim($array["ctrIngresoFaena"])<>"")$dato->set_data("ctrIngresoFaena",$array["ctrIngresoFaena"]);
		if(trim($array["ctrNombreExpertoMutualidad"])<>"")$dato->set_data("ctrNombreExpertoMutualidad",$array["ctrNombreExpertoMutualidad"]);
		if(trim($array["ctrNombreFantasia"])<>"")$dato->set_data("ctrNombreFantasia",$array["ctrNombreFantasia"]);
		if(trim($array["ctrNroActividadCab"])<>"")$dato->set_data("ctrNroActividadCab",$array["ctrNroActividadCab"]);
		if(trim($array["ctrNroActividadDet"])<>"")$dato->set_data("ctrNroActividadDet",$array["ctrNroActividadDet"]);
		if(trim($array["ctrRazonSocial"])<>"")$dato->set_data("ctrRazonSocial",$array["ctrRazonSocial"]);
		if(trim($array["ctrRut"])<>"")$dato->set_data("ctrRut",$array["ctrRut"]);
		if(trim($array["ctrTasaCotizacionActual"])<>"")$dato->set_data("ctrTasaCotizacionActual",$array["ctrTasaCotizacionActual"]);
		if(trim($array["ctrTasaCotizacionTotal"])<>"")$dato->set_data("ctrTasaCotizacionTotal",$array["ctrTasaCotizacionTotal"]);
		if(trim($array["ctrTasaGenerica"])<>"")$dato->set_data("ctrTasaGenerica",$array["ctrTasaGenerica"]);
		if(trim($array["ctrTelefono"])<>"")$dato->set_data("ctrTelefono",$array["ctrTelefono"]);
		if(trim($array["ctrTelefono2"])<>"")$dato->set_data("ctrTelefono2",$array["ctrTelefono2"]);
		if(trim($array["ctrTelefono3"])<>"")$dato->set_data("ctrTelefono3",$array["ctrTelefono3"]);
		if(trim($array["ctrUsuarioCreacion"])<>"")$dato->set_data("ctrUsuarioCreacion",$array["ctrUsuarioCreacion"]);
		if(trim($array["ctrUsuarioModificacion"])<>"")$dato->set_data("ctrUsuarioModificacion",$array["ctrUsuarioModificacion"]);
		if(trim($array["dirIdDirecion"])<>"")$dato->set_data("dirIdDirecion",$array["dirIdDirecion"]);
		if(trim($array["mutIdMutualidad"])<>"")$dato->set_data("mutIdMutualidad",$array["mutIdMutualidad"]);
		if(trim($array["rplIdRepLegal"])<>"")$dato->set_data("rplIdRepLegal",$array["rplIdRepLegal"]);
		if(trim($array["tjor_idTipoJornada"])<>"")$dato->set_data("tjor_idTipoJornada",$array["tjor_idTipoJornada"]);

		$dato->set_data("activo","S");
		$dato->save();
	}

	
	
		
	public function getListaContratistas($param)
	{
		include("config.php");
		
		$sql = " SELECT c.ctrIdContratista ctrIdContratista, c.ctrRazonSocial ctrRazonSocial, c.ctrRut ctrRut, c.ctrNombreFantasia ctrNombreFantasia ";
		$sql .= " FROM contratista c ";
		$sql .= " WHERE c.activo = 'S' ";
		
		if(trim($param["ctrRazonSocial"]) <> "")
		{
			$sql .= " and c.ctrRazonSocial LIKE '".trim($param["ctrRazonSocial"])."%'";
		}

		if(trim($param["ctrRut"]) <> "")
		{
			$sql .= " and c.ctrRut LIKE '".trim($param["ctrRut"])."%'";
		}
		
		$sql .= " ORDER BY c.ctrRazonSocial ";
		
		$result = consulta($sql);
				
    	return $result;	
	}

	
	

}
?>