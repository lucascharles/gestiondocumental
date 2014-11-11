<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">ID</th>
        <th align="left" width="">RUT</th>
        <th align="left" width="">RAZON SOC.</th>
        <th align="left" width="">FECHA ALTA</th>
		<th align="left" width="">REP. LEGAL</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["consIdConstructora"]) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="10%"><?php echo ($rs["consIdConstructora"]) ?></td>
		<td align="left" width="15%"><?php echo (utf8_decode($rs["consRut"])) ?></td>
        <td align="left" width="15%"><?php echo (utf8_decode($rs["consRazonSocial"])) ?></td>
        <td align="left" width="10%"><?=($rs["consFechaCreacion"]=="0000-00-00") ? "" : formatoFecha($rs["consFechaCreacion"],"yyyy-mm-dd","dd/mm/yyyy"); ?></td>
		<td align="left" width="10%"><?php echo (utf8_decode($rs["rplIdRepLegal"])) ?></td>
		<td align="left" width="15%">
      <!-- <img src="images/permisos.png" title="Permisos" class="oplistado" onclick="window.parent.configurarRegistro('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />-->
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($rs["consIdConstructora"]) ?>)" />
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($rs["consIdConstructora"]) ?>">
    	<td colspan="7" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>