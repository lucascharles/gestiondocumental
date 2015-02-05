<?php
class InformesModel extends ModelBase
{
	public function exportar_a_pdf($param)
	{
		require_once('includes/fpdf/fpdf.php');
		
		$sql = $param["sql_exp_excel"];
		$idsql = consulta($sql);
		
		$pdf = new FPDF("L");
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',13);
		$pdf->SetXY(5, 5); 
		$pdf->Write(0,$param["titulo"]);
		if(trim($param["sub_titulo"]) <> "")
		{
			$pdf->SetFont('Arial','',12);
			$pdf->SetXY(5, 15); 
			$pdf->Write(0,$param["sub_titulo"]);
		}
		
		$numcampos = mysql_num_fields($idsql);
		$cont_x = 5;
		$cont_y = 20;
	
		$cont_x = 5;
		$cont_y = $cont_y + 5;
		$pdf->SetFont('Arial','B',10);
		for ($i=0; $i<$numcampos; $i++)
		{
			$pdf->SetXY($cont_x, $cont_y); 
			$pdf->Cell(35,5,mysql_field_name($idsql, $i),1,'L');
			$cont_x += 35;
		}

		while ($row=mysql_fetch_row($idsql))
		{
			
			$cont_x = 5;
			$cont_y = $cont_y + 5;
			for ($i=0; $i<$numcampos; $i++)
			{
				$pdf->SetXY($cont_x, $cont_y); 
				$pdf->Cell(35,5,$row[$i],1,'L');
				$cont_x += 35;
			}
		}
		
		$pdf->Output("iva_compras.pdf","I");
	}
	
	public function bajar_trabajdores_pdf($param)
	{
		$dir = "descaga/files".$_SESSION["userid"]."/"; 
		if(is_dir($dir))
		{
			$handle = opendir($dir); 
			while ($file = readdir($hadle))  
			{   
				if (is_file($dir.$file)) 
				{ 
					unlink($dir.$file); 
				}
			} 
		}					
		$sql = $param["sql_exp_excel"];
		$idsql = consulta($sql);
		if($param["lotes"] == 1)
		{
			$pdf = new ConcatPdf();
		}
		else
		{
			$cant = $param["lotes"];
		}
		$cont = 1;
		$archivos = array();
		while ($row=mysql_fetch_array($idsql))
		{		
			$dir = "docvarios/".$row["ctrIdContratista"]."_docs/";
			$sql = "SELECT id FROM sub_tipodocumento WHERE activo = 'S' AND id_tipodocumento = ".$param["id"];
			$idsql_subtipo = consulta($sql);
			while($rs_subtp = mysql_fetch_array($idsql_subtipo))
			{
				$sql = " SELECT doctIdDocumento FROM documentotrabajador WHERE id_sub_tipodocumento = ".$rs_subtp["id"];
				$sql .= " AND id_contratista = ".$row["ctrIdContratista"];
				$sql .= " AND tpdIdTipoDocumento = ".$param["id"];
				$sql .= " AND doctIdTrabajador = ".$row["trbIdTrabajador"];
				//echo("sql: ".$sql);
				$idsql_doctrab = consulta($sql);
				while($rs_doctrab = mysql_fetch_array($idsql_doctrab))
				{
					$sql = " SELECT id, doctNombreEncrip FROM documentos WHERE id_documentotrabajador = ".$rs_subtp["id"];
					//echo($sql."<br>");
					$idsql_doc = consulta($sql);
					$rs_doc = mysql_fetch_array($idsql_doc);
					//echo("<br>". $dir.$rs_doc["doctNombreEncrip"]." - ".$rs_doc["id"]);
					$archivos[] = $dir.$rs_doc["doctNombreEncrip"];	
				}
			}
			if($param["lotes"] == 1)
			{
				$pdf->setFiles($archivos);
			}
			
			$cont ++;
			if($param["lotes"] > 1 && $cont == $cant)
			{
				$pdf = new ConcatPdf();
				$pdf->setFiles($archivos);
				$pdf->concat();
				//var_dump($archivos);
				
				//$pdf->Output('descarga/documentos_trabajador.pdf', 'F');
				$pdf->Output('documentos_trabajador.pdf');
				$carpeta = "descarga/files".$_SESSION["userid"]."/";
				if(!(is_dir($carpeta) || is_file(strtoupper($carpeta))))
				{
					mkdir($carpeta, 0777);
				}
				copy("documentos_trabajador_".$row["trbIdTrabajador"].".pdf", $carpeta."documentos_trabajador_".$row["trbIdTrabajador"].".pdf");
				unlink("documentos_trabajador_".$row["trbIdTrabajador"].".pdf");
				$cont = 0;
				//$archivos = array();
			}			
		}
		if($param["lotes"] == 1)
		{
			$pdf->concat();
			// $pdf->Output('descarga/documentos_trabajador.pdf');
			$pdf->Output('documentos_trabajador.pdf');
			$carpeta = "descarga/files".$_SESSION["userid"]."/";
			if(!(is_dir($carpeta) || is_file(strtoupper($carpeta))))
			{
				mkdir($carpeta, 0777);
			}
			copy('documentos_trabajador.pdf', $carpeta."documentos_trabajador.pdf");
			unlink('documentos_trabajador.pdf');
		}
	}
}

require_once('includes/fpdf/fpdi.php');
class ConcatPdf extends FPDI
{
    public $files = array();

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function concat()
    {
        foreach($this->files AS $file) {
            $pageCount = $this->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                 $tplIdx = $this->ImportPage($pageNo);
                 $s = $this->getTemplatesize($tplIdx);
                 $this->AddPage($s['w'] > $s['h'] ? 'L' : 'P', array($s['w'], $s['h']));
                 $this->useTemplate($tplIdx);
            }
        }
    }
}
?>