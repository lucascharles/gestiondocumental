<?php
class ConvenioColectivoModel extends ModelBase
{
	public function getListaConvenioColectivo($array)
	{
		include("config.php");
		
		$select = " c.id id, c.descripcion descripcion, c.rubro rubro, c.numero numero ";
		$from = " gc_convenio_colectivo c ";
		$where = " c.vigente = 'S' ";
		
		if(trim($array["descripcion"]) <> "")
		{
			$where .= " and c.descripcion LIKE '".trim($array["descripcion"])."%'";
		}
		if(trim($array["rubro"]) <> "")
		{
			$where .= " and c.rubro LIKE '".trim($array["rubro"])."%'";
		}

		$where .= " ORDER BY c.id ";
		
		$sqlpersonal = new SqlPersonalizado($config->get('dbhost'), $config->get('dbuser'), $config->get('dbpass') );
		$sqlpersonal->set_select($select); 
	  	$sqlpersonal->set_from($from);
		$sqlpersonal->set_where($where);
		$sqlpersonal->set_limit(($array["inicio"]*40),($array["inicio"]*40)+40); // PARA MYSQL
	
    	$sqlpersonal->load();
		$cant = $sqlpersonal->get_cant_registros();

		$result = array();
		$result[] = $sqlpersonal;
		$result[] = $cant;
		
    	return $result;	
	}
	
	
	public function grabar_datosConvenioColectivo($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Convenio_colectivo();
		if($tipop=="M")
		{
			$dato->add_filter("id","=",$array["id_convenio"]);
			$dato->load();
		}
		$dato->set_data("descripcion",$array["descripcion"]);
		$dato->set_data("rubro",$array["rubro"]);
		$dato->set_data("numero",$array["numero"]);
		$dato->set_data("vigente","S");
		$dato->save();
		$dato->load();
		
		return $dato;
	}	
	
	
	public function getConvenioColectivo($array)
	{
		$dato = new Convenio_colectivo();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}
	
	public function bajaConvenioColectivo($array)
	{
		$dato = new Convenio_colectivo();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		$dato->set_data("vigente","N");
		$dato->save();
	}
}
?>

