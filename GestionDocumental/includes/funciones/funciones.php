<?php
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
