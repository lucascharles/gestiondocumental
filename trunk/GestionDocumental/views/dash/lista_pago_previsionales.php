<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<?
    	$coleccion = $result[0];
		$cant = $result[1];
		if($cant > 40)
		{
			include ('views/paginador.php');
		}
	?>
	
	<tr>
    	<th width="" align="center" height="25"></th>
		<th align="left" width="">Id</th>
		<th align="left" width="">Trabajador</th>
        <th align="left" width="">AFP</th>
        <th align="left" width="">Caja Compensacion</th>
        <th align="left" width="">Seguro</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	while($rs=mysql_fetch_array($result))
	{	
					
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["trbIdTrabajador"])  ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="5%"><?php echo (utf8_decode($rs["trbIdTrabajador"])) ?></td>
        </td>
		
		<td align="left" width="25%"><?php echo (utf8_decode($rs["trbNombre"])) ?></td>
		</td>
        <td align="left" width="25%">
        <? if($rs["trbIdTrabajador"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.abrirVentanaDoc('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.abrirVentanaDoc('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        <? } ?>
        </td>		
        <td align="left" width="25%">
        <? if($rs["trbIdTrabajador"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.abrirVentanaDoc('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.abrirVentanaDoc('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        <? } ?>
        </td>
        <td align="left" width="10%">
        <? if($rs["trbIdTrabajador"] == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.abrirVentanaDoc('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        	<? } else {	?>
        		<img src="images/borrar.gif" title="Completos" class="oplistado" onclick="window.parent.abrirVentanaDoc('<? echo($controller) ?>',<?php echo ($rs["consIdConstructora"]) ?>)" />
        <? } ?>
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo (utf8_decode($rs["trbIdTrabajador"])) ?>">
    	<td colspan="6" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>