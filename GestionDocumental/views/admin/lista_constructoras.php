<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">ID</th>
        <th align="left" width="">RUT</th>
        <th align="left" width="">RAZON SOC.</th>
        <th align="left" width="">NOMBRE FANTASIA</th>
		<th align="left" width="">EMAIL</th>
		<th align="left" width="">TELEFONO</th>
		<th align="left" width="">TELEFONO(2)</th>
		<th align="left" width="">TELEFONO(3)</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{
		$img = "desbloqueado.png";
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["consIdConstructora"]) ?>">
    	<td height="" width="2%"></td>
        <td align="left" width="5%"><?php echo ($rs["consIdConstructora"]) ?></td>
		<td align="left" width="10%"><?php echo (utf8_decode($rs["consRut"])) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($rs["consRazonSocial"])) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($rs["consNombreFantasia"])) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($rs["consEmail"])) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($rs["consTelefono"])) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($rs["consTelefono2"])) ?></td>
        <td align="left" width="10%"><?php echo (utf8_decode($rs["consTelefono3"])) ?></td>
		<td align="left" width="15%">
        <img src="images/<?=$img?>" title="Bloquear" class="oplistado" onclick="bloqueoConstructora('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="editarRegistro('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="abrirVentanaConfirmacion(<?php echo ($rs["consIdConstructora"]) ?>)" />
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($rs["consIdConstructora"]) ?>">
    	<td colspan="10" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>