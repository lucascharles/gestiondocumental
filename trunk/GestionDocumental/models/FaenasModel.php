<?php
class FaenasModel extends ModelBase
{
	
	public function bajaRegistro($array)
	{
		$dato = new Faenas();
		$dato->add_filter("faeIdFaenas","=",$array["faeIdFaenas"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Faenas();
		if($tipop=="M")
		{
			$dato->add_filter("faeIdFaenas","=",$array["faeIdFaenas"]);
			$dato->load();
		}
		
// 		var_dump($array);
		// autoincremental		if(trim($array["faeIdFaenas"])<>"")$dato->set_data("faeIdFaenas",$array["faeIdFaenas"]);
		if(trim($array["consIdConstructora"])<>"")$dato->set_data("consIdConstructora",$array["consIdConstructora"]);
		if(trim($array["dirIdDireccion"])<>"")$dato->set_data("dirIdDireccion",$array["dirIdDireccion"]);
		if(trim($array["faeEstado"])<>"")$dato->set_data("faeEstado",$array["faeEstado"]);
		if(trim($array["faeFechaCreacion"])<>"")$dato->set_data("faeFechaCreacion",formatoFecha($array["faeFechaCreacion"],"dd/mm/yyyy","yyyy-mm-dd"));
		if(trim($array["faeFechaInicio"])<>"")$dato->set_data("faeFechaInicio",formatoFecha($array["faeFechaInicio"],"dd/mm/yyyy","yyyy-mm-dd"));
		
		if(trim($array["faeFechaModificacion"])<>"")$dato->set_data("faeFechaModificacion",formatoFecha($array["faeFechaModificacion"],"dd/mm/yyyy","yyyy-mm-dd"));
		if(trim($array["faeFechaTermino"])<>"")$dato->set_data("faeFechaTermino",formatoFecha($array["faeFechaTermino"],"dd/mm/yyyy","yyyy-mm-dd"));
		if(trim($array["faeIdFaenaPadre"])<>"")$dato->set_data("faeIdFaenaPadre",$array["faeIdFaenaPadre"]);
		if(trim($array["faeNombre"])<>"")$dato->set_data("faeNombre",$array["faeNombre"]);
		if(trim($array["faeResponsable"])<>"")$dato->set_data("faeResponsable",$array["faeResponsable"]);
		if(trim($array["faeTelefono"])<>"")$dato->set_data("faeTelefono",$array["faeTelefono"]);
		if(trim($array["faeUsuarioCreacion"])<>"")$dato->set_data("faeUsuarioCreacion",$array["faeUsuarioCreacion"]);
		if(trim($array["faeUsuarioModificacion"])<>"")$dato->set_data("faeUsuarioModificacion",$array["faeUsuarioModificacion"]);

		$dato->set_data("activo","S");
		$dato->save();
	}

	public function getFaena($param)
	{
		$sql = " SELECT * FROM faena WHERE faeIdFaenas = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
	public function getDatosFaenas($array)
	{
		$dato = new Faenas();
		$dato->add_filter("faeIdFaenas","=",$array["faeIdFaenas"]);
		$dato->load();
		
		return $dato;
	}
		
	public function getListaFaenas($param)
	{
		include("config.php");
		
		$sql .= " SELECT f.faeIdFaenas id, f.consIdConstructora consIdConstructora,f.dirIdDireccion dirIdDireccion, f.faeEstado faeEstado, f.faeFechaInicio faeFechaInicio,f.faeFechaTermino faeFechaTermino, f.faeIdFaenaPadre faeIdFaenaPadre,f.faeNombre faeNombre, f.faeResponsable faeResponsable,f.faeTelefono faeTelefono ";
		$sql .= " FROM faena f ";
		if($param["id_empresa"] > 0) $sql .= " , faenasxcontratista fc ";
		$sql .= " WHERE f.activo = 'S' ";
		
		if(trim($param["faeNombre"]) <> "")
		{
			$sql .= " and f.faeNombre LIKE '".trim($param["faeNombre"])."%'";
		}
		if(trim($param["faeResponsable"]) <> "")
		{
			$sql .= " and f.faeResponsable LIKE '".trim($param["faeResponsable"])."%'";
		}
		
		if($param["id_empresa"] > 0)  $sql .= " AND f.faeIdFaenas = fc.id_faena  AND fc.fxcIdContratistaPadre = ".$param["id_empresa"];
		
		$sql .= " ORDER BY f.faeNombre ";

		$result = consulta($sql);
		
    	return $result;	
	}
}
?>