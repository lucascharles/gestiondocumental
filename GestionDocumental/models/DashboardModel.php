<?php
class DashboardModel extends ModelBase
{
	
	public function getListaConstructoras($array)
	{
		include("config.php");
		
		$sql = " SELECT c.consIdConstructora consIdConstructora, c.consNombreFantasia consNombreFantasia, c.consRazonSocial consRazonSocial, c.consRut consRut ";
		$sql .= " FROM constructora c ";
		$sql .= " WHERE c.activo = 'S' ";
		
		if(trim($array["consRazonSocial"]) <> "")
		{
			$sql .= " and c.consRazonSocial LIKE '".trim($array["consRazonSocial"])."%'";
		}

		if(trim($array["consRut"]) <> "")
		{
			$sql .= " and c.consRut LIKE '".trim($array["consRut"])."%'";
		}
		
		$sql .= " ORDER BY c.consRazonSocial ";
		
		$result = consulta($sql);

// 		echo("paso");
// 		exit;
		
    	return $result;	
	}

	
	public function getListaEstadoContratistas($array)
	{
		include("config.php");
	
		$sql .= " SELECT ";
		$sql .= " pivot.ctrIdContratista,pivot.ctrRazonSocial , pivot.ctrRut , pivot.ctrNombreFantasia, pivot.consNombreFantasia, ";
		$sql .= " COALESCE(tipo1.estado, 1) AS tipo1, ";
		$sql .= " COALESCE(tipo2.estado, 1) AS tipo2, ";
		$sql .= " COALESCE(tipo3.estado, 1) AS tipo3, ";
		$sql .= " COALESCE(tipo4.estado, 1) AS tipo4, ";
	    $sql .= " COALESCE(tipo5.estado, 1) AS tipo5 ";
		$sql .= " FROM (SELECT cont.ctrIdContratista,cont.ctrRazonSocial , cont.ctrRut , cont.ctrNombreFantasia, cons.consNombreFantasia FROM contratista cont,constructora cons WHERE cont.consIdConstructora = cons.consIdConstructora ";
		if($array["id_empresa"] != ""){
			$sql .= " AND cons.consIdConstructora = ".$array["id_empresa"];
		}
		$sql .= " ) AS pivot ";
		$sql .= " LEFT JOIN ";
		$sql .= " ( ";
		$sql .= " 	SELECT c.ctrIdContratista ,c.ctrRazonSocial , c.ctrRut ";
		$sql .= " 		, c.ctrNombreFantasia , MIN(dt.id_estado_documento) estado ";
		$sql .= " 		FROM contratista c LEFT JOIN documentotrabajador dt ON c.ctrIdContratista = dt.id_contratista, documentos d ";
		$sql .= " 		WHERE dt.doctIdDocumento = d.id_documentotrabajador ";
		$sql .= " 		AND EXTRACT(YEAR FROM d.doctFechaPertenece) = ".$array["periodo"];
		$sql .= " 		AND dt.tpdIdTipoDocumento = 1 ";
		$sql .= " 		AND c.activo = 'S' ";
		$sql .= " 		GROUP BY c.ctrIdContratista, c.ctrRazonSocial, c.ctrRut, c.ctrNombreFantasia ";
		$sql .= " ) AS tipo1 ON (tipo1.ctrIdContratista = pivot.ctrIdContratista) ";
		$sql .= " LEFT JOIN ";
		$sql .= " ( ";
		$sql .= " 		SELECT c.ctrIdContratista ,c.ctrRazonSocial , c.ctrRut ";
		$sql .= " 		, c.ctrNombreFantasia , MIN(dt.id_estado_documento) estado ";
		$sql .= " 		FROM contratista c LEFT JOIN documentotrabajador dt ON c.ctrIdContratista = dt.id_contratista, documentos d ";
		$sql .= " 		WHERE dt.doctIdDocumento = d.id_documentotrabajador ";
		$sql .= " 		AND EXTRACT(YEAR FROM d.doctFechaPertenece) = ".$array["periodo"];
		$sql .= " 		AND dt.tpdIdTipoDocumento = 2 ";
		$sql .= " 		AND c.activo = 'S' ";
		$sql .= " 		GROUP BY c.ctrIdContratista, c.ctrRazonSocial, c.ctrRut, c.ctrNombreFantasia ";
		$sql .= " ) AS tipo2 ON (tipo2.ctrIdContratista = pivot.ctrIdContratista) ";
		$sql .= " LEFT JOIN ( ";
		$sql .= " 		SELECT c.ctrIdContratista ,c.ctrRazonSocial , c.ctrRut ";
		$sql .= " 		, c.ctrNombreFantasia , MIN(dt.id_estado_documento) estado ";
		$sql .= " 		FROM contratista c LEFT JOIN documentotrabajador dt ON c.ctrIdContratista = dt.id_contratista, documentos d ";
		$sql .= " 		WHERE dt.doctIdDocumento = d.id_documentotrabajador ";
		$sql .= " 		AND EXTRACT(YEAR FROM d.doctFechaPertenece) = ".$array["periodo"];
		$sql .= " 		AND dt.tpdIdTipoDocumento = 3 ";
		$sql .= " 		AND c.activo = 'S' ";
		$sql .= " 		GROUP BY c.ctrIdContratista, c.ctrRazonSocial, c.ctrRut, c.ctrNombreFantasia ";
		$sql .= " ) AS tipo3 ON (tipo3.ctrIdContratista = pivot.ctrIdContratista) ";
		$sql .= " LEFT JOIN ( ";
		$sql .= " 		SELECT c.ctrIdContratista ,c.ctrRazonSocial , c.ctrRut ";
		$sql .= " 		, c.ctrNombreFantasia , MIN(dt.id_estado_documento) estado ";
		$sql .= " 		FROM contratista c LEFT JOIN documentotrabajador dt ON c.ctrIdContratista = dt.id_contratista, documentos d ";
		$sql .= " 		WHERE dt.doctIdDocumento = d.id_documentotrabajador ";
		$sql .= " 		AND EXTRACT(YEAR FROM d.doctFechaPertenece) = ".$array["periodo"];
		$sql .= " 		AND dt.tpdIdTipoDocumento = 4 ";
		$sql .= " 		AND c.activo = 'S' ";
		$sql .= " 		GROUP BY c.ctrIdContratista, c.ctrRazonSocial, c.ctrRut, c.ctrNombreFantasia ";
		$sql .= " ) AS tipo4 ON (tipo4.ctrIdContratista = pivot.ctrIdContratista) ";
		$sql .= " LEFT JOIN ( ";
		$sql .= " 		SELECT c.ctrIdContratista ,c.ctrRazonSocial , c.ctrRut ";
		$sql .= " 		, c.ctrNombreFantasia , MIN(dt.id_estado_documento) estado ";
		$sql .= " 		FROM contratista c LEFT JOIN documentotrabajador dt ON c.ctrIdContratista = dt.id_contratista, documentos d ";
		$sql .= " 		WHERE dt.doctIdDocumento = d.id_documentotrabajador ";
		$sql .= " 		AND EXTRACT(YEAR FROM d.doctFechaPertenece) = ".$array["periodo"];
		$sql .= " 		AND dt.tpdIdTipoDocumento = 5 ";
		$sql .= " 		AND c.activo = 'S' ";
		$sql .= " 		GROUP BY c.ctrIdContratista, c.ctrRazonSocial, c.ctrRut, c.ctrNombreFantasia ";
		$sql .= " ) AS tipo5 ON (tipo5.ctrIdContratista = pivot.ctrIdContratista) ";
		
		$sql .= " GROUP BY pivot.ctrIdContratista ";
		
		if(trim($param["ctrRazonSocial"]) <> "")
		{
			$sql .= " and pivot.ctrRazonSocial LIKE '".trim($param["ctrRazonSocial"])."%'";
		}

		if(trim($param["ctrRut"]) <> "")
		{
			$sql .= " and pivot.ctrRut LIKE '".trim($param["ctrRut"])."%'";
		}
			
		$sql .= " ORDER BY pivot.ctrRazonSocial ";
		
// 		echo($sql);
		
		$result = consulta($sql);
	
		return $result;
	}
	

}
?>