<form name="frmestado_disp_panel">
<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario" width="100%" >
	<tr>
		<th align="left" colspan="3"><?=$titulo_ventana?></th>
    </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">

	<tr>
    	<th width="" align="center" height="25"></th>
        <?
        for($j=0; $j<count($nom_column); $j++) 
		{
		?>
		<th align="left" width=""><?=$nom_column[$j]?> </th>
        <?
		}
        ?>
    </tr>
	<?php
	
	for($j=0; $j<count($result); $j++) 
	{
		$datoTmp = $result[$j];
			
	?>
	<tr bgcolor="#FFFFFF" id="">
    	<td width="2"></td>
        <?
        for($i=0; $i<count($datoTmp); $i++) 
		{
		?>
        <td align="left" width="49%"><?php echo (utf8_encode($datoTmp[$i])) ?></td>
        <?
		}
        ?>
	</tr>
    <tr bgcolor="#FFFFFF" >
    	<td colspan="<?=(count($datoTmp)+1) ?>" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	<tr bgcolor="#FFFFFF" >
    	<td colspan="<?=(count($datoTmp)+1) ?>" height="100%" >
        </td>
	</tr>
    </table>
</div>
</form>
<? include("views/pie_listado.php"); ?>
