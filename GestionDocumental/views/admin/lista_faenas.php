<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">ID</th>
        <th align="left" width="">NOMBRE</th>
        <th align="left" width="">ESTADO</th>
		<th align="left" width="">FECHA INICIO</th>
		<th align="left" width="">FECHA FIN</th>
		<th align="left" width="">RESPONSABLE</th>
		<th align="left" width="">TELEFONO</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{		
		$img = "desbloqueado.png";
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["id"]) ?>">
    	<td height="" width="5%"></td>
		<td align="left" width="5%"><?php echo (utf8_decode($rs["id"])) ?></td>
		<td align="left" width="25%"><?php echo (utf8_decode($rs["faeNombre"])) ?></td>
		<td align="left" width="10%"><?php echo (utf8_decode(formatoFecha($rs["faeFechaInicio"],"yyyy-mm-dd", "dd/mm/yyyy"))) ?></td>
	    <td align="left" width="10%"><?php echo (utf8_decode(formatoFecha($rs["faeFechaTermino"],"yyyy-mm-dd", "dd/mm/yyyy"))) ?></td>
		<td align="left" width="20%"><?php echo (utf8_decode($rs["faeResponsable"])) ?></td>
	    <td align="left" width="10%"><?php echo (utf8_decode($rs["faeTelefono"])) ?></td>

		<td align="left" width="15%">
        <img src="images/<?=$img?>" title="Bloquear" class="oplistado" onclick="bloqueoFaena('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="editarRegistro('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="abrirVentanaConfirmacion(<?php echo ($rs["id"]) ?>)" />
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($rs["id"]) ?>">
    	<td colspan="9" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>