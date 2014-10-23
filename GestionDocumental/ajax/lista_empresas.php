<?php
	require '../libs/Config.php'; //de configuracion
	include('../config.php');
	include($include_url.'/includes/clases/mygen_framework.php');
	include($include_url.'/includes/clases/mygen_mysql.php');
	include($include_url.'/includes/clases/clases_gcontratista.php');
	
	//actualiza00006

	$q = strtolower($_GET["term"]);
	if (!$q) return; //si no nos trae nada retornamos
	$items[] = array();//creamos un array llamado items
	$cadena = trim($q); //le asignamos a cadena $Q sin espacios
	
	$dato = new EmpresaCollection();
	$dato->add_filter("vigente","=","S");
	$dato->add_filter("AND");
	$dato->add_filter("razon_social","LIKE",$cadena."%");
	$dato->add_sort("razon_social",true);
	$dato->load();

	if($dato->get_count() == 0)
	{
		return false;
	}
	else
	{
		for($j=0; $j<$dato->get_count(); $j++) 
		{
			$datoTmp = &$dato->items[$j];
			/*
			if($j < 4)
			{
			*/
				$items[] = array("id"=>$datoTmp->get_data("id"),"label"=>$datoTmp->get_data("razon_social"),"value"=>$datoTmp->get_data("razon_social"));
			/*
			}
			else
			{
				$label = "----- ver mas -----";
				$id = "ver_123_651";
				$items[] = array("id"=>$id,"label"=>$label,"value"=>$_GET["term"] );
				break;
			}
			*/
		}
	}


echo json_encode($items);
?>