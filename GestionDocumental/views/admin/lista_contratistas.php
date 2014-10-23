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
		<th align="left" width="">NRO. </th>
        <th align="left" width="">RUT</th>
        <th align="left" width="">RAZON SOCIAL</th>
        <th align="left" width="">NOMBRE FANTASIA</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	for($j=0; $j<$coleccion->get_count(); $j++) 
	{
		$datoTmp = &$coleccion->items[$j];
			
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($datoTmp->get_data("ctrIdContratista")) ?>">
    	<td height=""></td>
        <td align="left" width="5%"><?php echo ($datoTmp->get_data("ctrIdContratista")) ?></td>
		<td align="left" width="15%"><?php echo (utf8_decode($datoTmp->get_data("ctrRut"))) ?></td>
        <td align="left" width="15%"><?php echo (utf8_decode($datoTmp->get_data("ctrRazonSocial"))) ?></td>
        <td align="left" width="10%"><?php echo ($datoTmp->get_data("ctrNombreFantasia")) ?></td>
        <td align="left" width="10%">
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("ctrIdContratista")) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("id")) ?>)" />
        </td>
	</tr>
    <tr bgcolor="#FFFFFF" id="fila_sep_<?php echo ($datoTmp->get_data("ctrIdContratista")) ?>">
    	<td colspan="9" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
	</tr>
	<?php
	}
	?>
	
    </table>
    
<? include("views/pie_listado.php"); ?>