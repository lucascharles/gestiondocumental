<?
	session_start();
	header("Content-Type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: attachment; filename=listado.xls; format=number");
	

  	$sql = $_SESSION["sql_exp_excel"];
	
	$idsql = consulta_exp_excel($sql);
	echo "<table border=1>\n";
	$numcampos = mysql_num_fields($idsql);
	for ($i=0; $i<$numcampos; $i++)
	{
		echo "<td><b>".mysql_field_name($idsql, $i)."</b></td>\n";
	}
	echo "</tr>\n";
	
	while ($row=mysql_fetch_row($idsql))
	{
		echo "<tr> \n";
		for ($i=0; $i<$numcampos; $i++)
		{
			echo "<td>".$row[$i]."</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>";
		
exit();	
	
	function consulta_exp_excel($sql='')
	{
			
		$dbhost = 'localhost';
		$dbname = 'gestion_documental';
		$dbuser = 'root';
		$dbpass = 'root';

		$con_mysql=mysql_connect($dbhost,$dbuser,$dbpass); 	
		if (!$con_mysql) {echo 'No se ha podido encontrar el servidor de datos';exit;}
		mysql_select_db($dbname,$con_mysql);
		
		$idsql = mysql_query($sql);
		
		return $idsql;

	}
	
?>		
		
	
