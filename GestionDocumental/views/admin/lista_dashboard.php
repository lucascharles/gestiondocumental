<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">

	
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">Id</th>
        <th align="left" width="">RUT</th>
        <th align="left" width="">Razon Soc.</th>
        <th align="left" width="">Inf. & Coord. Empresarial</th>
		<th align="left" width="">Antecedentes Laborales</th>
		<th align="left" width="">Remuneraciones</th>
		<th align="left" width="">Certificacion del Contratista</th>
		<th align="left" width="">Pagos Previsionales</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{	
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["ctrIdContratista"]) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="5%"><?php echo (utf8_decode($rs["ctrIdContratista"])) ?></td>
        
		<td align="left" width="10%"><?php echo (utf8_decode($rs["ctrRut"])) ?></td>
        <td align="left" width="25%"><?php echo (utf8_decode($rs["ctrRazonSocial"])) ?></td>
        <td align="left" width="10%">
        	<? if($rs["ctrIdContratista"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } ?>	
        </td>
		<td align="left" width="10%">
        	<? if($rs["ctrIdContratista"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } ?>	
		        </td>
        <td align="left" width="10%">
        	<? if($rs["ctrIdContratista"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } ?>	
                </td>
        <td align="left" width="10%">
        	<? if($rs["ctrIdContratista"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } ?>	
                </td>
        <td align="left" width="10%">
        	<? if($rs["ctrIdContratista"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } ?>	
        </td>
        <td align="left" width="10%">
        	<? if($rs["ctrIdContratista"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        	<? } ?>	
                </td>
        
	</tr>
   <tr bgcolor="#FFFFFF" id="fila_sep_<?=$rs["ctrIdContratista"]?>">
    	<td colspan="10" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>