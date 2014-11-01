<?php
class DocumentoModel extends ModelBase
{
	public function getListaTipoDocumento()
	{
		$sql = " SELECT id, descripcion ";
		$sql .= " FROM tipodocumento";
		
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function getDocumentos($param)
	{
		$sql = " SELECT d.doctIdDocumento, d.id_estado_documento, d.doctFechaSubida, d.doctFechaPertenece, d.doctIdTrabajador, d.id_contratista, d.doctNombreArchivo, ";
		$sql .= " d.doctNombreEncrip, d.NombreOriginal, d.tpdIdTipoDocumento, t.descripcion ";
		$sql .= " FROM documentotrabajador d LEFT JOIN  tipodocumento t ON (d.tpdIdTipoDocumento = t.id) ";
		$sql .= " WHERE 1 ";
		
		if($param["id_contratista"] > 0) $sql .= " AND d.id_contratista = ".$param["id_contratista"];
		if($param["id_faena"] > 0) $sql .= " AND d.id_faena = ".$param["id_faena"];
		if($param["id_tipo_documento"] > 0) $sql .= " AND d.tpdIdTipoDocumento = ".$param["id_tipo_documento"];
		
		//echo($sql);
		$idsql = consulta($sql);
		
		return $idsql;
	}
	
	public function uploadDocumento($param)
	{
		include("config.php");
		
		$carpeta = $_SESSION["config_obj"]->get('carpeta_archivos_general').$param["id_contratista"]."_docs_".$param["id_faena"]."/";
		//echo("<br>carpeta: ".$carpeta);
		// $nombre = strtolower(str_replace(" ", "_",basename($param["arch_upload"]["archivo"]["name"])));
		$nombre = md5($param["arch_upload"]["archivo"]["name"])."_".date("YmdHis");
		//echo("<br>nombre: ".$nombre);
		$nombre_original = $param["arch_upload"]["archivo"]["name"];
		//echo("<br>nombre_original: ".$nombre_original);
		if(!(is_dir($carpeta) || is_file(strtoupper($carpeta))))
		{
			mkdir($carpeta, 0777);
		}
		//echo("<br>size: ".$param["arch_upload"]["archivo"]["size"]);
		if($param["arch_upload"]["archivo"]["size"]<8000000)
		{
			$aname = explode(".",$nombre_original);//=strrchr($archivo_name,'.');
			$ext = $aname[1];
			$ext = strrchr($nombre_original,'.');
			
			if($ext<>'')
			{
				$nombre = $nombre.$ext;
				move_uploaded_file($param["arch_upload"]["archivo"]["tmp_name"],$carpeta.$nombre);
				
				$sql = " INSERT INTO documentotrabajador ";
				$sql .= " ( id_estado_documento, doctFechaSubida, doctFechaPertenece, doctIdTrabajador, id_contratista, doctNombreArchivo, 	doctNombreEncrip, NombreOriginal,				tpdIdTipoDocumento, id_faena )";
				$sql .= " VALUES ";
				$sql .= " (1 , '".date("Y-m-d")."', '".date("Y-m-d")."', 0 ,".$param["id_contratista"].",'".$param["doctNombreArchivo"]."', '".$nombre."','".$nombre_original."', ".$param["id_tipo_documento"].",".$param["id_faena"].") ";
			
				//echo($sql.$where);
				consulta($sql);

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