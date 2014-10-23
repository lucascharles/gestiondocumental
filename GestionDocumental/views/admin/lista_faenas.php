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
		<th align="left" width="">ID FAENA</th>
        <th align="left" width="">NOMBRE FAENA</th>
        <th align="left" width="">ESTADO FAENA</th>
		<th align="left" width="">FECHA INICIO</th>
		<th align="left" width="">FECHA FIN</th>
		<th align="left" width="">RESPONSABLE</th>
		<th align="left" width="">TELEFONO</th>
        <th align="left" width=""></th>
    </tr>
	<?php
	
	for($j=0; $j<$coleccion->get_count(); $j++) 
	{
		$datoTmp = &$coleccion->items[$j];
			
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($datoTmp->get_data("id")) ?>">
    	<td height="" width="5%"></td>
        <td align="left" width="5%"><?php echo ($datoTmp->get_data("id_usuario")) ?></td>
		<td align="left" width="15%"><?php echo (utf8_decode($datoTmp->get_data("nom_usuario"))) ?></td>
        <td align="left" width="5%"><?php echo (utf8_decode($datoTmp->get_data("ape_usuario"))) ?></td>
		<td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("nom_usuario"))) ?></td>
	    <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("ape_usuario"))) ?></td>
		<td align="left" width="20%"><?php echo (utf8_decode($datoTmp->get_data("nom_usuario"))) ?></td>
	    <td align="left" width="10%"><?php echo (utf8_decode($datoTmp->get_data("ape_usuario"))) ?></td>

		<td align="left" width="15%">
        <img src="images/permisos.png" title="Permisos" class="oplistado" onclick="window.parent.configurarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("id")) ?>)" />
        <img src="images/editar.gif" title="Editar" class="oplistado" onclick="window.parent.editarRegistro('<? echo($controller) ?>',<?php echo ($datoTmp->get_data("id")) ?>)" />
        <img src="images/borrar.gif" title="Eliminar" class="oplistado" onclick="window.parent.abrirVentanaConfirmacion(<?php echo ($datoTmp->get_data("id")) ?>)" />
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