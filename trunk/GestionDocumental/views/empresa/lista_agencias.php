<? 
//include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	
	<tr>
		<th align="left" width="">Id</th>
        <th align="left" width="">Agencia</th>
<!-- 		<th align="left" width="">INICIO</th> -->
<!-- 		<th align="left" width="">FIN</th> -->
		<th align="left" width="">Encargado</th>
<!-- 		<th align="left" width="">TELEFONO</th> -->
<!-- 		<th align="left" width="">ESTADO</th> -->
        <th align="left" width="">&nbsp;</th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{		
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["id"]) ?>">
		<td align="left" width="5%"><?php echo (utf8_decode($rs["id"])) ?></td>
		<td align="left" width="25%"><?php echo (utf8_decode($rs["faeNombre"])) ?></td>
<!-- 		<td align="left" width="10%"><?=utf8_decode(formatoFecha($rs["faeFechaInicio"],"yyyy-mm-dd","dd/mm/yyyy")) ?></td>  -->
<!--  	    <td align="left" width="10%"><?=utf8_decode(formatoFecha($rs["faeFechaTermino"],"yyyy-mm-dd","dd/mm/yyyy")) ?></td> --> 
		<td align="left" width="20%"><?php echo (utf8_decode($rs["faeResponsable"])) ?></td>
<!--    <td align="left" width="10%"><?php echo (utf8_decode($rs["faeTelefono"])) ?></td>  -->

		<td align="left" width="20%">
        <?php if($rs["estado_doc"] == 4) {?>
        <img src="images/activar.gif" title="Documentos" class="oplistado" onclick="window.parent.verDetalles('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <?php }?>
        
        <?php if($rs["estado_doc"] == 3) {?>
        <img src="images/cancelar.gif" title="Documentos" class="oplistado" onclick="window.parent.verDetalles('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <?php }?>
        
        <?php if($rs["estado_doc"] == 2) {?>
        <img src="images/advertencia.png" title="Documentos" class="oplistado" onclick="window.parent.verDetalles('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <?php }?>
        
        <?php if($rs["estado_doc"] == 1) {?>
        <img src="images/alerta.png" title="Documentos" class="oplistado" onclick="window.parent.verDetalles('<? echo($controller) ?>',<?php echo ($rs["id"]) ?>)" />
        <?php }?>
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?=$rs["id"]?>">
    	<td colspan="7" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "><div style="height:1px;"></div></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>