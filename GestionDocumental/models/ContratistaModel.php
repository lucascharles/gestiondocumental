<?php
class ContratistaModel extends ModelBase
{
	public function bloquear_contratista($param)
	{
		$sql = " SELECT bloqueada FROM contratista ";
		$sql .= " WHERE ctrIdContratista = ".$param["id_contratista"];

		//echo($sql);
		$idsql = consulta($sql);
		$rs = mysql_fetch_array($idsql);
		
		$bloquea = 1;
		if($rs["bloqueada"] == 1) $bloquea = 0;
		
		$sql = " UPDATE contratista SET bloqueada = ".$bloquea;
		$sql .= " WHERE ctrIdContratista = ".$param["id_contratista"];;
		//echo("<br>".$sql);
		consulta($sql);
		
		return $bloquea;
	}
	
	public function getContratista($param)
	{
		$sql = " SELECT c.*, CONCAT(d.dirCalle,' ',d.dirNumero,' ',d.dirEstado) direccion ";
		$sql .= " FROM contratista c LEFT JOIN direccion d ON (c.ctrIdContratista = d.dirIdDireccion and d.activo = 'S') ";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " AND ctrIdContratista = ".$param["id"];
//  		echo($sql);
//  		exit;
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}

	
	public function getFaenasContratista($param)
	{
		$sql = " SELECT f.* ";
		$sql .= " FROM faenasxcontratista fc, faena f ";
		$sql .= " WHERE f.activo = 'S' ";
		$sql .= " AND fc.id_faena = f.faeIdFaenas ";
		$sql .= " AND fc.fxcIdContratistaPadre = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function bajaRegistro($array)
	{
		$sql = " UPDATE contratista SET activo = 'N' WHERE ctrIdContratista = ".$array["id"];
		consulta($sql);
	}
	
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
		
		if($array["ctrIdContratista"] =="") { 
			$id = 0;
		}
		else
		{
			$id = $array["ctrIdContratista"];
		}
		
		$sql = " SELECT * ";
		$sql .= " FROM contratista ";
		$sql .= " WHERE ctrIdContratista = ".$id;

		$idsql = consulta($sql);
	
		if(mysql_num_rows ($idsql) == 0)
		{
			$sql = " INSERT INTO contratista (";
			$sql .=" ctrRazonSocial,ctrRut,ctrNombreFantasia,";
			$sql .=	"ccatIdAfiliado,
					 ctrEmail, ";
			$sql .=	"ctrEmailExpertoMutualidad, ";
			$sql .=	"ctrFonoExpertoMutualidad, 
					 ctrIdAfiliadoMutualidad,";
			$sql .=	"ctrIdServicioContratado,
					 ctrIngresoFaena, ";
			$sql .=	"ctrNombreExpertoMutualidad,";
			$sql .=	"ctrNroActividadCab,
					 ctrNroActividadDet, ";
			$sql .=	"ctrTasaCotizacionActual, ";
			$sql .=	"ctrTasaCotizacionTotal,
					 ctrTasaGenerica, ";
			$sql .=	"ctrTelefono,
					 ctrTelefono2,
					 ctrTelefono3, ";
			$sql .=	"dirIdDirecion,
					 mutIdMutualidad,consIdConstructora,ctrDireccion,activo ";
			$sql .=	") VALUES (";

			IF(TRIM($array["ctrRazonSocial"])<>""){	$sql .= "'". $array["ctrRazonSocial"]."',"; }ELSE { $sql.= "NULL,";	};
			IF(TRIM($array["ctrRut"])<>""){	$sql.= "'".$array["ctrRut"]."',";}ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrNombreFantasia"])<>""){ $sql.= "'".$array["ctrRazonSocial"]."',";	}ELSE { $sql.= "NULL,";	};
			IF(TRIM($array["ccatIdAfiliado"])<>""){ $sql.= $array["ccatIdAfiliado"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrEmail"])<>"") {	$sql.= "'".$array["ctrEmail"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrEmailExpertoMutualidad"])<>"") {	$sql.= "'".$array["ctrEmailExpertoMutualidad"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrFonoExpertoMutualidad"])<>""){ $sql.= "'".$array["ctrFonoExpertoMutualidad"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrIdAfiliadoMutualidad"])<>""){ $sql.= $array["ctrIdAfiliadoMutualidad"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrIdServicioContratado"])<>""){ $sql.= $array["ctrIdServicioContratado"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrIngresoFaena"])<>""){ $sql.= $array["ctrIngresoFaena"].","; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrNombreExpertoMutualidad"])<>""){ $sql.= "'".$array["ctrNombreExpertoMutualidad"]."',"; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrNroActividadCab"])<>""){ $sql.= "'".$array["ctrNroActividadCab"]."',"; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrNroActividadDet"])<>""){ $sql.= "'".$array["ctrNroActividadDet"]."',"; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrTasaCotizacionActual"])<>""){$sql.= $array["ctrTasaCotizacionActual"].","; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrTasaCotizacionTotal"])<>""){ $sql.= $array["ctrTasaCotizacionTotal"].","; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrTasaGenerica"])<>""){ $sql.= $array["ctrTasaGenerica"].","; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrTelefono"])<>""){ $sql.= "'".$array["ctrTelefono"]."',"; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrTelefono2"])<>""){ $sql.= "'".$array["ctrTelefono2"]."',"; }ELSE { $sql.= "NULL,";};
			IF(trim($array["ctrTelefono3"])<>""){ $sql.= "'".$array["ctrTelefono3"]."',"; }ELSE { $sql.= "NULL,";};
			IF(trim($array["dirIdDirecion"])<>""){ $sql.= $array["dirIdDirecion"].","; }ELSE { $sql.= "NULL,";};
			IF(trim($array["mutIdMutualidad"])<>""){ $sql.= $array["mutIdMutualidad"].","; }ELSE { $sql.= "NULL,";};
			IF(trim($array["consIdConstructora"])<>""){ $sql.= $array["consIdConstructora"].","; }ELSE { $sql.= "NULL";};
			IF(trim($array["ctrDireccion"])<>""){$sql.= "'".$array["ctrDireccion"]."',";	}ELSE { $sql.= "NULL";};
			$sql .= "'S')";
		}else{
			$sql = " UPDATE contratista SET ";
			IF(trim($array["ctrRut"])<>"") $sql.= "ctrRut =" . $array["ctrRut"];
			IF(trim($array["ccatIdAfiliado"])<>"")$sql.=  ",ccatIdAfiliado = " .$array["ccatIdAfiliado"];
			IF(trim($array["ctrEmail"])<>"") $sql.=  ",ctrEmail = '" . $array["ctrEmail"]."'";
			IF(trim($array["ctrEmailExpertoMutualidad"])<>"") $sql.= ",ctrEmailExpertoMutualidad = '" . $array["ctrEmailExpertoMutualidad"]."'";
			IF(trim($array["ctrEstado"])<>"") $sql.= ",ctrEstado =" . $array["ctrEstado"];
			IF(trim($array["ctrFechaCreacion"])<>"") $sql.= ",ctrFechaCreacion =" . $array["ctrFechaCreacion"];
			IF(trim($array["ctrFechaModificacion"])<>"") $sql.= ",ctrFechaModificacion =" . $array["ctrFechaModificacion"];
			IF(trim($array["ctrFonoExpertoMutualidad"])<>"") $sql.= ",ctrFonoExpertoMutualidad = '" . $array["ctrFonoExpertoMutualidad"]."'";
			IF(trim($array["ctrIdAfiliadoMutualidad"])<>"") $sql.= ",ctrIdAfiliadoMutualidad =" . $array["ctrIdAfiliadoMutualidad"];
			IF(trim($array["ctrIdServicioContratado"])<>"") $sql.= ",ctrIdServicioContratado =" . $array["ctrIdServicioContratado"];
			IF(trim($array["ctrIngresoFaena"])<>"") $sql.= ",ctrIngresoFaena =" . $array["ctrIngresoFaena"];
			IF(trim($array["ctrNombreExpertoMutualidad"])<>"") $sql.= ",ctrNombreExpertoMutualidad = '" . $array["ctrNombreExpertoMutualidad"]."'";
			IF(trim($array["ctrNombreFantasia"])<>"") $sql.= ",ctrNombreFantasia = '" . $array["ctrNombreFantasia"]."'";
			IF(trim($array["ctrNroActividadCab"])<>"") $sql.= ",ctrNroActividadCab =" . $array["ctrNroActividadCab"];
			IF(trim($array["ctrNroActividadDet"])<>"") $sql.= ",ctrNroActividadDet =" . $array["ctrNroActividadDet"];
			IF(trim($array["ctrRazonSocial"])<>"") $sql.= ",ctrRazonSocial = '" . $array["ctrRazonSocial"] ."'";

			IF(trim($array["ctrTasaCotizacionActual"])<>"") $sql.= ",ctrTasaCotizacionActual =" . $array["ctrTasaCotizacionActual"];
			IF(trim($array["ctrTasaCotizacionTotal"])<>"") $sql.= ",ctrTasaCotizacionTotal =" . $array["ctrTasaCotizacionTotal"];
			IF(trim($array["ctrTasaGenerica"])<>"") $sql.= ",ctrTasaGenerica =" . $array["ctrTasaGenerica"];
			IF(trim($array["ctrTelefono"])<>"") $sql.= ",ctrTelefono = '" . $array["ctrTelefono"]."'";
			IF(trim($array["ctrTelefono2"])<>"") $sql.= ",ctrTelefono2 = '" . $array["ctrTelefono2"]."'";
			IF(trim($array["ctrTelefono3"])<>"") $sql.= ",ctrTelefono3 = '" . $array["ctrTelefono3"]."'";
			IF(trim($array["dirIdDirecion"])<>"") $sql.= ",dirIdDirecion =" . $array["dirIdDirecion"];
			IF(trim($array["mutIdMutualidad"])<>"")$sql.= ",mutIdMutualidad =" . $array["mutIdMutualidad"];
			IF(trim($array["consIdConstructora"])<>"")$sql.= ",consIdConstructora =" . $array["consIdConstructora"];
			IF(trim($array["ctrDireccion"])<>"")$sql.= ",ctrDireccion ='" . $array["ctrDireccion"]."'";
			$sql .= " WHERE ctrIdContratista = ".$array["ctrIdContratista"];
		}
// 		echo($sql);
// 		exit;
		consulta($sql);
	}

	public function getListaContratistas($param)
	{
		include("config.php");
		
		$sql = " SELECT c.*,co.consRazonSocial empresa ";
		$sql .= " FROM contratista c, constructora co ";
		$sql .= " WHERE c.consIdConstructora = co.consIdConstructora ";
		$sql .= " AND c.activo = 'S' ";
		
		if(trim($param["id_empresa"]) <> "")
		{
			$sql .= " and co.consIdConstructora = ".trim($param["id_empresa"]);
		}
		
		if(trim($param["id_agencia"]) <> "")
		{
			$sql .= " and c.ctrIdContratista = ".trim($param["id_agencia"]);
		}
		
		if(trim($param["ctrRazonSocial"]) <> "")
		{
			$sql .= " and c.ctrRazonSocial LIKE '".trim($param["ctrRazonSocial"])."%'";
		}

		if(trim($param["ctrRut"]) <> "")
		{
			$sql .= " and c.ctrRut LIKE '".trim($param["ctrRut"])."%'";
		}
		
		if(trim($param["consIdConstructora"]) <> "")
		{
			$sql .= " and c.consIdConstructora = ".$param["consIdConstructora"];
		}
		
		$sql .= " ORDER BY c.ctrRazonSocial ";
		
//  		echo($sql);
// 		exit;
		
		$result = consulta($sql);
				
    	return $result;	
	}

	
	
	public function get_combo_contratistas($param)
	{
		include("config.php");
		
		$sql = " SELECT c.ctrIdContratista, c.ctrRazonSocial ";
		$sql .= " FROM contratista c ";
		$sql .= " WHERE c.activo = 'S' ";
		
	
		if(trim($param["consIdConstructora"]) <> "")
		{
			$sql .= " and c.consIdConstructora = ".$param["consIdConstructora"];
		}
		
		$sql .= " ORDER BY c.ctrRazonSocial ";
		
// 		echo($sql);
// 		exit;
		
		$idsql = consulta($sql);
		$html_combo = "";
		while($rs=mysql_fetch_array($idsql))
		{
			$html_combo .= "<option value='".$rs["ctrIdContratista"]."'>".utf8_encode($rs["ctrRazonSocial"])." </option> ";
		}
				
    	return $html_combo;	
	}
}
?>