<?php
class InformeModel extends ModelBase
{
	public function get_informe_alarmas($array)
	{
		$sql = " SELECT a.id id, a.fecha, d.descripcion dispositivo, m.descripcion modalidad, e.descripcion estado ";
		$sql .= " FROM si_alertas a, si_dispositivo d ";
		$sql .= " left join si_estado_dispositivo e on (d.id_estado_dispositivo = e.id) ";
		$sql .= " , si_configuracion_dispositivo c ";
		$sql .= " left join si_modo_camara m on (c.id_modo_camara = m.id) ";
		$sql .= " WHERE a.estado = 'S'";
		$sql .= " and a.id_dispositivo = d.id ";
		$sql .= " and c.id_dispositivo = d.id ";
		

		if(trim($array["fecha_desde"]) <> "")
		{
			$sql .= " AND a.fecha >= '".formatoFecha($array["fecha_desde"],"dd/mm/yyyy","yyyy-mm-dd")."'";
		}
		if(trim($array["fecha_hasta"]) <> "")
		{
			$sql .= " AND a.fecha <= '".formatoFecha($array["fecha_hasta"],"dd/mm/yyyy","yyyy-mm-dd")."'";
		}
		if(trim($array["descripcion"]) <> "")
		{
			$sql .= " AND d.descripcion LIKE '%".$array["descripcion"]."%'";
		}
		if(trim($array["id_modo_camara"]) <> "")
		{
			$sql .= " AND c.id_modo_camara = ".$array["id_modo_camara"];
		}
		if(trim($array["id_estado_dispositivo"]) <> "")
		{
			$sql .= " AND d.id_estado_dispositivo = ".$array["id_estado_dispositivo"];
		}
		$sql .= " ORDER BY a.fecha DESC ";
		
		//echo("<br>sql: ".$sql);
		$idsql = consulta($sql);
		
		return $idsql;
	}	
	

	
}
?>

