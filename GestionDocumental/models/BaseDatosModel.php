<?php
class BaseDatosModel extends ModelBase
{
	public function backUp()
	{
		$operacion = true;
		
		$output = shell_exec("C:\AppServ\MySQL\bin\mysqldump.exe -u root -proot gcontratista"); 
			
		if(trim($output)==NULL)
     	{
           $operacion = false;
     	}
		else
		{
			$result = file_put_contents("./CopiaBaseDatos/DBgcontratista".date('YmdHis').".sql",$output);
			
			if($result == false)
			{
    			$operacion = false;
			}
		}
		
		if($operacion == true)
		{
			$oRespaldo = new respaldo();
			$oRespaldo->add_filter("activo","=","S");
			$oRespaldo->load();
			$oRespaldo->set_data("activo","N");
			$oRespaldo->save();
			
			$oResp = new respaldo();
			$oResp->set_data("activo","S");
			$oResp->set_data("fecha",date("Y-m-d"));
			$oResp->save();
		}
		
		return $operacion;
	}	
	
	public function exportarBd()
	{
		$operacion = true;
		
		$output = shell_exec("C:\AppServ\MySQL\bin\mysqldump.exe -u root -proot gcontratista"); 
			
		if(trim($output)==NULL)
     	{
           $operacion = false;
     	}
		else
		{
			$result = file_put_contents("./exportarBD/gcontratista.sql",$output);
			
			if($result == false)
			{
    			$operacion = false;
			}
		}
		
		
		
		return $operacion;
	}
	
	public function imporatarBd($param)
	{
		$operacion = "Los datos se importaron correctamente";
		
		$_FILES['archivo'] = $param["arch_upload"]["txtarchivo"];

		$nombre_archivo = strtolower(str_replace(" ", "_",basename($_FILES['archivo']['name'])));
		$tipo_archivo = $_FILES['archivo']['type'];
		$tamano_archivo = $_FILES['archivo']['size']; 
		$error = $_FILES['archivo']['error'];

		if($nombre_archivo == "gcontratista.sql")
		{
			$uploadOk = move_uploaded_file($_FILES['archivo']['tmp_name'], "./importar/".$nombre_archivo);

			if(!$uploadOk) 
			{
				$operacion = "Problemas al cargar el archivo de datos";
			}
		}
		else
		{
			$operacion = "Archivo incorrecto";
		}
				
		
		$output = shell_exec("C:\AppServ\MySQL\bin\mysql.exe -uroot -proot gcontratista < C:\AppServ\www\gcontratista\importar\gcontratista.sql"); 
			
		if(trim($output)<>NULL)
     	{
           $operacion = "Problemas al importar datos";
     	}
		
	
		return $operacion;
	}
	
	public function exporta_archivo_excel($param)
	{
		require_once 'includes/clases/excel/PHPExcel.php';
		include 'includes/clases/excel/PHPExcel/IOFactory.php';
		set_time_limit(300);
		$objPHPExcel = new PHPExcel();
		$objReader = PHPExcel_IOFactory::createReader('Excel5'); // Excel2007
		$objPHPExcel = $objReader->load("plantilla/plantilla.xls");
		$objPHPExcel->setActiveSheetIndex(0);
	
		
	
		$columnas = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG");
		for($i=0; $i<count($columnas); $i++)
		{
			$objPHPExcel->getActiveSheet()->getStyle($columnas[$i].'2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
		}
		
		$styleArray['font'] = array('name' => 'Arial','size' => '10');
		$styleArray['fill'] = array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' => 'FFFFFF'), 'endcolor'   => array('rgb' => 'FFFFFF') );
	
		$sql = " select c.dni, c.apellido, c.nombre, e.razon_social, c.id_modulo_capacitacion, c.id_examen_medico, ";
		$sql .= " c.cuil, c.fecha_alta, cl.descripcion cat_laboral, cc.descripcion convenio_colectivo, cc.numero, ";
		$sql .= " c.nro_contrato_art, ea.descripcion empresa_art, eap.descripcion acc_personales, esv.descripcion seguro_vida, ";
		$sql .= " catc.descripcion cat_carnet, r.descripcion rubro, ";
		$sql .= " c.habilitado, c.habilitado_rh, c.habilitado_c, c.habilitado_csm, c.habilitado_manejo ";
		$sql .= " from gc_contratista c ";
		$sql .= " LEFT JOIN gc_empresa e ON (e.id = c.id_empresa) ";
		$sql .= " LEFT JOIN gc_categoria_laboral cl ON (cl.id = c.id_categoria_laboral) ";
		$sql .= " LEFT JOIN gc_convenio_colectivo cc ON (cc.id = c.id_convenio_colectivo) ";
		$sql .= " LEFT JOIN gc_empresa_art ea ON (ea.id = c.id_empresa_art) ";
		$sql .= " LEFT JOIN gc_empresa_acc_pers eap ON (eap.id = c.id_empresa_acc_pers) ";
		$sql .= " LEFT JOIN gc_empresa_seguro_vida esv ON (esv.id = c.id_seguro_vida) ";
		$sql .= " LEFT JOIN gc_categoria_carnet catc ON (catc.id = c.id_categoria_carnet) ";
		$sql .= " LEFT JOIN gc_rubro r ON (r.id = c.id_rubro) ";
		$sql .= " where c.vigente = 'S' ";
		
		if(trim($param["id_planta"]) <> "")
		{
			$sql .= " and c.id_planta = ".$param["id_planta"];
		}
		// $sql .= " LIMIT 0, 15 ";
		//echo("sql: ".$sql);
		$idsql = consulta($sql);
		
		$fila = 3;
		$fila_f = mysql_num_rows($idsql)+3;
		//echo("<br> rows: ".mysql_num_rows($idsql));
		while($rs=mysql_fetch_array($idsql))
		{
			$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(25);

			// DNI
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$fila, $rs["dni"]);
			// Apellido y Nombre
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$fila, $rs["apellido"].' '.$rs["nombre"]);
			// Razon Social
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$fila, $rs["razon_social"]);
			// Habilitado =SI(F5="SI";(SI(G5="SI";SI(H5="SI";"HABILITADO";"INHABILITADO");"INHABILITADO"));"INHABILITADO")
			$habilitado_c = "INHABILITADO";
			if($rs["habilitado"] == "S") $habilitado_c = "HABILITADO";
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$fila,$habilitado_c);
			//$objPHPExcel->getActiveSheet()->SetCellValue('D'.$fila, '=IF(F'.$fila.'="SI",(IF(G'.$fila.'="SI",(IF(H'.$fila.'="SI","HABILITADO","INHABILITADO")),"INHABILITADO")),"INHABILITADO")');
			// a conducir =SI(V5="SI";SI($A$1<W5;"SI";SI($A$1<Z5;"SI";"NO"));"NO")
			$habilitado_manejo = "NO";
			if($rs["habilitado_manejo"] == "S") $habilitado_manejo = "SI";
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$fila,$habilitado_manejo);
			//$objPHPExcel->getActiveSheet()->SetCellValue('E'.$fila,'=IF(V6="SI",IF($A$1<W6,"SI",IF($A$1<Z6,"SI","NO")),"NO")');
			// RR.HH. =SI(P4>($A$1-1);"Si";(SI(S4>($A$1-1);"Si";"F")))
			$habilitado_rh = "F";
			if($rs["habilitado_rh"] == "S") $habilitado_rh = "Si";
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$fila, $habilitado_rh);
			//$objPHPExcel->getActiveSheet()->SetCellValue('F'.$fila, '=IF(P6>($A$1-1),"Si",(IF(S6>($A$1-1),"Si","F")))');
			// CAPACITACIÓN.
			$habilitado_c = "F";
			if($rs["habilitado_c"] == "S") $habilitado_c = "Si";
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$fila, $habilitado_c);
			// S.MEDICO
			$habilitado_csm = "F";
			if($rs["habilitado_csm"] == "S") $habilitado_csm = "Si";
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$fila, $habilitado_csm);
			// CUIL
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$fila, $rs["cuil"]);
			// Fecha de Alta
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$fila, $rs["fecha_alta"]);
			// Categoría Laboral
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$fila, $rs["cat_laboral"]);
			// Convenio Colecivo de Trabajo
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$fila, $rs["numero"].' - '.$rs["convenio_colectivo"]);
			// Contrato de ART
			$objPHPExcel->getActiveSheet()->SetCellValue('M'.$fila, $rs["nro_contrato_art"]);
			// Poliza de A.R.T.
			$objPHPExcel->getActiveSheet()->SetCellValue('N'.$fila, $rs["empresa_art"]);
			// Vto. Póliza A.R.T.
			$objPHPExcel->getActiveSheet()->SetCellValue('O'.$fila, $rs["vto_poliza_art"]);
			// Vto. Cláusula 
			$objPHPExcel->getActiveSheet()->SetCellValue('P'.$fila, $rs["vto_clausula_art"]);
			// Póliza de Acc. Pers.
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$fila, $rs["acc_personales"]);
			// Vto. Póliza de Acc. Pers.
			$objPHPExcel->getActiveSheet()->SetCellValue('R'.$fila, $rs["vto_poliza_acc_pers"]);
			// Vto. Pago Póliza Acc. Pers.
			$objPHPExcel->getActiveSheet()->SetCellValue('S'.$fila, $rs["vto_pago_poliza_acc_pers"]);
			// Póliza de Seguro de Vida
			$objPHPExcel->getActiveSheet()->SetCellValue('T'.$fila, $rs["seguro_vida"]);
			// Vto. Póliza de Seguro de Vida
			$objPHPExcel->getActiveSheet()->SetCellValue('U'.$fila, $rs["vto_poliza_seguro_vida"]);
			// Carnet 
			$objPHPExcel->getActiveSheet()->SetCellValue('V'.$fila, ($rs["carnet_conducir"]<>'S') ? 'No' : 'SI');
			// Vto. Carnet 
			$objPHPExcel->getActiveSheet()->SetCellValue('W'.$fila, $rs["vto_carnet_conducir"]);
			// Categoria 
			$objPHPExcel->getActiveSheet()->SetCellValue('X'.$fila, $rs["cat_carnet"]);
			// Carnet Especial
			$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$fila, $rs["carnet_especial"]);
			// Vto. Carnet Especial
			$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$fila, $rs["vto_carnet_especial"]);
			// Vto. Contrato de Trabajo
			$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$fila, $rs["vto_contrato_trabajo"]);
			// Fecha de capacitación
			$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$fila, $rs["fecha_capacitacion"]);
			// Curso de Inducción
			$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$fila, ($rs["curso_induccion"]=='S') ? 'Certifico' : 'NO HAY REGISTRO
');
			// Necesita
			$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$fila, '');
			// Area
			$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$fila, '');
			// Rubro
			$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$fila, $rs["rubro"]);
			// Actividad
			$objPHPExcel->getActiveSheet()->SetCellValue('AG'.$fila, $rs["actividad"]);

			$fila ++; 
			
		}
		
		$objPHPExcel->getActiveSheet()->getStyle('A3:AG'.($fila-1))->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('A3:AG'.($fila-1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A3:AG'.($fila-1))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		/*
		$objPageSetup = new PHPExcel_Worksheet_PageSetup();
		$objPageSetup->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPageSetup->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPageSetup->setFitToWidth(1);
		$objPageSetup->setPrintArea("A2:AG".($fila_f-1));
		$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup);
		*/
		$objPHPExcel->setActiveSheetIndex(0);
		$objPageSetup_f = new PHPExcel_Worksheet_PageSetup();
		$objPageSetup_f->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPageSetup_f->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPageSetup_f->setFitToWidth(1);
		$objPageSetup_f->setPrintArea("A2:AG".($fila_f-1));
		$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup_f);

		// VEHICULOS 
		$objPHPExcel->setActiveSheetIndex(1);
		$columnas = array("A","B","C","D","E","F","G","H","I","J","K");
		for($i=0; $i<count($columnas); $i++)
		{
			$objPHPExcel->getActiveSheet()->getStyle($columnas[$i].'2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
		}
		$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(25);
		
		$sql = " select v.patente, v.detalle, e.razon_social, v.itv, v.itv_fec_venc, p.descripcion poliza_seguro, ";
		$sql .= " v.poliza_seguro_fec_venc, v.habilitado ";
		$sql .= " from gc_vehiculo v ";
		$sql .= " LEFT JOIN gc_poliza_seguro p ON (p.id = v.id_poliza_seguro) ";
		$sql .= " LEFT JOIN gc_empresa e ON (e.id = v.id_empresa) ";
		$sql .= " where v.vigente = 'S' ";
		
		//$sql .= " LIMIT 0, 15 ";
		//echo("sql: ".$sql);

		$idsql = consulta($sql);
		
		$fila = 3;
		while($rs=mysql_fetch_array($idsql))
		{
			// Patente	
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$fila, $rs["patente"]);
			// Detalle Vehiculo/ Maquinaria	
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$fila, $rs["detalle"]);
			// Razón Social	
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$fila, $rs["razon_social"]);
			// Habilitado =SI(L3="NO";"NO";(SI(M3="NO";"NO";"SI")))
			$habilitado = "NO";
			if($rs["habilitado"] == "S") $habilitado = "SI";
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$fila, $habilitado);
			//$objPHPExcel->getActiveSheet()->SetCellValue('E'.$fila, 'IF(L'.$fila.'="NO","NO",(IF(M'.$fila.'="NO","NO","SI")))');
			// ITV	
			$itv_fec_venc = "";
			if($rs["itv"] == "S") $itv_fec_venc = formatoFecha($rs["itv_fec_venc"],"yyyy-mm-dd","dd/mm/yyyy");
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$fila, $itv_fec_venc);
			// VTV	
			$vtv_fec_venc = "";
			if($rs["vtv"] == "S") $vtv_fec_venc = formatoFecha($rs["vtv_fec_venc"],"yyyy-mm-dd","dd/mm/yyyy");
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$fila, $vtv_fec_venc);
			// T.UV.	
			$tuv_fec_venc = "";
			if($rs["tuv"] == "S") $tuv_fec_venc = formatoFecha($rs["tuv_fec_venc"],"yyyy-mm-dd","dd/mm/yyyy");
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$fila, $tuv_fec_venc);
			// Póliza Seguro	
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$fila, $rs["poliza_seguro"]);
			// Vencimiento	
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$fila, $rs["poliza_seguro_fec_venc"]);
			// Pago
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$fila, $rs["poliza_seguro_fec_vig"]);
			// =SI((F3+1)>Empleados!$A$1;"SI";(SI((G3+1)>Empleados!$A$1;"SI";(SI((H3+1)>Empleados!$A$1;"SI";"NO")))))
			//$objPHPExcel->getActiveSheet()->SetCellValue('L'.$fila, '');
			// =SI((J3+1)>Empleados!$A$1;(SI((K3+1)>Empleados!$A$1;"SI";"NO"));"NO")
			//$objPHPExcel->getActiveSheet()->SetCellValue('M'.$fila, '');
			
			$fila++;
		}
		$objPageSetup_v = new PHPExcel_Worksheet_PageSetup();
		$objPageSetup_v->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPageSetup_v->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPageSetup_v->setFitToWidth(1);
		$objPageSetup_v->setPrintArea("B2:K".($fila-1));
		$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup_v);
		
		// CONTACTOS 
		$objPHPExcel->setActiveSheetIndex(2);
		$columnas = array("A","B");
		for($i=0; $i<count($columnas); $i++)
		{
			$objPHPExcel->getActiveSheet()->getStyle($columnas[$i].'2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
		}
		$objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(25);
		
		$sql = " select e.razon_social , e.email ";
		$sql .= " from gc_empresa e ";
		$sql .= " where e.vigente = 'S' ";
		$sql .= " and e.email <> ''  ";
		
		//$sql .= " LIMIT 0, 15 ";
		//echo("sql: ".$sql);
		$idsql = consulta($sql);
		
		$fila = 3;
		while($rs=mysql_fetch_array($idsql))
		{
			// RAZÓN SOCIAL	
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$fila, $rs["razon_social"]);
			// E-MAIL DEL CONTRATISTA
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$fila, $rs["email"]);
			
			$fila++;
		}
		$objPageSetup_c = new PHPExcel_Worksheet_PageSetup();
		$objPageSetup_c->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPageSetup_c->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPageSetup_c->setFitToWidth(1);
		$objPageSetup_c->setPrintArea("A2:B".($fila-1));
		$objPHPExcel->getActiveSheet()->setPageSetup($objPageSetup_c);
		
		
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); // Excel2007
		$objWriter->save("exportarExcel/contratistas.xls");
		
	}
}
?>