<?php
class ContratistaModel extends ModelBase
{
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
		$dato = new Contratista();
		$dato->add_filter("ctrIdContratista","=",$array["id"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
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
			IF(TRIM($array["ctrNombreFantasia"])<>""){ $sql.= "'".$array["ctrNombreFantasia"]."',";	}ELSE { $sql.= "NULL,";	};
			IF(TRIM($array["ccatIdAfiliado"])<>""){ $sql.= $array["ccatIdAfiliado"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrEmail"])<>"") {	$sql.= "'".$array["ctrEmail"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrEmailExpertoMutualidad"])<>"") {	$sql.= "'".$array["ctrEmailExpertoMutualidad"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrFonoExpertoMutualidad"])<>""){ $sql.= "'".$array["ctrFonoExpertoMutualidad"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrIdAfiliadoMutualidad"])<>""){ $sql.= $array["ctrIdAfiliadoMutualidad"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrIdServicioContratado"])<>""){ $sql.= $array["ctrIdServicioContratado"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrIngresoFaena"])<>""){ $sql.= $array["ctrIngresoFaena"].","; }ELSE { $sql.= "NULL,";};
			
			IF(TRIM($array["ctrNombreExpertoMutualidad"])<>""){ $sql.= "'".$array["ctrNombreExpertoMutualidad"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrNroActividadCab"])<>""){ $sql.= "'".$array["ctrNroActividadCab"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrNroActividadDet"])<>""){ $sql.= "'".$array["ctrNroActividadDet"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrTasaCotizacionActual"])<>""){$sql.= $array["ctrTasaCotizacionActual"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrTasaCotizacionTotal"])<>""){ $sql.= $array["ctrTasaCotizacionTotal"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrTasaGenerica"])<>""){ $sql.= $array["ctrTasaGenerica"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrTelefono"])<>""){ $sql.= "'".$array["ctrTelefono"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrTelefono2"])<>""){ $sql.= "'".$array["ctrTelefono2"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["ctrTelefono3"])<>""){ $sql.= "'".$array["ctrTelefono3"]."',"; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["dirIdDirecion"])<>""){ $sql.= $array["dirIdDirecion"].","; }ELSE { $sql.= "NULL,";};
			
			IF(TRIM($array["mutIdMutualidad"])<>""){ $sql.= $array["mutIdMutualidad"].","; }ELSE { $sql.= "NULL,";};
			IF(TRIM($array["consIdConstructora"])<>""){ $sql.= $array["consIdConstructora"].","; }ELSE { $sql.= "NULL";};
			IF(TRIM($array["ctrDireccion"])<>""){$sql.= "'".$array["ctrDireccion"]."',";	}ELSE { $sql.= "NULL";};
			$sql .= "'S')";
		}else{
			$sql = " UPDATE contratista SET ";
			IF(TRIM($array["ctrRut"])<>"") $sql.= "ctrRut =" . $array["ctrRut"];
			IF(TRIM($array["ccatIdAfiliado"])<>"")$sql.=  ",ccatIdAfiliado = " .$array["ccatIdAfiliado"];
			IF(TRIM($array["ctrEmail"])<>"") $sql.=  ",ctrEmail = '" . $array["ctrEmail"]."'";
			IF(TRIM($array["ctrEmailExpertoMutualidad"])<>"") $sql.= ",ctrEmailExpertoMutualidad = '" . $array["ctrEmailExpertoMutualidad"]."'";
			IF(TRIM($array["ctrEstado"])<>"") $sql.= ",ctrEstado =" . $array["ctrEstado"];
			IF(TRIM($array["ctrFechaCreacion"])<>"") $sql.= ",ctrFechaCreacion =" . $array["ctrFechaCreacion"];
			IF(TRIM($array["ctrFechaModificacion"])<>"") $sql.= ",ctrFechaModificacion =" . $array["ctrFechaModificacion"];
			IF(TRIM($array["ctrFonoExpertoMutualidad"])<>"") $sql.= ",ctrFonoExpertoMutualidad = '" . $array["ctrFonoExpertoMutualidad"]."'";
			IF(TRIM($array["ctrIdAfiliadoMutualidad"])<>"") $sql.= ",ctrIdAfiliadoMutualidad =" . $array["ctrIdAfiliadoMutualidad"];
			IF(TRIM($array["ctrIdServicioContratado"])<>"") $sql.= ",ctrIdServicioContratado =" . $array["ctrIdServicioContratado"];
			IF(TRIM($array["ctrIngresoFaena"])<>"") $sql.= ",ctrIngresoFaena =" . $array["ctrIngresoFaena"];
			IF(TRIM($array["ctrNombreExpertoMutualidad"])<>"") $sql.= ",ctrNombreExpertoMutualidad = '" . $array["ctrNombreExpertoMutualidad"]."'";
			IF(TRIM($array["ctrNombreFantasia"])<>"") $sql.= ",ctrNombreFantasia = '" . $array["ctrNombreFantasia"]."'";
			IF(TRIM($array["ctrNroActividadCab"])<>"") $sql.= ",ctrNroActividadCab =" . $array["ctrNroActividadCab"];
			IF(TRIM($array["ctrNroActividadDet"])<>"") $sql.= ",ctrNroActividadDet =" . $array["ctrNroActividadDet"];
			IF(TRIM($array["ctrRazonSocial"])<>"") $sql.= ",ctrRazonSocial = '" . $array["ctrRazonSocial"] ."'";

			IF(TRIM($array["ctrTasaCotizacionActual"])<>"") $sql.= ",ctrTasaCotizacionActual =" . $array["ctrTasaCotizacionActual"];
			IF(TRIM($array["ctrTasaCotizacionTotal"])<>"") $sql.= ",ctrTasaCotizacionTotal =" . $array["ctrTasaCotizacionTotal"];
			IF(TRIM($array["ctrTasaGenerica"])<>"") $sql.= ",ctrTasaGenerica =" . $array["ctrTasaGenerica"];
			IF(TRIM($array["ctrTelefono"])<>"") $sql.= ",ctrTelefono = '" . $array["ctrTelefono"]."'";
			IF(TRIM($array["ctrTelefono2"])<>"") $sql.= ",ctrTelefono2 = '" . $array["ctrTelefono2"]."'";
			IF(TRIM($array["ctrTelefono3"])<>"") $sql.= ",ctrTelefono3 = '" . $array["ctrTelefono3"]."'";
			IF(TRIM($array["dirIdDirecion"])<>"") $sql.= ",dirIdDirecion =" . $array["dirIdDirecion"];
			IF(TRIM($array["mutIdMutualidad"])<>"")$sql.= ",mutIdMutualidad =" . $array["mutIdMutualidad"];
			IF(TRIM($array["consIdConstructora"])<>"")$sql.= ",consIdConstructora =" . $array["consIdConstructora"];
			IF(TRIM($array["ctrDireccion"])<>"")$sql.= ",ctrDireccion ='" . $array["ctrDireccion"]."'";
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
		
		if(trim($param["ctrRazonSocial"]) <> "")
		{
			$sql .= " and c.ctrRazonSocial LIKE '".trim($param["ctrRazonSocial"])."%'";
		}

		if(trim($param["ctrRut"]) <> "")
		{
			$sql .= " and c.ctrRut LIKE '".trim($param["ctrRut"])."%'";
		}
		
		$sql .= " ORDER BY c.ctrRazonSocial ";
		
// 		echo($sql);
// 		exit;
		
		$result = consulta($sql);
				
    	return $result;	
	}

	
	

}
?>