<?php
function simpleHtmlTable($data, $FormatoCabecera=1, $enlace=array(), $labelpivot='', $func_pivot='', $titulo_tabla='')
{
	$cadena='';
    $cadena.= "<table class='panel_control_doc_trabajador' >";
    
	$cabeceras = ConvierteEtiquetaEjeX(array_keys($data[0]), $FormatoCabecera);

	$pos=0;
    foreach ($cabeceras as $item) 
	{
		if ($pos==0) $item = (trim($labelpivot) <> "") ? $labelpivot : "&nbsp;";
        $cab_column.=  "<th><b>{$item}<b></th>";
		++$pos;
    }
	
	$cab_titulo .=  "<thead>";
	$cab_titulo .=  "<th colspan='".$pos."'><h2>".$titulo_tabla."</h2></th>";
    $cab_titulo .=  "</thead>";
	
	$cadena.=  $cab_titulo;
	
	$cadena.=  "<tr>".$cab_column."</tr>";
	$band_fila = 0;
    foreach ($data as $row) {

		$band_fila++;
         $cadena_fila =  "<tr>";
		 $pos_item = 0;
		 $col = 0;
		 $id_trabajador = 0;
        foreach ($row as $item) {
		//echo("<br>".$item);
			$col ++;
			$origin = $item;
			$align = "align='center'";
			$enlaceIni='';
			$enlaceFin='';
			if (count($enlace) > 0)
			{
				if($enlace["col"] == $col)
				{
					$link = $enlace['href'];
					$itemaux = explode("@",$item); 
					if(count($itemaux) > 1)
					{
						$item = $itemaux[1];
						$link .= ($link=="#")?"":$itemaux[0];
						$aux = array_keys($data[0]);
						//$funct = "onclick='".$enlace["funcion"]."(".$itemaux[0].",".$aux[$col].")'";
						$id_trabajador = $itemaux[0];
						eval("\$enlace_convertido = \"$link\";"); 
						$enlaceIni="<div style='color:#0000CC' >";
						$enlaceFin="</div>";
						if($enlace["ocultar"] > 0)
						{
							$enlaceIni='';
							$enlaceFin='';
						}
					}
				}
			}
			//$arr = explode("@",$item);
			$aux = array_keys($data[0]);
			$funct = "onclick='".$enlace["funcion"]."(".$id_trabajador.",".$aux[$col-1].")'";
			//$item = $arr[1];
			//$valor = $item;
			$valor = $origin;
			//$valor = $arr[0];
			$clase='class=texto';
			$nopaso = 'no paso';
			if(is_numeric($valor))  
			{ 
				$nopaso = '';
			
				//$valor = ($item > 0)?"<img src='images/activar.gif' style='cursor:pointer' ".$funct .">":"<img src='images/borrar.gif' style='cursor:pointer' ".$funct ." >";  
				
				//$arr = explode("@",$item);
				
				switch($item)
				{
					case 1:	// Sin subir
						$valor = "<img src='images/alerta.png' style='cursor:pointer' ".$funct .">";
					break;
					case 2: // Subido sin revisar
						$valor = "<img src='images/advertencia.png' style='cursor:pointer' ".$funct .">";
					break;
					case 3:	// Rechazado
						$valor = "<img src='images/cancelar.png' style='cursor:pointer' ".$funct .">";
					break;
					case 4:	// Aprobado
						$valor = "<img src='images/activar.png' style='cursor:pointer' ".$funct .">";
					break;
				}
			}
			else
			{
				
				$align = "align='left' width='400'";
				$valor = "";
				$aux = explode("@",$origin);
				//$valor = "Hola".count($aux);
				//$valor = $origin;
				$inicio = 0;
				foreach($aux as $valaux)
				{
					if($inicio > 0)	
					{
						if(trim($valaux) <> "")	$valor .= (trim($valor)=="")?$valaux:" | ".$valaux;
					}
					$inicio++;
				}
				
				if(strlen($valor)>55)
				{
					$valor = "<font title='$valor' style='cursor:pointer'>".substr($valor,0,55)."...</font>";
				}
								
				
			}


			//if($valor == "") $valor = ($item > 0)?"<img src='images/activar.gif' style='cursor:pointer' ".$funct ." >":"<img src='images/borrar.gif' style='cursor:pointer' ".$funct ." >";
			//$valor = ($item > 0)?"<img src='images/activar.gif' >":"<img src='images/borrar.gif' >";  
			$cadena_fila.=  "<td $clase $align>".$enlaceIni.$valor.$enlaceFin."</td>";
			
			
			
        }
        $cadena_fila.=  "</tr>";
		$cadena .=  $cadena_fila;
    }
     $cadena.=  "</table>";
	 //$cadena = "";
	 return $cadena;
}

	function ConvierteEtiquetaEjeX($a)
	{

		$etiquetas = array();
	
		foreach($a as $a)
		{
			if($a <> "")
			{
			$sql = " SELECT * FROM sub_tipodocumento WHERE id = '".$a."'";
			//echo("<br>".$sql);
			$idsql = consulta($sql);
			$rs = mysql_fetch_array($idsql);
			}
		
			$etiquetas[] =$rs["descripcion"];
		}

		return $etiquetas;
	
	}

	function conDecimales($valor, $decimales=2)
	{
		return number_format($valor,$decimales,'.',',');
	}

	function formatoFecha($fechavieja, $formatoOrigen, $formatoDestino)
	{
		$resp = "";
		if(trim($fechavieja) == "") 
		{
			return $resp; exit();
		}
		if(strlen($fechavieja) > 10)
		{
			$tiempo = substr($fechavieja, 10);
		
			$fechavieja = substr($fechavieja, 0, 10);
		}
		if(strpos($fechavieja,"-") <> false)
		{
			list($a,$b,$c) = explode("-", $fechavieja);
		}
		else
		{
			list($a,$b,$c) = explode("/", $fechavieja);
		}
		
		if(strlen($a)<2)
		{
			$a = str_pad($a, 2, "0", STR_PAD_LEFT);
		}
		if(strlen($b)<2)
		{
			$b = str_pad($b, 2, "0", STR_PAD_LEFT);
		}
		if(strlen($c)<2)
		{
			$c = str_pad($c, 2, "0", STR_PAD_LEFT);
		}
		
		if(strpos($fechavieja,"-") <> false)
		{
			$fechavieja = $a."-".$b."-".$c;
		}
		else
		{
			$fechavieja = $a."/".$b."/".$c;
		}
		
		if($formatoOrigen == "yyyy-mm-dd" && $formatoDestino == "dd/mm/yyyy")
		{
    		list($a,$m,$d) = explode("-", $fechavieja);
			$resp = $d."/".$m."/".$a;
		}
		
		if($formatoOrigen == "dd-mm-yyyy" && $formatoDestino == "dd/mm/yyyy")
		{
    		list($d,$m,$a) = explode("-", $fechavieja);
			$resp = $d."/".$m."/".$a;
		}
		
		if($formatoOrigen == "yyyy-mm-dd H:m:s" && $formatoDestino == "dd/mm/yyyy")
		{
		
    		list($a,$m,$d) = explode("-", $fechavieja);
			$resp = $d."/".$m."/".$a;
		}
		
		if($formatoOrigen == "dd/mm/yyyy" && $formatoDestino == "yyyy-mm-dd")
		{
    		list($d,$m,$a) = explode("/", $fechavieja);
			$resp = $a."-".$m."-".$d;
		}

		if($formatoOrigen == $formatoDestino)
		{
    		$resp = $fechavieja." ".$tiempo;
		}

		return trim($resp);
	}
	
	function redir($url)
	{
		echo "<script>window.location='".$url."'</script>";
		exit;
	}
	
	function pasarDatos($datos=array())
	{
		echo "<script>";
		for($i=0; $i<count($datos); $i++)
		{
			$aux = $datos[$i];
			echo "window.opener.document.getElementById('".$aux["campo"]."').value='".$aux["value"]."';";
		}
		echo "window.close();";
        echo "</script>";
		exit;
	}
	
	
	
	function getCantDiasRespaldo()
	{
		include("config.php");
		
		$dif = 0;
		
		$select = " DATEDIFF( CURRENT_DATE() , r.fecha) dif ";
		$from = " ga_respaldo r ";
	  	$where = " r.activo = 'S' ";	
				
		$sqlpersonal = new SqlPersonalizado($config->get('dbhost'), $config->get('dbuser'), $config->get('dbpass') );
		$sqlpersonal->set_select($select); 
	  	$sqlpersonal->set_from($from);
		$sqlpersonal->set_where($where);
	
    	$sqlpersonal->load();
		
		
		$datoTmp = &$sqlpersonal->items[$sqlpersonal->get_count()-1];

		$dif = $datoTmp->get_data("dif");
		
    	return $dif;
	
	}
	
	function consulta($sql='',$debug="")
	{
		include("config.php");
		$con_mysql=mysql_connect($config->get('dbhost'),$config->get('dbuser'),$config->get('dbpass')); 	
		if (!$con_mysql) {echo 'No se ha podido encontrar el servidor de datos';exit;}
		mysql_select_db($config->get('dbname'),$con_mysql);
		if($debug == 1)
		{
			echo("<br>SQL: ".$sql);
		}
		$idsql = mysql_query($sql);
		
		return $idsql;
	}
	
	function checkPermisos($modulo='',$permiso="")
	{
		$resp = false;
		
		for($i=0; $i<count($_SESSION["permisosusu"]); $i++)
		{
			$aux = $_SESSION["permisosusu"][$i];
			
			if($aux["modulo"] == $modulo && $aux[$permiso] == 1)
			{
				$resp = true;			
				break;
			}
		}
		
		return $resp;
	}
		  
?>
