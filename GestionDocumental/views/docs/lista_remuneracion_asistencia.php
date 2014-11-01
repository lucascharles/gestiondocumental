<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<?
    	$coleccion = $listaRemuneraciones[0];
		$cant = $listaRemuneraciones[1];
		
		if($cant > 40)
		{
			include ('views/paginador.php');
		}
	?>
	
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">Id</th>
		<th align="left" width="">Trabajador</th>
        <th align="left" width="">Ene</th>
        <th align="left" width="">Feb</th>
        <th align="left" width="">Mar</th>
        <th align="left" width="">Abr</th>
        <th align="left" width="">May</th>
        <th align="left" width="">Jun</th>
        <th align="left" width="">Jul</th>
        <th align="left" width="">Ago</th>
        <th align="left" width="">Sep</th>
        <th align="left" width="">Oct</th>
        <th align="left" width="">Nov</th>
        <th align="left" width="">Dic</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	for($j=0; $j<$coleccion->get_count(); $j++) 
	{
		$datoTmp = &$coleccion->items[$j];
			
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($datoTmp->get_data("rownum")) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("trbIdTrabajador"))) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("enero"))) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("febrero"))) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("marzo"))) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("abril"))) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("mayo"))) ?></td>
        
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($datoTmp->get_data("rownum")) ?>">
    	<td colspan="6" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>