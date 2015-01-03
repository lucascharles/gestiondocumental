<?php
class FaenasModel extends ModelBase
{
	public function bloquear_contratista($param)
	{
		$sql = " SELECT bloqueada FROM faenasxcontratista ";
		$sql .= " WHERE id_faena = ".$param["id_faena"];
		$sql .= " AND fxcIdContratistaPadre = ".$param["id_contratista"];
		//echo($sql);
		$idsql = consulta($sql);
		$rs = mysql_fetch_array($idsql);
		
		$bloquea = 1;
		if($rs["bloqueada"] == 1) $bloquea = 0;
		
		$sql = " UPDATE faenasxcontratista SET bloqueada = ".$bloquea;
		$sql .= " WHERE id_faena = ".$param["id_faena"];
		$sql .= " AND fxcIdContratistaPadre = ".$param["id_contratista"];;
		//echo("<br>".$sql);
		consulta($sql);
		
		return $bloquea;
	}
	
	public function getContratistas($param)
	{
		$sql .= " SELECT c.ctrIdContratista,  c.ctrRazonSocial, fc.bloqueada ";
		$sql .= " FROM faenasxcontratista fc, contratista c";
		$sql .= " WHERE fc.id_faena = ".$param["id"];
		$sql .= " AND fc.fxcIdContratistaPadre = c.ctrIdContratista ";
		$sql .= " ORDER BY c.ctrRazonSocial ";

		//echo($sql);

		$result = consulta($sql);
		
    	return $result;	
	}
	
	public function bajaRegistro($param)
	{
		$sql = " UPDATE faena SET activo = 'N' WHERE faeIdFaenas = ".$param["id"];
		//echo($sql);
		consulta($sql);
	}
	
	public function grabar_datosForm($param)
	{	
		if($param["tipop"]=="M")
		{
			$sql = " UPDATE faena ";
			$sql .= " SET consIdConstructora = ".$param["consIdConstructora"].",";
			if(trim($param["dirIdDireccion"])<>"") $sql .= " dirIdDireccion = '".$param["dirIdDireccion"]."', ";
			if(trim($param["faeFechaInicio"])<>"") $sql .= " faeFechaInicio = '".formatoFecha($param["faeFechaInicio"],"dd/mm/yyyy","yyyy-mm-dd")."', ";
			if(trim($param["faeFechaTermino"])<>"") $sql .= " faeFechaTermino = '".formatoFecha($param["faeFechaTermino"],"dd/mm/yyyy","yyyy-mm-dd")."', ";
			if(trim($param["faeIdFaenaPadre"])<>"") $sql .= " faeIdFaenaPadre = ".$param["faeIdFaenaPadre"].", ";
			if(trim($param["faeNombre"])<>"") $sql .= " faeNombre = '".$param["faeNombre"]."', ";
			if(trim($param["faeResponsable"])<>"") $sql .= " faeResponsable = '".$param["faeResponsable"]."', ";
			if(trim($param["faeTelefono"])<>"") $sql .= " faeTelefono = '".$param["faeTelefono"]."' ";
			$sql .= " WHERE faeIdFaenas = ".$param["id_reg"];
		}
		
		if($param["tipop"]=="A")
		{
			$sql = " INSERT INTO faena (consIdConstructora, dirIdDireccion, faeFechaInicio, faeFechaTermino, faeIdFaenaPadre, faeNombre, faeResponsable, faeTelefono, activo )   ";
			$sql .= " VALUES ";
			$sql .= " (".$param["consIdConstructora"].", '".$param["dirIdDireccion"]."', ";
			$sql .= " '".formatoFecha($param["faeFechaInicio"],"dd/mm/yyyy","yyyy-mm-dd")."',";
			$sql .= " '".formatoFecha($param["faeFechaTermino"],"dd/mm/yyyy","yyyy-mm-dd")."',";
			$sql .= " ".$param["faeIdFaenaPadre"].",";
			$sql .= " '".$param["faeNombre"]."',";
			$sql .= " '".$param["faeResponsable"]."',";
			$sql .= " '".$param["faeTelefono"]."',";
			$sql .= " ,'S') ";
		}
		
		//echo($sql);
		consulta($sql);
		//exit();
	}

	public function getFaena($param)
	{
		$sql = " SELECT faeIdFaenas, consIdConstructora, dirIdDireccion, faeEstado, faeFechaInicio,	faeFechaTermino, faeIdFaenaPadre, faeNombre, faeResponsable ";
		$sql .= " , faeTelefono, activo FROM faena WHERE faeIdFaenas = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
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
	
	public function getEstadoDocFaena($param)
	{
		include("config.php");
		
		$sql .= " SELECT ";
		$sql .= " f.faeIdFaenas id, ";
		$sql .= " f.consIdConstructora, ";
		$sql .= " f.dirIdDireccion, ";
		$sql .= " f.faeEstado, ";
		$sql .= " f.faeFechaInicio, ";
		$sql .= " f.faeFechaTermino, ";
		$sql .= " f.faeIdFaenaPadre, ";
		$sql .= " f.faeNombre, ";
		$sql .= " f.faeResponsable, ";
		$sql .= " f.faeTelefono, ";
		$sql .= " IFNULL((SELECT MIN(dt.id_estado_documento) FROM documentotrabajador dt ";
		$sql .= " 		WHERE dt.id_contratista = fc.fxcIdContratistaPadre";
		$sql .= " 		AND dt.id_faena = f.faeIdFaenas),1) estado_doc ";
		$sql .= " FROM faenasxcontratista fc, faena f ";
		$sql .= " WHERE fc.id_faena = f.faeIdFaenas ";
		$sql .= " AND fc.fxcIdContratistaPadre = ".$param["id_empresa"];
		
		if(trim($param["faeNombre"]) <> "")
		{
			$sql .= " and f.faeNombre LIKE '".trim($param["faeNombre"])."%'";
		}
		if(trim($param["faeResponsable"]) <> "")
		{
			$sql .= " and f.faeResponsable LIKE '".trim($param["faeResponsable"])."%'";
		}
		
		$sql .= " ORDER BY f.faeNombre ";
		
// 		echo($sql);
		
		$result = consulta($sql);
		
		return $result;
	}
}
?>