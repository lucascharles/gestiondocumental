<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">ID</th>
        <th align="left" width="">NOMBRE</th>
        <th align="left" width="">APELLIDO</th>
		<th align="left" width="">RUT</th>
		<th align="left" width="">AFP</th>
        <th align="left" width="">FECHA ALTA</th>
		<th align="left" width="">AGENCIA</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	while($rs = mysql_fetch_array($result))
	{	
	?>
	
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["trbIdTrabajador"]) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="10%"><?php echo ($rs["trbIdTrabajador"]) ?></td>
		<td align="left" width="15%"><?php echo (utf8_decode($rs["trbNombre"])) ?></td>
   		<td align="left" width="10%"><?php echo (utf8_decode($rs["trbApPaterno"])) ?></td>
        <td align="left" width="15%"><?php echo (utf8_decode($rs["trbRut"])) ?></td>
		<td align="left" width="10%"><?php echo (utf8_decode($rs["afp"])) ?></td>

        <td align="left" width="10%"><?=($rs["fec_alta"]=="0000-00-00") ? "" : formatoFecha($rs["trbFechaContrato"],"yyyy-mm-dd","dd/mm/yyyy"); ?></td> 
		<td align="left" width="10%"><?php echo (utf8_decode($rs["contratista"])) ?></td>    
		<td align="left" width="15%">
      	<img src="images/editar.gif" title="Editar" class="oplistado" onclick="editarRegistro('<? echo($controller) ?>',<?php echo ($rs["trbIdTrabajador"]) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="abrirVentanaConfirmacion(<?php echo ($rs["trbIdTrabajador"]) ?>)" />
        <img src="images/permisos.png" title="Documentos" class="oplistado" onclick="documentosTrabajador('<?=$controller?>',<?=$rs["trbIdTrabajador"]?>,<?=$id_c?>)" />
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