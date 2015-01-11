<?php
class ConstructoraModel extends ModelBase
{
	
	public function bajaRegistro($array)
	{
		$dato = new Constructora();
		$dato->add_filter("consIdConstructora","=",$array["id"]);
		$dato->load();
		$dato->set_data("activo","N");
		$dato->save();
	}
	
	public function grabar_datosForm($array)
	{
		$tipop = $array["tipop"];
	
		$sql = " SELECT * ";
		$sql .= " FROM constructora ";
		$sql .= " WHERE consIdConstructora = ".$array["consIdConstructora"];
// 	echo($sql);
		$idsql = consulta($sql);
	
		if(mysql_num_rows ($idsql) == 0)
		{
			$sql = " INSERT INTO constructora (";
			$sql .= "consEmail,consEstado, ";
			$sql .= "consNombreFantasia,consRazonSocial,consRut,consTelefono, ";
			$sql .= "consTelefono2,consTelefono3, ";
			$sql .= "dirIdDireccion,rplIdRepLegal,activo )";
			$sql .= " VALUES ";
			$sql .= "(";
			if(trim($array["consEmail"]) <> ""){ $sql .= "'".trim($array["consEmail"])."',"; }else{ $sql .= "NULL,"; }
			if(trim($array["consEstado"]) <> ""){ $sql .= "'".trim($array["consEstado"])."',"; }else{$sql .= "NULL,"; }
			if(trim($array["consNombreFantasia"]) <> ""){ $sql .= "'".trim($array["consNombreFantasia"])."',"; }else{$sql .= "NULL,";}
			if(trim($array["consRazonSocial"]) <> ""){ $sql .=  "'".trim($array["consRazonSocial"])."',"; }else{$sql .= "NULL,";}
			if(trim($array["consRut"]) <> ""){ $sql .=  "'".trim($array["consRut"])."',"; }else{$sql .= "NULL,";}
			if(trim($array["consTelefono"]) <> ""){ $sql .=  "'".trim($array["consTelefono"])."',"; }else{$sql .= "NULL,";}
			if(trim($array["consTelefono2"]) <> ""){ $sql .=  "'".trim($array["consTelefono2"])."',"; }else{$sql .= "NULL,";}
			if(trim($array["consTelefono3"]) <> ""){ $sql .=  "'".trim($array["consTelefono3"])."',"; }else{$sql .= "NULL,";}
			if(trim($array["dirIdDireccion"]) <> ""){ $sql .= trim($array["dirIdDireccion"]).","; }else{$sql .= "NULL,";}
			if(trim($array["rplIdRepLegal"]) <> ""){ $sql .= trim($array["rplIdRepLegal"]); }else{$sql .= "NULL";}
			$sql .=  ",'S'";
			$sql .= ")";
		}else{
			$sql = " UPDATE constructora SET ";
			if(trim($array["consEmail"]) <> "") $sql .= "consEmail = '".trim($array["consEmail"])."'";
			if(trim($array["consNombreFantasia"]) <> "") $sql .= " ,consNombreFantasia = '".trim($array["consNombreFantasia"])."'";
			if(trim($array["consRazonSocial"]) <> "") $sql .= " ,consRazonSocial = '".trim($array["consRazonSocial"])."'";
			if(trim($array["consRut"]) <> "") $sql .= " ,consRut ='".trim($array["consRut"])."'";
			if(trim($array["consTelefono"]) <> "") $sql .= " ,consTelefono = '".trim($array["consTelefono"])."'";
			if(trim($array["consTelefono2"]) <> "") $sql .= " ,consTelefono2 = '".trim($array["consTelefono2"])."'";
			if(trim($array["consTelefono3"]) <> "") $sql .= " ,consTelefono3 = '".trim($array["consTelefono3"])."'";
			if(trim($array["dirIdDireccion"]) <> "") $sql .= " ,dirIdDireccion =".trim($array["dirIdDireccion"]);
			if(trim($array["rplIdRepLegal"]) <> "") $sql .= " ,rplIdRepLegal =".trim($array["rplIdRepLegal"]);
			$sql .= " WHERE consIdConstructora = ".$array["consIdConstructora"];
				
		}
// 		echo($sql);
// 		exit;
		consulta($sql);
	
	}
	
	
	public function getConstructora($param)
	{
		$sql = " SELECT c.consIdConstructora, c.consNombreFantasia , c.consRazonSocial, c.consRut "; 
		$sql .= " FROM constructora c ";
		$sql .= " WHERE c.activo = 'S' ";
		$sql .= " AND c.consIdConstructora = ".$param["id"];
// echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
	
	public function getConstructoraxContratista($param)
	{	
		$sql = " SELECT e.consIdConstructora,e.consNombreFantasia,e.consRazonSocial,e.consRut ";
		$sql .= " FROM constructora e, contratista a ";
		$sql .= " WHERE e.consIdConstructora = a.consIdConstructora ";
		$sql .= " AND e.activo = 'S' ";
		$sql .= " AND a.ctrIdContratista = ".$param["id"];
// 	 echo($sql);
	$idsql = consulta($sql);
	
	return mysql_fetch_array($idsql);
	}
	
	public function getListaConstructora($param)
	{
		include("config.php");
		
		$sql = " SELECT c.consIdConstructora consIdConstructora, c.consNombreFantasia consNombreFantasia, c.consRazonSocial consRazonSocial, c.consRut consRut ";
		$sql .= " FROM constructora c ";
		$sql .= " WHERE c.activo = 'S' ";
		
		if(trim($param["consRazonSocial"]) <> "")
		{
			$sql .= " and c.consRazonSocial LIKE '".trim($param["consRazonSocial"])."%'";
		}

		if(trim($param["consRut"]) <> "")
		{
			$sql .= " and c.consRut LIKE '".trim($param["consRut"])."%'";
		}
		
		$sql .= " ORDER BY c.consRazonSocial ";
		
		$result = consulta($sql);
		
    	return $result;	
	}

	
	

}
?>