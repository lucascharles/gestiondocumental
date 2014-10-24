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
echo($array["tipop"]);
echo($array["faeIdFaenas"]);
echo($array["consIdConstructora"]);
exit;
// autoincremental		if(trim($array["faeIdFaenas"])<>"")$dato->set_data("faeIdFaenas",$array["faeIdFaenas"]);
		if(trim($array["consIdConstructora"])<>"")$dato->set_data("consIdConstructora",$array["consIdConstructora"]);
		if(trim($array["dirIdDireccion"])<>"")$dato->set_data("dirIdDireccion",$array["dirIdDireccion"]);
		if(trim($array["faeEstado"])<>"")$dato->set_data("faeEstado",$array["faeEstado"]);
		if(trim($array["faeFechaCreacion"])<>"")$dato->set_data("faeFechaCreacion",$array["faeFechaCreacion"]);
		if(trim($array["faeFechaInicio"])<>"")$dato->set_data("faeFechaInicio",$array["faeFechaInicio"]);
		if(trim($array["faeFechaModificacion"])<>"")$dato->set_data("faeFechaModificacion",$array["faeFechaModificacion"]);
		if(trim($array["faeFechaTermino"])<>"")$dato->set_data("faeFechaTermino",$array["faeFechaTermino"]);
		if(trim($array["faeIdFaenaPadre"])<>"")$dato->set_data("faeIdFaenaPadre",$array["faeIdFaenaPadre"]);
		if(trim($array["faeNombre"])<>"")$dato->set_data("faeNombre",$array["faeNombre"]);
		if(trim($array["faeResponsable"])<>"")$dato->set_data("faeResponsable",$array["faeResponsable"]);
		if(trim($array["faeTelefono"])<>"")$dato->set_data("faeTelefono",$array["faeTelefono"]);
		if(trim($array["faeUsuarioCreacion"])<>"")$dato->set_data("faeUsuarioCreacion",$array["faeUsuarioCreacion"]);
		if(trim($array["faeUsuarioModificacion"])<>"")$dato->set_data("faeUsuarioModificacion",$array["faeUsuarioModificacion"]);

		$dato->set_data("activo","S");
		$dato->save();
	}

	public function getFaena($id_faena)
	{
		$dato = new Faenas();
		$dato->add_filter("faeIdFaenas","=",$id_faena);
		$dato->load();
		
		return $dato;
	}
	

	public function getFaenaIDint($array)
	{
		$dato = new Faenas();
		$dato->add_filter("faeIdFaenas","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}
	
	public function getDatosFaenas($array)
	{
		$dato = new Faenas();
		$dato->add_filter("faeIdFaenas","=",$array["faeIdFaenas"]);
		$dato->load();
		
		return $dato;
	}
		
	public function getListaFaenas($array)
	{
		include("config.php");
		
		$select = "  f.faeIdFaenas id, f.consIdConstructora consIdConstructora,f.dirIdDireccion dirIdDireccion, f.faeEstado faeEstado,f.faeFechaCreacion faeFechaCreacion, f.faeFechaInicio faeFechaInicio,f.faeFechaTermino faeFechaTermino, f.faeIdFaenaPadre faeIdFaenaPadre,f.faeNombre faeNombre, f.faeResponsable faeResponsable,f.faeTelefono faeTelefono ";
		$from = " faena f ";
		$where = " f.activo = 'S' ";
		
		if(trim($array["faeNombre"]) <> "")
		{
			$where .= " and f.faeNombre LIKE '".trim($array["faeNombre"])."%'";
		}
		
		$where .= " ORDER BY f.faeNombre ";

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