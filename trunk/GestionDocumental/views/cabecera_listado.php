<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title><?php echo $nom_sistema; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="css/menuheader.css" />
        <link rel="stylesheet" type="text/css" href="css/general.css" />
	    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/cabecera.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menuheader.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
<?php
	for($i=0;$i<count($arrayscriptJs);$i++)
	{
		echo "<script type='text/javascript' src='js/".$arrayscriptJs[$i]."' ></script>\n";
	}
	for($i=0;$i<count($arrayscriptCss);$i++)
	{
		echo "<link rel='stylesheet' type='text/css' href='css/".$arrayscriptCss[$i]."' />\n";
	}
?>		
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
  <tr bgcolor="#FFFFFF">
    	<td style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
</table>
<? $display_a = (checkPermisos($modulo,"alta")) ? '' : 'display:none'; ?>
<? $display_b = (checkPermisos($modulo,"baja")) ? '' : 'display:none'; ?>
<? $display_m = (checkPermisos($modulo,"modificacion")) ? '' : 'display:none'; ?>
<? $display_e = (checkPermisos($modulo,"extra")) ? '' : 'display:none'; ?>
