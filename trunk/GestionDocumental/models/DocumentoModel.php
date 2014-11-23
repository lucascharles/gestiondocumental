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
		$sql .= " ORDER BY id ASC ";
		
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function getListaSubTipoDocumento($param)
	{
		$sql = " SELECT id, descripcion, id_tipodocumento ";
		$sql .= " FROM sub_tipodocumento";
		if($param["id_tipodocumento"] <>""){
			$sql .= " WHERE id_tipodocumento = ".$param["id_tipodocumento"];
		}
		//echo($sql);
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function getSubTipoDocumento($param)
	{
		$sql = " SELECT id, descripcion, id_tipodocumento ";
		$sql .= " FROM sub_tipodocumento";
		$sql .= " WHERE id = ".$param["id"];
		//echo($sql);
		$idsql = consulta($sql);
		
		return mysql_fetch_array($idsql);
	}
	
	public function getDocumentos($param)
	{
		$sql = " SELECT doc.id id_documento, d.doctIdDocumento, doc.id_estado_documento, doc.doctFechaSubida, doc.doctFechaPertenece, d.doctIdTrabajador, d.id_contratista, doc.doctNombreArchivo, ";
		$sql .= " doc.doctNombreEncrip, doc.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion, e.descripcion estado_documento ";
		$sql .= " FROM documentotrabajador d LEFT JOIN  tipodocumento t ON (d.tpdIdTipoDocumento = t.id), documentos doc LEFT JOIN  estado_documento e ON (doc.id_estado_documento = e.id) ";
		$sql .= " WHERE d.doctIdDocumento = doc.id_documentotrabajador ";
		
		if($param["id_contratista"] > 0) $sql .= " AND d.id_contratista = ".$param["id_contratista"];
		if($param["id_faena"] > 0) $sql .= " AND d.id_faena = ".$param["id_faena"];
		if($param["id_sub_tipodocumento"] > 0) $sql .= " AND d.id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
		if($param["id_trabajador"] > 0) $sql .= " AND d.doctIdTrabajador = ".$param["id_trabajador"];
		echo($sql);
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
		//$sql .= " SELECT t.trbIdTrabajador, CONCAT(t.trbIdTrabajador,'@',t.trbNombre) as trabajador, dt.id_sub_tipodocumento doc, CONCAT(dt.id_sub_tipodocumento,'@',dt.id_estado_documento) as estado ";
		$sql .= " SELECT t.trbIdTrabajador, CONCAT(t.trbIdTrabajador,'@',t.trbNombre) as trabajador, dt.id_sub_tipodocumento doc, dt.id_estado_documento estado ";
		$sql .= " FROM trabajador t, documentotrabajador dt, sub_tipodocumento std, trabajadorxfaena tf ,  faenasxcontratista fc";
		$sql .= " WHERE  t.trbIdTrabajador = tf.txf_id_trabajador AND tf.txf_id_faena = fc.id_faena ";
		$sql .= " AND tf.txf_id_faena = ".$param["id_faena"];
		$sql .= " AND fc.fxcIdContratistaPadre = ".$param["id_contratista"];
		$sql .= " AND std.id = dt.id_sub_tipodocumento ";
		$sql .= " AND dt.doctIdTrabajador = t.trbIdTrabajador AND  dt.id_faena = ".$param["id_faena"]." AND std.id_tipodocumento = ".$param["id_tipodocumento"];
		
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
				
// 				$sql = " UPDATE documentotrabajador ";
// 				$sql .= " SET id_estado_documento = 2 ";
// 				$sql .= " WHERE ";
// 				$sql .= " doctIdTrabajador = ".$param["id_trabajador"];
// 				$sql .= " AND id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
// 				$sql .= " AND id_contratista = ".$param["id_contratista"];
// 				$sql .= " AND id_faena = ".$param["id_faena"];
				
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
				
// 				if(mysql_num_rows($idsql) == 0 )
// 				{
// 					$sql = " INSERT INTO documentotrabajador ";
// 					$sql .= " SET ";
// 					$sql .= " id_estado_documento = 2 ";
// 					$sql .= " ,doctIdTrabajador = ".$param["id_trabajador"];
// 					$sql .= " ,id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
// 					$sql .= " ,id_contratista = ".$param["id_contratista"];
// 					$sql .= " ,id_faena = ".$param["id_faena"];
						
// 					consulta($sql);
// 				}
				
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