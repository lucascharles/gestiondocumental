<?php
class TrabajadoresControlModel extends ModelBase
{
	
	public function bajaRegistro($array)
	{
		$sql = " UPDATE trabajador SET activo = 'N' WHERE trbIdTrabajador = ".$param["id_reg"];
		consulta($sql);
	}		

	public function grabar_datosForm($param)
	{
		$sql = " INSERT INTO trabajador SET ";
		$sql_where = "";
		if($param["tipop"]=="M")
		{
			$sql = " UPDATE trabajador SET ";
			$sql_where = " WHERE trbIdTrabajador = ".$param["id_reg"];
		}
		
		if(trim($array["afpIdAfp"])<>"")$sql .= "afpIdAfp = '".$param["afpIdAfp"]."', ";
		if(trim($param["comIdComuna"])<>"")$sql .= "comIdComuna = '".$param["comIdComuna"]."', ";
		if(trim($param["ctrIdContratista"])<>"")$sql .= "ctrIdContratista = '".$param["ctrIdContratista"]."', ";
		if(trim($param["dirIdDireccion"])<>"")$sql .= "dirIdDireccion = '".$param["dirIdDireccion"]."', ";
		if(trim($param["isaIdIsapre"])<>"")$sql .= "isaIdIsapre = '".$param["isaIdIsapre"]."', ";
		if(trim($param["nacIdNacionalidad"])<>"")$sql .= "nacIdNacionalidad = '".$param["nacIdNacionalidad"]."', ";
		if(trim($param["tgrlIdCargoContractual"])<>"")$sql .= "tgrlIdCargoContractual = '".$param["tgrlIdCargoContractual"]."', ";
		if(trim($param["tgrlIdOficioCab"])<>"")$sql .= "tgrlIdOficioCab = '".$param["tgrlIdOficioCab"]."', ";
		if(trim($param["tgrlIdOficioDet"])<>"")$sql .= "tgrlIdOficioDet = '".$param["tgrlIdOficioDet"]."', ";
		if(trim($param["tgrlIdTipoContrato"])<>"")$sql .= "tgrlIdTipoContrato = '".$param["tgrlIdTipoContrato"]."', ";
		if(trim($param["tjorIdTipoJornada"])<>"")$sql .= "tjorIdTipoJornada = '".$param["tjorIdTipoJornada"]."', ";
		if(trim($param["trbAfectoArt22"])<>"")$sql .= "trbAfectoArt22 = '".$param["trbAfectoArt22"]."', ";
		if(trim($param["trbAntiguedadMeses"])<>"")$sql .= "trbAntiguedadMeses = '".$param["trbAntiguedadMeses"]."', ";
		if(trim($param["trbApMaterno"])<>"")$sql .= "trbApMaterno = '".$param["trbApMaterno"]."', ";
		if(trim($param["trbApPaterno"])<>"")$sql .= "trbApPaterno = '".$param["trbApPaterno"]."', ";
		if(trim($param["trbCeco"])<>"")$sql .= "trbCeco = '".$param["trbCeco"]."', ";
		if(trim($param["trbDireccion"])<>"")$sql .= "trbDireccion = '".$param["trbDireccion"]."', ";
		if(trim($param["trbEstado"])<>"")$sql .= "trbEstado = '".$param["trbEstado"]."', ";
		if(trim($param["trbFechaContrato"])<>"")$sql .= "trbFechaContrato = '".$param["trbFechaContrato"]."', ";
		if(trim($param["trbFechaCreacion"])<>"")$sql .= "trbFechaCreacion = '".$param["trbFechaCreacion"]."', ";
		if(trim($param["trbFechaNac"])<>"")$sql .= "trbFechaNac = '".$param["trbFechaNac"]."', ";
		if(trim($param["trbHorasSemanales"])<>"")$sql .= "trbHorasSemanales = '".$param["trbHorasSemanales"]."', ";
		if(trim($param["trbIngresoObraFecha"])<>"")$sql .= "trbIngresoObraFecha = '".$param["trbIngresoObraFecha"]."', ";
		if(trim($param["trbNombre"])<>"")$sql .= "trbNombre = '".$param["trbNombre"]."', ";
		if(trim($param["trbPensionado"])<>"")$sql .= "trbPensionado = '".$param["trbPensionado"]."', ";
		if(trim($param["trbPerteneceSindicato"])<>"")$sql .= "trbPerteneceSindicato = '".$param["trbPerteneceSindicato"]."', ";
		if(trim($param["trbRut"])<>"")$sql .= "trbRut = '".$param["trbRut"]."', ";
		if(trim($param["trbRutJefe"])<>"")$sql .= "trbRutJefe = '".$param["trbRutJefe"]."', ";
		if(trim($param["trbSeguroCesantia"])<>"")$sql .= "trbSeguroCesantia = '".$param["trbSeguroCesantia"]."', ";
		if(trim($param["trbSexo"])<>"")$sql .= "trbSexo = '".$param["trbSexo"]."', ";
		if(trim($param["trbTelefono"])<>"")$sql .= "trbTelefono = '".$param["trbTelefono"]."', ";
		if(trim($param["trbTitulo"])<>"")$sql .= "trbTitulo = '".$param["trbTitulo"]."', ";
		if(trim($param["trbVisa"])<>"")$sql .= "trbVisa = '".$param["trbVisa"]."', ";
		$sql .= " activo = 'S'";
		$sql .= $sql_where;
		//echo("<br>SQL: ".$sql);
		consulta($sql);
		
		if($param["tipop"] == "A")
		{
			$sql = " SELECT trbIdTrabajador FROM trabajador WHERE trbRut = '".$param["trbRut"]."' AND trbNombre = '".$param["trbNombre"]."' AND trbApPaterno = '".$param["trbApPaterno"]."' ORDER BY trbIdTrabajador DESC LIMIT 1" ;
			$idsql_new = consulta($sql);
			$rs_new = mysql_fetch_array($idsql_new);
			$id_new = $rs_new["trbIdTrabajador"];
			
			$sql = " SELECT st.id, st.id_tipodocumento tipodoc  FROM sub_tipodocumento WHERE activo = 'S' st ORDER BY st.id ASC ";
			$idsql = consulta($sql);
			while($rs=mysql_fetch_array($idsql))
			{
				$sql = " INSERT INTO documentotrabajador ";
				$sql .= " (id_estado_documento, doctIdTrabajador, id_contratista, id_faena, id_sub_tipodocumento,tpdIdTipoDocumento) ";
				$sql .= " VALUES ";
				$sql .= " (1, ".$id_new.", ".$param["ctrIdContratista"].", ".$param["faeIdFaenas"].",".$rs["id"].",".$rs["tipodoc"].") ";
				
				$idsql_ins = consulta($sql);
			}
		}
		
	}

		
	public function getTrabajador($array)
	{
		$sql = " SELECT t.* ";
		$sql .= " FROM trabajador t ";
		$sql .= " WHERE t.activo = 'S' ";
		$sql .= " AND t.trbIdTrabajador = ".$array["id"];

// 		echo($sql);
// 		exit;
		$idsql = consulta($sql);
	
		return mysql_fetch_array($idsql);
	}
		
	public function getListaTrabajador($array)
	{
		include("config.php");
		
		$sql = " SELECT trbIdTrabajador, trbNombre, trbApPaterno, trbRut ";
		$sql .= " FROM trabajador t ";
		$sql .= " WHERE t.activo = 'S' ";
		
		if(trim($array["trbNombre"]) <> "")
		{
			$sql .= " and t.trbNombre LIKE '".trim($array["trbNombre"])."%'";
		}

		if(trim($array["trbApPaterno"]) <> "")
		{
			$sql .= " and t.trbApPaterno LIKE '".trim($array["trbApPaterno"])."%'";
		}

		if(trim($array["ctrIdContratista"]) <> "")
		{
			$sql .= " and t.ctrIdContratista = '".trim($array["ctrIdContratista"])."%'";
		}
		
		
		$sql .= " ORDER BY t.trbApPaterno ";
		
		$result = consulta($sql);
		
    	return $result;	
	}

	

}
?>