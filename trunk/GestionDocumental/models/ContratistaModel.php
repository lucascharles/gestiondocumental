<?php
class ContratistaModel extends ModelBase
{
	
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

	public function getContratista($id_contratista)
	{
		$dato = new Contratista();
		$dato->add_filter("ctrIdContratista","=",$id_contratista);
		$dato->load();
		
		return $dato;
	}
	

	public function getContratistaIDint($array)
	{
		$dato = new Contratista();
		$dato->add_filter("ctrIdContratista","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}
	
	public function getDatosContratista($array)
	{
		$dato = new Contratista();
		$dato->add_filter("ctrIdContratista","=",$array["idcontratista"]);
		$dato->load();
		
		return $dato;
	}
		
	public function getListaContratistas($array)
	{
		include("config.php");
		
		$select = " c.ctrIdContratista ctrIdContratista, c.ctrRazonSocial ctrRazonSocial, c.ctrRut ctrRut, c.ctrNombreFantasia ctrNombreFantasia ";
		$from = " contratista c ";
		$where = " c.activo = 'S' ";
		
		if(trim($array["ctrRazonSocial"]) <> "")
		{
			$where .= " and c.ctrRazonSocial LIKE '".trim($array["ctrRazonSocial"])."%'";
		}

		if(trim($array["ctrRut"]) <> "")
		{
			$where .= " and c.ctrRut LIKE '".trim($array["ctrRut"])."%'";
		}
		
		$where .= " ORDER BY c.ctrRazonSocial ";
		
		$sqlpersonal = new SqlPersonalizado($config->get('dbhost'), $config->get('dbuser'), $config->get('dbpass') );
		$sqlpersonal->set_select($select); 
	  	$sqlpersonal->set_from($from);
		$sqlpersonal->set_where($where);
		if(!($array["all_rows"] == "S"))
		{
			$sqlpersonal->set_limit(($array["inicio"]*40),($array["inicio"]*40)+40); // PARA MYSQL
		}
	
    	$sqlpersonal->load();
		$cant = $sqlpersonal->get_cant_registros();
		
		$result = array();
		$result[] = $sqlpersonal;
		$result[] = $cant;
		
    	return $result;	
	}

	
	

}
?>