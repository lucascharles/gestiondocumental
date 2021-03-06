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
		if(trim($param["idSupervisor"])<>"")$sql .= "idSupervisor = '".$param["idSupervisor"]."', ";
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
			
			$sql = " SELECT st.id, st.id_tipodocumento tipodoc  FROM sub_tipodocumento st WHERE activo = 'S' ORDER BY st.id ASC ";
// 			echo($sql);
			$idsql = consulta($sql);
			while($rs=mysql_fetch_array($idsql))
			{
				if($param["faeIdFaenas"] <> ""){ $varIdFaena = $param["faeIdFaenas"];}else{$varIdFaena = "NULL";}
				
				$sql = " INSERT INTO documentotrabajador ";
				$sql .= " (id_estado_documento, doctIdTrabajador, id_contratista, id_faena, id_sub_tipodocumento,tpdIdTipoDocumento) ";
				$sql .= " VALUES ";
				$sql .= " (1, ".$id_new.", ".$param["ctrIdContratista"].", ".$varIdFaena.",".$rs["id"].",".$rs["tipodoc"].") ";
// 				echo($sql);
				$idsql_ins = consulta($sql);
			}
		}
// 		exit;
		
	}

		
	public function getTrabajador($array)
	{
		$sql = " SELECT t.*,r.idRegion, r.region, c.idCiudad, c.ciudad, co.idComuna, co.comuna ";
		$sql .= " ,a.afpIdAfp, a.afpNombre, i.isaIdIsapre, i.isaIsapre ";
		$sql .= " FROM trabajador t LEFT JOIN regiones r ON t.idRegion = r.idRegion ";
		$sql .= " 		LEFT JOIN ciudades c ON t.idCiudad = c.idCiudad ";
		$sql .= " 		LEFT JOIN comunas co ON t.idComuna = co.idComuna ";
		$sql .= " 		LEFT JOIN afp a ON t.afpIdAfp = a.afpIdAfp ";
		$sql .= " 		LEFT JOIN isapre i ON t.isaIdIsapre = i.isaIdIsapre ";
		$sql .= " WHERE t.activo = 'S' ";
		$sql .= " AND r.activo = 'S' AND c.activo = 'S' AND co.activo = 'S' AND a.activo ='S' AND i.activo = 'S' ";
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
			$sql .= " and t.ctrIdContratista = ".trim($array["ctrIdContratista"]);
		}
		
		
		$sql .= " ORDER BY t.trbApPaterno ";
		
// 		echo($sql);
		
		$result = consulta($sql);
		
    	return $result;	
	}

	

}
?>