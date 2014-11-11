<?php
class DocumentoModel extends ModelBase
{
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
		$sql .= " WHERE id_tipodocumento = ".$param["id_tipodocumento"];
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
		$sql = " SELECT d.doctIdDocumento, d.id_estado_documento, d.doctFechaSubida, d.doctFechaPertenece, d.doctIdTrabajador, d.id_contratista, d.doctNombreArchivo, ";
		$sql .= " d.doctNombreEncrip, d.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion ";
		$sql .= " FROM documentotrabajador d LEFT JOIN  tipodocumento t ON (d.tpdIdTipoDocumento = t.id) ";
		$sql .= " WHERE 1 ";
		
		if($param["id_contratista"] > 0) $sql .= " AND d.id_contratista = ".$param["id_contratista"];
		if($param["id_faena"] > 0) $sql .= " AND d.id_faena = ".$param["id_faena"];
		if($param["id_sub_tipodocumento"] > 0) $sql .= " AND d.id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
		if($param["id_trabajador"] > 0) $sql .= " AND d.doctIdTrabajador = ".$param["id_trabajador"];
		
		//echo($sql);
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
		
// 		echo($sql);
// 		exit;
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
				
				$sql = " UPDATE documentotrabajador ";
				$sql .= " SET id_estado_documento = 2, ";
				$sql .= " doctFechaSubida = '".date("Y-m-d")."', ";
				$sql .= " doctFechaPertenece = '".date("Y-m-d")."', ";		
				$sql .= " doctNombreArchivo = '".$param["doctNombreArchivo"]."', ";	
				$sql .= " doctNombreEncrip = '".$nombre."', ";
				$sql .= " NombreOriginal = '".$nombre_original."' ";
				$sql .= " WHERE ";
				$sql .= " doctIdTrabajador = ".$param["id_trabajador"];
				$sql .= " AND id_sub_tipodocumento = ".$param["id_sub_tipodocumento"];
				$sql .= " AND id_contratista = ".$param["id_contratista"];
				$sql .= " AND id_faena = ".$param["id_faena"];
				
			
				//echo($sql);
				consulta($sql);
				//exit();
			}	
		}
		
		//exit();
	}
	
	public function getListaRemuneraciones($array)
	{
		include("config.php");
		
// 		$sql = "	SELECT @rownum:=@rownum+1 AS rownum, dt.trbIdTrabajador trbIdTrabajador,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'enero')enero,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'febrero')febrero,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'marzo')marzo,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'abril')abril,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'mayo')mayo,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'junio')junio,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'julio')julio,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'agosto')agosto,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'septiembre')septiembre,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'octubre')octubre,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'noviembre')noviembre,
// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'diciembre')diciembre
// 					FROM trabajador dt,  (SELECT @rownum:=0) r ";		

		$sql = " SELECT trbIdTrabajador FROM trabajador ";
		
		
		$idsql = consulta($sql);
		
		return $idsql;	
	}
	
	public function getListaAntecedentesLaborales($array)
	{
		include("config.php");
	
		// 		$sql = "	SELECT @rownum:=@rownum+1 AS rownum, dt.trbIdTrabajador trbIdTrabajador,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'enero')enero,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'febrero')febrero,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'marzo')marzo,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'abril')abril,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'mayo')mayo,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'junio')junio,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'julio')julio,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'agosto')agosto,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'septiembre')septiembre,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'octubre')octubre,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'noviembre')noviembre,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'diciembre')diciembre
		// 					FROM trabajador dt,  (SELECT @rownum:=0) r ";
	
		$sql = " SELECT * FROM trabajador ";
	
	
		$idsql = consulta($sql);
	
		return $idsql;
	}
	
	public function getListaRemuneracionAsistencia($array)
	{
		include("config.php");
	
		// 		$sql = "	SELECT @rownum:=@rownum+1 AS rownum, dt.trbIdTrabajador trbIdTrabajador,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'enero')enero,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'febrero')febrero,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'marzo')marzo,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'abril')abril,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'mayo')mayo,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'junio')junio,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'julio')julio,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'agosto')agosto,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'septiembre')septiembre,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'octubre')octubre,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'noviembre')noviembre,
		// 				       (SELECT de.doctFechaPertenece FROM documentotrabajador de WHERE de.doctIdTRabajador = dt.trbIdTrabajador AND de.doctFechaPertenece = 'diciembre')diciembre
		// 					FROM trabajador dt,  (SELECT @rownum:=0) r ";
	
		$sql = " SELECT * FROM trabajador ";
	
	
		$idsql = consulta($sql);
	
		return $idsql;
	}
}
?>