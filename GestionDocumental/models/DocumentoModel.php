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
	
	public function grabar_editar_estado($param)
	{
		$sql = " UPDATE documentos ";
		$sql .= " SET id_estado_documento = ".$param["id_estado"];
		$sql .= " WHERE id = ".$param["id"];
		//echo($sql);
		consulta($sql);
	}
	
	public function getDocumento($param)
	{
		$sql = " SELECT d.doctFechaSubida, d.doctFechaPertenece, d.doctNombreArchivo, d.doctNombreEncrip, d.NombreOriginal, d.id_documentotrabajador, d.id_estado_documento, e.descripcion ";
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
	
	public function getListaSubTipoDocumento($param)
	{
		$sql = " SELECT id, descripcion, id_tipodocumento ";
		$sql .= " FROM sub_tipodocumento";
		$sql .= " WHERE activo = 'S' ";
		if($param["id_tipodocumento"] <>""){
			$sql .= " AND id_tipodocumento = ".$param["id_tipodocumento"];
		}
		//echo($sql);
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
		$sql .=" and activo = 'S' ".$idTipo;
// 		echo($sql);
// 		exit;
		$idsql = consulta($sql);
		return mysql_fetch_array($idsql);
	}
	
	public function getDocumentos($param)
	{
		$sql = " SELECT doc.id id_documento, d.doctIdDocumento, doc.id_estado_documento, doc.doctFechaSubida, doc.doctFechaPertenece, d.doctIdTrabajador, d.id_contratista, doc.doctNombreArchivo, ";
		$sql .= " doc.doctNombreEncrip, doc.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion, e.descripcion estado_documento ";
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
		$sql .= " doc.doctNombreEncrip, doc.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion, e.descripcion estado_documento ";
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
		
		$sql .= " SELECT t.trbIdTrabajador,  CONCAT(t.trbIdTrabajador, '@', t.trbNombre) AS trabajador, ";
		$sql .= " dt.id_sub_tipodocumento doc, ";
		$sql .= " COUNT(dt.doctIdDocumento) cantidad_doc, ";
		$sql .= " ROUND(DATEDIFF(CURDATE(), t.trbFechaContrato) / 30) meses , ";
		//$sql .= " determina_estado(dt.tpdIdTipoDocumento, dt.id_sub_tipodocumento,dt.id_faena,dt.id_contratista, t.trbIdTrabajador) estado";
	
		$sql .= " (SELECT IFNULL(MIN(d.id_estado_documento),1) ";
		$sql .= " FROM documentotrabajador d ";
		$sql .= " WHERE d.tpdIdTipoDocumento = dt.tpdIdTipoDocumento ";
		$sql .= " AND d.id_sub_tipodocumento = dt.id_sub_tipodocumento ";
		$sql .= " AND d.id_faena = ".$param["id_faena"];
		$sql .= " AND d.id_contratista = ".$param["id_contratista"];
		$sql .= " AND d.doctIdTrabajador = t.trbIdTrabajador ";
		$sql .= " AND d.id_estado_documento <> 1 ";
		$sql .= " )AS estado1, ";
		$sql .= " IF((COUNT(dt.doctIdDocumento)) < (ROUND(DATEDIFF(CURDATE(), t.trbFechaContrato) / 30)), ";
		$sql .= " 		(IF((SELECT IFNULL(MIN(d.id_estado_documento),1) ";
		$sql .= " 				FROM documentotrabajador d 	WHERE d.tpdIdTipoDocumento = dt.tpdIdTipoDocumento ";
		$sql .= " 				AND d.id_sub_tipodocumento = dt.id_sub_tipodocumento ";
		$sql .= " 				AND d.id_faena = ".$param["id_faena"];
		$sql .= " 				AND d.id_contratista = ".$param["id_contratista"];
		$sql .= " 				AND d.doctIdTrabajador = t.trbIdTrabajador ";
		$sql .= " 				AND d.id_estado_documento <> 1)=1,(SELECT IFNULL(MIN(d.id_estado_documento),1) ";
		$sql .= " 						FROM documentotrabajador d 	WHERE d.tpdIdTipoDocumento = dt.tpdIdTipoDocumento ";
		$sql .= " 						AND d.id_sub_tipodocumento = dt.id_sub_tipodocumento ";
		$sql .= " 						AND d.id_faena = ".$param["id_faena"];
		$sql .= " 						AND d.id_contratista = ".$param["id_contratista"];
		$sql .= " 						AND d.doctIdTrabajador = t.trbIdTrabajador ";
		$sql .= " 						AND d.id_estado_documento <> 1),2)),1) estado ";
		
		$sql .= " FROM documentotrabajador dt,trabajador t, sub_tipodocumento st ";
		$sql .= " WHERE dt.doctIdTrabajador = t.trbIdTrabajador ";
		$sql .= " AND dt.id_sub_tipodocumento = st.id ";
		$sql .= " AND st.activo = 'S' ";		
		$sql .= "   AND dt.tpdIdTipoDocumento = ".$param["id_tipodocumento"];
		$sql .= "   AND dt.id_faena =  ".$param["id_faena"];
		$sql .= "   AND dt.id_contratista = ".$param["id_contratista"];
		$sql .= "   GROUP BY dt.id_sub_tipodocumento";
		
//  		echo($sql);
		
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
				$sql .= " AND id_faena = ".$param["id_faena"];
				
				//echo($sql);
				consulta($sql);
				
				
				$sql = " INSERT INTO documentotrabajador ";
				$sql .= " SET ";
				$sql .= " id_estado_documento = 2 ";
				$sql .= " ,doctIdTrabajador = ".$param["id_trabajador"];
				$sql .= " ,tpdIdTipoDocumento = ".$param["id_tipo_documento"];
				$sql .= " ,id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
				$sql .= " ,id_contratista = ".$param["id_contratista"];
				$sql .= " ,id_faena = ".$param["id_faena"];
				
// 				echo($sql);
				consulta($sql);
				
				$sql = " SELECT doctIdDocumento FROM documentotrabajador ";
				$sql .= " WHERE ";
				$sql .= " doctIdTrabajador = ".$param["id_trabajador"];
				$sql .= " AND id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
				$sql .= " AND id_contratista = ".$param["id_contratista"];
				$sql .= " AND id_faena = ".$param["id_faena"];

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
	
	
}
?>