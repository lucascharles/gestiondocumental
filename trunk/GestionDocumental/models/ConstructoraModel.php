<?php
class ConstructoraModel extends ModelBase
{
	
	public function bajaRegistro($array)
	{
		$dato = new Constructora();
		$dato->add_filter("consIdConstructora","=",$array["id"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Constructora();
		if($tipop=="M")
		{
			$dato->add_filter("consIdConstructora","=",$array["id_usu"]);
			$dato->load();
		}
		
// autonumerico		if(trim($array["consIdConstructora"])<>"")$dato->set_data("consIdConstructora",$array["consIdConstructora"]);
		if(trim($array["consEmail"])<>"")$dato->set_data("consEmail",$array["consEmail"]);
		if(trim($array["consEstado"])<>"")$dato->set_data("consEstado",$array["consEstado"]);
		if(trim($array["consFechaCreacion"])<>"")$dato->set_data("consFechaCreacion",$array["consFechaCreacion"]);
		if(trim($array["consFechaModificacion"])<>"")$dato->set_data("consFechaModificacion",$array["consFechaModificacion"]);
		if(trim($array["consNombreFantasia"])<>"")$dato->set_data("consNombreFantasia",$array["consNombreFantasia"]);
		if(trim($array["consRazonSocial"])<>"")$dato->set_data("consRazonSocial",$array["consRazonSocial"]);
		if(trim($array["consRut"])<>"")$dato->set_data("consRut",$array["consRut"]);
		if(trim($array["consTelefono"])<>"")$dato->set_data("consTelefono",$array["consTelefono"]);
		if(trim($array["consTelefono2"])<>"")$dato->set_data("consTelefono2",$array["consTelefono2"]);
		if(trim($array["consTelefono3"])<>"")$dato->set_data("consTelefono3",$array["consTelefono3"]);
		if(trim($array["consUsuarioCreacion"])<>"")$dato->set_data("consUsuarioCreacion",$array["consUsuarioCreacion"]);
		if(trim($array["consUsuarioModificacion"])<>"")$dato->set_data("consUsuarioModificacion",$array["consUsuarioModificacion"]);
		if(trim($array["dirIdDireccion"])<>"")$dato->set_data("dirIdDireccion",$array["dirIdDireccion"]);
		if(trim($array["rplIdRepLegal"])<>"")$dato->set_data("rplIdRepLegal",$array["rplIdRepLegal"]);

		$dato->set_data("activo","S");
		$dato->save();
	}

	public function getConstructora($id_constructora)
	{
		$dato = new Constructora();
		$dato->add_filter("consIdConstructora","=",$id_constructora);
		$dato->load();
		
		return $dato;
	}
	

	public function getConstructoraIDint($array)
	{
		$dato = new Constructora();
		$dato->add_filter("consIdConstructora","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}
	
	public function getDatosConstructora($array)
	{
		$dato = new Constructora();
		$dato->add_filter("consIdConstructora","=",$array["idconstructora"]);
		$dato->load();
		
		return $dato;
	}
		
	public function getListaConstructora($param)
	{
		include("config.php");
		
		$sql = " SELECT c.consIdConstructora consIdConstructora, c.consNombreFantasia consNombreFantasia, c.consRazonSocial consRazonSocial, c.consRut consRut ";
		$sql .= " FROM constructora c ";
		$sql .= " WHERE c.activo = 'S' ";
		
		if(trim($param["consRazonSocial"]) <> "")
		{
			$sql .= " and c.consRazonSocial LIKE '".trim($param["consRazonSocial"])."%'";
		}

		if(trim($param["consRut"]) <> "")
		{
			$sql .= " and c.consRut LIKE '".trim($param["consRut"])."%'";
		}
		
		$sql .= " ORDER BY c.consRazonSocial ";
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>