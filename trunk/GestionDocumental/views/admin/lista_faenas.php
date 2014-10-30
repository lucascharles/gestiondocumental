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
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["id"]) ?>">
    	<td height="" width="5%"></td>
		<td align="left" width="5%"><?php echo (utf8_decode($rs["id"])) ?></td>
		<td align="left" width="15%"><?php echo (utf8_decode($rs["faeNombre"])) ?></td>
        <td align="left" width="5%"><?php echo (utf8_decode($rs["faeEstado"])) ?></td>
		<td align="left" width="10%"><?php echo (utf8_decode($rs["faeFechaInicio"])) ?></td>
	    <td align="left" width="10%"><?php echo (utf8_decode($rs["faeFechaTermino"])) ?></td>
		<td align="left" width="20%"><?php echo (utf8_decode($rs["faeResponsable"])) ?></td>
	    <td align="left" width="10%"><?php echo (utf8_decode($rs["faeTelefono"])) ?></td>

		<td align="left" width="15%">
        <!--<img src="images/permisos.png" title="Permisos" class="oplistado" onclick="window.parent.configurarRegistro('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />-->
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($rs["id"]) ?>)" />
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