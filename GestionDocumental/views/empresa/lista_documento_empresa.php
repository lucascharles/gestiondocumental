<? 
include("views/cabecera_listado.php"); 
include("includes/pivot/pivot.class.php");

if(mysql_num_rows ($idsql_doc_trabajador) > 0){	
	$DataSet = array();
	while($rs= mysql_fetch_array($idsql_doc_trabajador))
	{
		//echo($rs["estado"]);
		$DataSet[] = $rs;
	}
	
	$data = Pivot::factory($DataSet)
	   ->pivotOn(array('trabajador'))
	   ->addColumn(array("doc"), array('estado' ,))
	   //->fullTotal()
	   //->lineTotal()
		->fetch();
	$enlace = array("col"=>1,"href"=>"#","ocultar"=>false,"funcion"=>"abrirVentanaDoc");
	//print_r($data);
	$cadena = simpleHtmlTable($data,3,$enlace,"Trabajador","","");
}
else
{
	$cadena = "Sin datos";
}	
	echo($cadena);
?>

    
<? include("views/pie_listado.php"); ?>