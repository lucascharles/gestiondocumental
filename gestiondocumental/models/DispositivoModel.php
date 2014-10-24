<?php
class DispositivoModel extends ModelBase
{
	public function getConfiguracionDispositivo($array)
	{
		$dato = new ConfiguracionDispositivo();
		$dato->add_filter("id_dispositivo","=",$array["id"]);
		$dato->load();

		return $dato;
	}
	
	public function bajaRegistro($array)
	{
		$dato = new Dispositivo();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		$dato->set_data("estado","N");
		$dato->save();
	}
	
	public function grabar_datosFormConfigurar($array)
	{
		echo("<br> si que si: ".$array["id_dispositivo"]);	
		$dato = new ConfiguracionDispositivo();
		$dato->add_filter("id_dispositivo","=",$array["id_dispositivo"]);
		$dato->load();			
		if(is_null($dato->get_data("id")))
		{
			echo("<br> no existe: ");	
			$dato_n = new ConfiguracionDispositivo();
			$dato_n->set_data("id_dispositivo",$array["id_dispositivo"]);
			if(trim($array["ubicacion"])<>"")$dato_n->set_data("ubicacion",$array["ubicacion"]);
			if(trim($array["posicion_relativa"])<>"")$dato_n->set_data("posicion_relativa",$array["posicion_relativa"]);
			if(trim($array["altura"])<>"")$dato_n->set_data("altura",$array["altura"]);
			if(trim($array["id_modo_camara"])<>"")$dato_n->set_data("id_modo_camara",$array["id_modo_camara"]);
			if(trim($array["id_tipo_alerta"])<>"")$dato_n->set_data("id_tipo_alerta",$array["id_tipo_alerta"]);
			if(trim($array["sensibilidad"])<>"")$dato_n->set_data("sensibilidad",$array["sensibilidad"]);
			$dato_n->set_data("estado","S");
			$dato_n->save();
		}
		else
		{
			if(trim($array["ubicacion"])<>"")$dato->set_data("ubicacion",$array["ubicacion"]);
			if(trim($array["posicion_relativa"])<>"")$dato->set_data("posicion_relativa",$array["posicion_relativa"]);
			if(trim($array["altura"])<>"")$dato->set_data("altura",$array["altura"]);
			if(trim($array["id_modo_camara"])<>"")$dato->set_data("id_modo_camara",$array["id_modo_camara"]);
			if(trim($array["id_tipo_alerta"])<>"")$dato->set_data("id_tipo_alerta",$array["id_tipo_alerta"]);
			if(trim($array["sensibilidad"])<>"")$dato->set_data("sensibilidad",$array["sensibilidad"]);
			$dato->set_data("estado","S");
			$dato->save();
		}
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		$dato = new Dispositivo();
		if($tipop=="M")
		{
			$dato->add_filter("id","=",$array["id_dispositivo"]);
			$dato->load();
		}
				
		if(trim($array["descripcion"])<>"")$dato->set_data("descripcion",$array["descripcion"]);
		if(trim($array["direccionip"])<>"")$dato->set_data("direccion_ip",$array["direccionip"]);
		if(trim($array["id_tipo_dispositivo"])<>"")$dato->set_data("id_tipo_dispositivo",$array["id_tipo_dispositivo"]);
		if(trim($array["id_estado_dispositivo"])<>"")$dato->set_data("id_estado_dispositivo",$array["id_estado_dispositivo"]);
		if(trim($array["marca"])<>"")$dato->set_data("marca",$array["marca"]);
		if(trim($array["modelo"])<>"")$dato->set_data("modelo",$array["modelo"]);
		if(trim($array["nro_serie"])<>"")$dato->set_data("nro_serie",$array["nro_serie"]);
		$dato->set_data("estado","S");
		$dato->save();
	}

	public function getDispositivo($array)
	{
		$dato = new Dispositivo();
		$dato->add_filter("id","=",$array["id"]);
		$dato->load();
		
		return $dato;
	}

	public function getListaDispositivo($array)
	{
		include("config.php");
		
		$select = " d.direccion_ip direccion_ip, d.id id, d.descripcion descripcion, td.descripcion tipo_dispositivo, ed.descripcion estado_dispositivo, d.marca marca, d.modelo modelo, d.nro_serie nro_serie ";
		$from = " si_dispositivo d left join si_tipo_dispositivo td on (td.id = d.id_tipo_dispositivo)";
		$from .= " left join si_estado_dispositivo ed on (ed.id = d.id_estado_dispositivo)";
		
		$where = " d.estado = 'S' ";
		
		if(trim($array["descripcion"]) <> "")
		{
			$where .= " and d.descripcion LIKE '".trim($array["descripcion"])."%'";
		}
		if(trim($array["id_tipo_dispositivo"]) <> "")
		{
			$where .= " and d.id_tipo_dispositivo = ".trim($array["id_tipo_dispositivo"]);
		}
		if(trim($array["id_estado_dispositivo"]) <> "")
		{
			$where .= " and d.id_estado_dispositivo = ".trim($array["id_estado_dispositivo"]);
		}
	
		$where .= " ORDER BY d.descripcion ";
		
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