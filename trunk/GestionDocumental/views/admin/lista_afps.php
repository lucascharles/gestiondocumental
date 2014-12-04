<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">ID AFP</th>
        <th align="left" width="">NOMBRE</th>
        <th align="left" width="">ESTADO</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	$controller = 'Afp';
	while($rs=mysql_fetch_array($result))
	{		
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["afpIdAfp"]) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="10%"><?php echo ($rs["afpIdAfp"]) ?></td>
		<td align="left" width="35%"><?php echo (utf8_decode($rs["afpNombre"])) ?></td>
        <td align="left" width="35%"><?php echo (utf8_decode($rs["afpEstado"])) ?></td>
		<td align="left" width="25%">
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="editarRegistro('<? echo($controller) ?>',<?php echo ($rs["afpIdAfp"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="abrirVentanaConfirmacion(<?php echo ($rs["afpIdAfp"]) ?>)" />
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($rs["afpIdAfp"]) ?>">
    	<td colspan="5" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>