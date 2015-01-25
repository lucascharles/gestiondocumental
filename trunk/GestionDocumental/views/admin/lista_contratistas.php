<? 
include("views/cabecera_listado.php"); 
?>

<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">NRO. </th>
        <th align="left" width="">EMPRESA</th>
        <th align="left" width="">AGENCIA</th>
        <th align="left" width="">ENCARGADO</th>
        <th align="left" width="">CORREO</th>
        <th align="left" width="">DIR.</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{			
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["ctrIdContratista"]) ?>">
    	<td height=""></td>
        <td align="left" width="5%"><?php echo ($rs["ctrIdContratista"]) ?></td>
		<td align="left" width="20%"><?php echo (utf8_decode($rs["empresa"])) ?></td>
        <td align="left" width="20%"><?php echo (utf8_decode($rs["ctrRazonSocial"])) ?></td>
        <td align="left" width="20%"><?php echo ($rs["ctrNombreExpertoMutualidad"]) ?></td>
        <td align="left" width="10%"><?php echo ($rs["ctrEmail"]) ?></td>
        <td align="left" width="10%"><?php echo ($rs["ctrDireccion"]) ?></td>
        <td align="left" width="10%">
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($rs["ctrIdContratista"]) ?>)" />
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($rs["ctrIdContratista"]) ?>">
    	<td colspan="8" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>