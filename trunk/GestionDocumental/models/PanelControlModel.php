<?php
class PanelControlModel extends ModelBase
{
	public function getDispositivosSeccion($array)
	{
		include("config.php");
		
		$sql = " select d.direccion_ip direccion_ip, ds.id_dispositivo id_dispositivo, d.descripcion des_dispositivo, ds.coordx, ds.coordy, e.descripcion estado_disp, m.descripcion modo_disp ";
		$sql .= " from si_dispositivo_seccion ds, si_dispositivo d, si_configuracion_dispositivo c, si_modo_camara m,  si_estado_dispositivo e ";
		$sql .= " where ";
		$sql .= " ds.id_dispositivo = d.id and ds.id_seccion = ".$array["id_secc"];
		$sql .= " and c.id_dispositivo = d.id ";
		$sql .= " and c.id_modo_camara =  m.id ";
		$sql .= " and d.id_estado_dispositivo = e.id ";
		$sql .= " order by ds.id_dispositivo ";
		//echo("<br>".$sql);
		$idsql = consulta($sql);
			
		$result = array();
			
		while($rs=mysql_fetch_array($idsql))
		{
			$detalle = array();
			$detalle["descripcion"] = $rs["des_dispositivo"];
			$detalle["direccion_ip"] = $rs["direccion_ip"];
			$detalle["id"] = $rs["id_dispositivo"];
			$detalle["coordx"] = $rs["coordx"];
			$detalle["coordy"] = $rs["coordy"];
			$detalle["estado_disp"] = $rs["estado_disp"];
			$detalle["modo_disp"] = $rs["modo_disp"];
				
			$result[] = $detalle;
		}
			
    	return $result;	
	}
	
	public function getSeccion($array)
	{
		$dato = new Seccion();
		$dato->add_filter("id","=",$array["id_secc"]);
		$dato->load();
		
    	return $dato;
	}
	
	public function getLayout($array)
	{		
		$dato = new Usuario_layout();
		$dato->add_filter("id_usuario","=",$array["id_usuario"]);
		$dato->load();
		
		$lay = new Layout();
		$lay->add_filter("id","=",$dato->get_data("id_layout"));
		$lay->load();
		
    	return $lay;	
	}
	
	public function getInfoSeccionesLayout($array)
	{
		include("config.php");
		
		$sql = " select s.id id_seccion, count(d.id) cant_disp, sum(if(d.id_estado_dispositivo=1,1,0)) cant_act, sum(if(d.id_estado_dispositivo=2,1,0)) cant_inac   ";
		$sql .= " from si_layout l, si_seccion_layout s, si_dispositivo_seccion ds, si_dispositivo d, si_usuario_layout u   ";
		$sql .= " where l.estado = 'S' ";
		$sql .= " and u.id_layout = l.id ";
		$sql .= " and u.id_usuario = '".$array["id_usuario"]."' ";
		$sql .= " and l.id = s.id_layout and s.id = ds.id_seccion and ds.id_dispositivo = d.id ";
		$sql .= " group by id_seccion ";
		$sql .= " order by s.id ";
		//echo("<br>sql: ".$sql);
		$idsql = consulta($sql);
			
		$result = array();
			
		while($rs=mysql_fetch_array($idsql))
		{
			$detalle = array();
			$detalle["id_seccion"] = $rs["id_seccion"];
			$detalle["cant_disp"] = $rs["cant_disp"];
			$detalle["cant_act"] = $rs["cant_act"];
			$detalle["cant_inac"] = $rs["cant_inac"];
				
			$result[] = $detalle;
		}
			
    	return $result;	
	}
	
	public function getSeccionesLayout($array)
	{
		include("config.php");
		
		$sql = " select s.id id_seccion, s.descripcion des_seccion, s.coordx , s.coordy ";
		$sql .= " from si_layout l, si_seccion_layout s, si_dispositivo_seccion ds, si_dispositivo d, si_usuario_layout u   ";
		$sql .= " where l.estado = 'S' ";
		$sql .= " and u.id_layout = l.id ";
		$sql .= " and u.id_usuario = '".$array["id_usuario"]."' ";
		$sql .= " and l.id = s.id_layout and s.id = ds.id_seccion and ds.id_dispositivo = d.id ";
		$sql .= " order by s.id ";

		$idsql = consulta($sql);
			
		$result = array();
			
		while($rs=mysql_fetch_array($idsql))
		{
			$detalle = array();
			$detalle["descripcion"] = $rs["des_seccion"];
			$detalle["id"] = $rs["id_seccion"];
			$detalle["coordx"] = $rs["coordx"];
			$detalle["coordy"] = $rs["coordy"];
				
			$result[] = $detalle;
		}
			
    	return $result;	
	}
	
	public function getAlertas($array)
	{
		include("config.php");
		
		$fechaHoy = date("Y-m-d");
		$dias = 30;
		$calculoPasado = strtotime("$fechaHoy -$dias days");
		$fecha_desde = date("Y-m-d", $calculoPasado);
			
		$sql = " select ta.id, ta.descripcion, count(a.id) cant, MAX(a.fecha) fecha  ";
		$sql .= " from si_tipo_alertas ta left join si_alertas a on( a.id_tipo_alerta = ta.id and a.fecha > '".$fecha_desde."' )  ";
		$sql .= " where ta.estado = 'S' ";
		$sql .= " group by ta.id, ta.descripcion  ";

		$idsql = consulta($sql);
			
		$result = array();
			
		while($rs=mysql_fetch_array($idsql))
		{
			$detalle = array();
			$detalle[] = $rs["descripcion"];
			$detalle[] = $rs["cant"];
			$detalle[] =  formatoFecha($rs["fecha"],"yyyy-mm-dd","dd/mm/yyyy");
				
			$result[] = $detalle;
		}
			
    	return $result;	
	}
	
	public function getEstado_dispositivos($array)
	{
		include("config.php");
		
		$sql = " select ed.id, ed.descripcion, count(d.id) cant ";
		$sql .= " from si_estado_dispositivo ed left join si_dispositivo d on( d.id_estado_dispositivo = ed.id ) ";
		$sql .= " where ed.estado = 'S'";
		$sql .= " group by ed.id, ed.descripcion ";
		
		$idsql = consulta($sql);
			
		$result = array();
			
		while($rs=mysql_fetch_array($idsql))
		{
			$detalle = array();
			$detalle[] = $rs["descripcion"];
			$detalle[] = $rs["cant"];
				
			$result[] = $detalle;
		}
			
    	return $result;	
	}
	
	public function getCargapanel($array)
	{
		include("config.php");
		
		$sql = " select ventana, cuadrante, contenido, tipo_carga ";
		$sql .= " from si_panel_control ";
		$sql .= " where usuario = '".$array["idusuario"]."'";
		
		$idsql = consulta($sql);
			
		$result = array();
			
		while($rs=mysql_fetch_array($idsql))
		{
			$detalle = array();
			$detalle[] = $rs["ventana"];
			$detalle[] = $rs["cuadrante"];
			$detalle[] = $rs["contenido"];
			$detalle[] = $rs["tipo_carga"];
				
			$result[] = $detalle;
		}
			
    	return $result;	
	}
	
	
	public function guardaPosicion($array)
	{
		$dato = new Panel_control();
		$dato->add_filter("usuario","=",$array["idusuario"]);
		$dato->add_filter("AND");
		$dato->add_filter("ventana","=",$array["ventana_a"]);
		$dato->load();
		$dato->set_data("cuadrante",$array["cuadrante_a"]);
		$dato->save();
		
		$dato_b = new Panel_control();
		$dato_b->add_filter("usuario","=",$array["idusuario"]);
		$dato_b->add_filter("AND");
		$dato_b->add_filter("ventana","=",$array["ventana_b"]);
		$dato_b->load();
		$dato_b->set_data("cuadrante",$array["cuadrante_b"]);
		$dato_b->save();
		
	}	
	
	
}
?>