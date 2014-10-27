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
	
	for($j=0; $j<$coleccion->get_count(); $j++) 
	{
		$datoTmp = &$coleccion->items[$j];
			
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($datoTmp->get_data("consIdConstructora")) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="5%"><?php echo (utf8_decode($datoTmp->get_data("consIdConstructora"))) ?></td>
        
		<td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("consRut"))) ?></td>
        <td align="left" width="25%"><?php echo (utf8_decode($datoTmp->get_data("consRazonSocial"))) ?></td>
        <td align="left" width="10%">
        	<? if($datoTmp->get_data("consIdConstructora") == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } else {	?>
        		<img src="images/cerrarpopup.png" title="Faltan" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } ?>	
        </td>
		<td align="left" width="10%">
        	<? if($datoTmp->get_data("consIdConstructora") == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } else {	?>
        		<img src="images/cerrarpopup.png" title="Faltan" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } ?>	
        </td>
        <td align="left" width="10%">
        	<? if($datoTmp->get_data("consIdConstructora") == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } else {	?>
        		<img src="images/cerrarpopup.png" title="Faltan" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } ?>	
        </td>
        <td align="left" width="10%">
        	<? if($datoTmp->get_data("consIdConstructora") == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } else {	?>
        		<img src="images/cerrarpopup.png" title="Faltan" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } ?>	
        </td>
        <td align="left" width="10%">
        	<? if($datoTmp->get_data("consIdConstructora") == 1){ ?>
        		<img src="images/activar.gif" title="Completos" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } else {	?>
        		<img src="images/cerrarpopup.png" title="Faltan" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("consIdConstructora")) ?>)" />
        	<? } ?>	
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($datoTmp->get_data("id")) ?>">
    	<td colspan="6" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>