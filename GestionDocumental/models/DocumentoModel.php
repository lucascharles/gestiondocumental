<?php
class DocumentoModel extends ModelBase
{
	public function borrar_documento($param)
	{
		$sql = " SELECT doctNombreEncrip FROM documentos ";
		$sql .= " WHERE id = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		$rs = mysql_fetch_array($idsql);
		
		$sql = " DELETE FROM documentos ";
		$sql .= " WHERE id = ".$param["id"];
		//echo($sql);
		consulta($sql);
		$file = $_SESSION["config_obj"]->get('carpeta_archivos_general').$param["id_contratista"]."_docs_".$param["id_faena"]."/".$rs["doctNombreEncrip"];
		unlink($file);
	}
	
	public function grabar_editar_datos($param)
	{
		$sql = " UPDATE documentos ";
		if($param["id_estado"] > 0)	$sql .= " SET id_estado_documento = ".$param["id_estado"];
		if(trim($param["nota"]) <> "")	$sql .= " SET nota = '".$param["nota"]."'";
		$sql .= " WHERE id = ".$param["id"];
// 		echo($sql);
		consulta($sql);

		$sql = " SELECT id_documentotrabajador FROM documentos ";
		$sql .= " WHERE id = ".$param["id"];
		$idsql = consulta($sql);
		$rs = mysql_fetch_array($idsql);
		
		$sql = " UPDATE documentotrabajador ";
		if($param["id_estado"] > 0)	$sql .= " SET id_estado_documento = ".$param["id_estado"];
		$sql .= " WHERE doctIdDocumento = ".$rs["id_documentotrabajador"];
// 		echo($sql);
		consulta($sql);
	}
	
	public function getDocumento($param)
	{
		$sql = " SELECT d.doctFechaSubida, d.doctFechaPertenece, d.doctNombreArchivo, d.doctNombreEncrip, d.NombreOriginal, d.id_documentotrabajador, d.id_estado_documento, e.descripcion, d.nota ";
		$sql .= " FROM documentos d LEFT JOIN estado_documento e ON (d.id_estado_documento = e.id)";
		$sql .= " WHERE d.id = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
	public function getListaEstadoDocumento($param)
	{
		$sql = " SELECT id, descripcion ";
		$sql .= " FROM estado_documento";
		$sql .= " WHERE id <> 1 ";			// SI SE MODIFICA ESTA CONDICION UTILIZAR PARAMETROS
		$sql .= " ORDER BY id ASC ";
		
		$idsql = consulta($sql);
		
		return $idsql;
	}

	public function getListaTipoDocumento()
	{
		$sql = " SELECT id, descripcion ";
		$sql .= " FROM tipodocumento";
		$sql .= " WHERE activo = 'S'";
		$sql .= " ORDER BY id ASC ";
		
		$idsql = consulta($sql);
		
		return $idsql;
	}

	public function getListaTipoDocumentoPrevencion()
	{
		$sql = " SELECT id, descripcion ";
		$sql .= " FROM tipodocumento";
		$sql .= " WHERE activo = 'S'";
		$sql .= " AND prevencion = 'S'";
		$sql .= " ORDER BY id ASC ";
	
		$idsql = consulta($sql);
	
		return $idsql;
	}
	
	
	public function getListaSubTipoDocumento($param=array())
	{
		$sql = " SELECT id, descripcion, id_tipodocumento ";
		$sql .= " FROM sub_tipodocumento";
		$sql .= " WHERE activo = 'S' ";
		if($param["id_tipo_documento"] <>""){
			$sql .= " AND id_tipodocumento = ".$param["id_tipo_documento"];
		}
// 		echo($sql);
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function getSubTipoDocumento($param)
	{
		$sql = " SELECT id, orden, descripcion, id_tipodocumento ";
		$sql .= " FROM sub_tipodocumento";
		$sql .= " WHERE id = ".$param["id"];
		$sql .= " and activo = 'S' ";
// 		echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
	public function getTipoDocumento($idTipo)
	{
		$sql = " SELECT id, descripcion ";
		$sql .=" FROM  tipodocumento ";
		$sql .=" WHERE id = ".$idTipo;
		$sql .=" and activo = 'S' ";
// 		echo($sql);
// 		exit;
		$idsql = consulta($sql);
		return mysql_fetch_array($idsql);
	}
	
	public function getDocumentos($param)
	{
		$sql = " SELECT doc.id id_documento, d.doctIdDocumento, doc.id_estado_documento, doc.doctFechaSubida, doc.doctFechaPertenece, d.doctIdTrabajador, d.id_contratista, doc.doctNombreArchivo, ";
		$sql .= " doc.doctNombreEncrip, doc.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion, e.descripcion estado_documento, doc.nota ";
		$sql .= " FROM documentotrabajador d LEFT JOIN  tipodocumento t ON (d.tpdIdTipoDocumento = t.id), documentos doc LEFT JOIN  estado_documento e ON (doc.id_estado_documento = e.id) ";
		$sql .= " WHERE d.doctIdDocumento = doc.id_documentotrabajador ";
		$sql .= " AND t.activo = 'S' ";
		
		if($param["id_contratista"] > 0) $sql .= " AND d.id_contratista = ".$param["id_contratista"];
		if($param["id_faena"] > 0) $sql .= " AND d.id_faena = ".$param["id_faena"];
		if($param["id_sub_tipodocumento"] > 0) $sql .= " AND d.id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
		if($param["id_trabajador"] > 0) $sql .= " AND d.doctIdTrabajador = ".$param["id_trabajador"];
		if($param["id_tipo_documento"] > 0) $sql .= " AND d.tpdIdTipoDocumento = ".$param["id_tipo_documento"];
// 		echo($sql);	
// 		exit;	
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function getDocumentosxTipo($param)
	{
		$sql = " SELECT doc.id id_documento, d.doctIdDocumento, doc.id_estado_documento, doc.doctFechaSubida, doc.doctFechaPertenece, d.doctIdTrabajador, d.id_contratista, doc.doctNombreArchivo, ";
		$sql .= " doc.doctNombreEncrip, doc.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion, e.descripcion estado_documento, doc.nota ";
		$sql .= " FROM documentotrabajador d LEFT JOIN  tipodocumento t ON (d.tpdIdTipoDocumento = t.id), documentos doc LEFT JOIN  estado_documento e ON (doc.id_estado_documento = e.id) ";
		$sql .= " WHERE d.doctIdDocumento = doc.id_documentotrabajador ";
		$sql .= " AND t.activo = 'S' ";
		
		if($param["id_contratista"] > 0) $sql .= " AND d.id_contratista = ".$param["id_contratista"];
		if($param["id_faena"] > 0) $sql .= " AND d.id_faena = ".$param["id_faena"];
		if($param["tpdIdTipoDocumento"] > 0) $sql .= " AND d.tpdIdTipoDocumento = ".$param["tpdIdTipoDocumento"];
		if($param["id_trabajador"] > 0) $sql .= " AND d.doctIdTrabajador = ".$param["id_trabajador"];
	
// 		echo($sql);
		$idsql = consulta($sql);
	
		return $idsql;
	}
	
	
	
	public function getListaDocumentos($param)
	{
		
		
		$sql .= " SELECT t.trbIdTrabajador,t.trbRut, t.trbFechaContrato, t.trbFechaDesvinculado, t.trbIdTrabajador, ";
		$sql .= " dt.id_sub_tipodocumento doc, ";
		$sql .= " CONCAT(t.trbIdTrabajador,'@',t.trbRut,'@',DATE_FORMAT(t.trbFechaContrato, '%d/%m/%Y'),'@', ";
		$sql .= " 		IF(t.trbFechaDesvinculado <> '0000-00-00', DATE_FORMAT(t.trbFechaDesvinculado,'%d/%m/%Y'), ";
		$sql .= " 				''),'@', t.trbNombre) AS trabajador, ";		
		$sql .= " (SELECT IFNULL(MIN(x1.id_estado_documento), 1) ";
		$sql .= " FROM documentotrabajador x1 ";
		$sql .= " WHERE x1.tpdIdTipoDocumento = ".$param["id_tipodocumento"];
		$sql .= " AND x1.id_contratista = ".$param["id_contratista"];
		$sql .= " AND x1.doctIdTrabajador = t.trbIdTrabajador ";
		$sql .= " AND x1.id_sub_tipodocumento = dt.id_sub_tipodocumento ";
		$sql .= " GROUP BY x1.doctIdTrabajador, x1.id_sub_tipodocumento, x1.tpdIdTipoDocumento) estado ";
		$sql .= " FROM ";
		$sql .= " documentotrabajador dt LEFT JOIN trabajador t ON dt.doctIdTrabajador = t.trbIdTrabajador ";
		$sql .= " , sub_tipodocumento st ";
		$sql .= " WHERE	dt.id_sub_tipodocumento = st.id ";
		$sql .= " AND st.activo = 'S' ";
		$sql .= " AND dt.tpdIdTipoDocumento = ".$param["id_tipodocumento"];
		$sql .= " AND dt.id_contratista = ".$param["id_contratista"];
		
//  		echo($sql);
		//exit();
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	
	
	
	public function uploadDocumento($param)
	{
		include("config.php");
		
		$carpeta = $_SESSION["config_obj"]->get('carpeta_archivos_general').$param["id_contratista"]."_docs_".$param["id_faena"]."/";

		$nombre = md5($param["arch_upload"]["archivo"]["name"])."_".date("YmdHis");

		$nombre_original = $param["arch_upload"]["archivo"]["name"];

		if(!(is_dir($carpeta) || is_file(strtoupper($carpeta))))
		{
			mkdir($carpeta, 0777);
		}

		if($param["arch_upload"]["archivo"]["size"]<8000000)
		{
			$aname = explode(".",$nombre_original);//=strrchr($archivo_name,'.');
			$ext = $aname[1];
			$ext = strrchr($nombre_original,'.');
						
			if($ext<>'')
			{
				$nombre = $nombre.$ext;
				move_uploaded_file($param["arch_upload"]["archivo"]["tmp_name"],$carpeta.$nombre);

				$sql = " DELETE FROM documentotrabajador ";
				$sql .= " WHERE doctIdTrabajador = ".$param["id_trabajador"];
				$sql .= " AND id_estado_documento = 1 ";
				$sql .= " AND tpdIdTipoDocumento = ".$param["id_tipo_documento"];
				$sql .= " AND id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
				$sql .= " AND id_contratista = ".$param["id_contratista"];
// 				$sql .= " AND id_faena = ".$param["id_faena"];
				
				//echo($sql);
				consulta($sql);
				
				
				$sql = " INSERT INTO documentotrabajador ";
				$sql .= " SET ";
				$sql .= " id_estado_documento = 2 ";
				$sql .= " ,doctIdTrabajador = ".$param["id_trabajador"];
				$sql .= " ,tpdIdTipoDocumento = ".$param["id_tipo_documento"];
				$sql .= " ,id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
				$sql .= " ,id_contratista = ".$param["id_contratista"];
// 				$sql .= " ,id_faena = ".$param["id_faena"];
				
// 				echo($sql);
				consulta($sql);
				
				$sql = " SELECT doctIdDocumento FROM documentotrabajador ";
				$sql .= " WHERE ";
				$sql .= " doctIdTrabajador = ".$param["id_trabajador"];
				$sql .= " AND id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
				$sql .= " AND id_contratista = ".$param["id_contratista"];
// 				$sql .= " AND id_faena = ".$param["id_faena"];

// 				echo($sql);
				$idsql = consulta($sql);
				
				
				$rs = mysql_fetch_array($idsql);
			
				$sql = " INSERT INTO documentos ";
				$sql .= " SET  ";
				$sql .= " doctFechaSubida = '".date("Y-m-d")."', ";
				$sql .= " doctFechaPertenece = '".date("Y-m-d")."', ";		
				$sql .= " doctNombreArchivo = '".$param["doctNombreArchivo"]."', ";	
				$sql .= " doctNombreEncrip = '".$nombre."', ";
				$sql .= " NombreOriginal = '".$nombre_original."', ";
				$sql .= " id_estado_documento =  2, ";
				$sql .= " id_documentotrabajador = '".$rs["doctIdDocumento"]."' ";

				consulta($sql);
			}	
		}
		
		//exit();
	}
	
	public function get_combo_subtipo_documento($param)
	{
		include("config.php");
		
		$sql = " SELECT s.id, s.descripcion ";
		$sql .= " FROM sub_tipodocumento s ";
		$sql .= " WHERE 1 ";
		
		if($param["id_tipo_documento"] > 0)
		$sql .= " AND s.id_tipodocumento = ".$param["id_tipo_documento"];
		
		$sql .= " ORDER BY s.descripcion ";
		
//  		echo($sql);
//  		var_dump($param);
 		///exit;
		
		$idsql = consulta($sql);
		$html_combo = "";
		$html_combo .= "<option value=''></option> ";
		while($rs=mysql_fetch_array($idsql))
		{
			$html_combo .= "<option value='".$rs["id"]."'>".utf8_encode($rs["descripcion"])." </option> ";
		}
				
    	return $html_combo;	
	}
}
?>