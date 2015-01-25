<? 
include("views/cabecera_listado.php"); 
?>
<table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
	<tr>
		<th align="left" width="">Id</th>
        <th align="left" width="">Empresa</th>
        <th align="left" width="">Agencia</th>
        <th align="left" width="">Inf. & Coord. Empresarial</th>
		<th align="left" width="">Remuneraciones</th>
 		<th align="left" width="">Planilla de Pagos</th>
    </tr>
	<?php
	
	while($rs=mysql_fetch_array($result))
	{	
	?>
	<tr bgcolor="#FFFFFF" id="fila_<?php echo ($rs["ctrIdContratista"]) ?>">

        <td align="left" width="5%"><?php echo (utf8_decode($rs["ctrIdContratista"])) ?></td>
        
	 	<td align="left" width="10%"><?php echo (utf8_decode($rs["consNombreFantasia"])) ?></td>
        <td align="left" width="25%"><?php echo (utf8_decode($rs["ctrRazonSocial"])) ?></td>
        <td align="left" width="10%">
		        <? 
		        	if($rs["tipo1"] == 1) $icono = "images/alerta.png";
		        	if($rs["tipo1"] == 2) $icono = "images/advertencia.png";
		        	if($rs["tipo1"] == 3) $icono = "images/rechazar.jpg";
		        	if($rs["tipo1"] == 4) $icono = "images/activar.gif";
		        ?>
        		<img src="<? echo($icono) ?>" title="Ok" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        </td>
<!-- 
        <td align="left" width="10%">
		        <? 
		        	if($rs["tipo2"] == 1) $icono = "images/alerta.png";
		        	if($rs["tipo2"] == 2) $icono = "images/advertencia.png";
		        	if($rs["tipo2"] == 3) $icono = "images/rechazar.jpg";
		        	if($rs["tipo2"] == 4) $icono = "images/activar.gif";
		        ?>
        		<img src="<? echo($icono) ?>" title="Ok" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
		</td>
 -->

		<td align="left" width="10%">
		        <? 
		        	if($rs["tipo3"] == 1) $icono = "images/alerta.png";
		        	if($rs["tipo3"] == 2) $icono = "images/advertencia.png";
		        	if($rs["tipo3"] == 3) $icono = "images/rechazar.jpg";
		        	if($rs["tipo3"] == 4) $icono = "images/activar.gif";
		        ?>
        		<img src="<? echo($icono) ?>" title="Ok" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        </td>
<!--
        <td align="left" width="10%">
		        <? 
		        	if($rs["tipo4"] == 1) $icono = "images/alerta.png";
		        	if($rs["tipo4"] == 2) $icono = "images/advertencia.png";
		        	if($rs["tipo4"] == 3) $icono = "images/rechazar.jpg";
		        	if($rs["tipo4"] == 4) $icono = "images/activar.gif";
		        ?>
        		<img src="<? echo($icono) ?>" title="Ok" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
        </td>
-->        
      
         <td align="left" width="10%">
		        <? 
		        	if($rs["tipo5"] == 1) $icono = "images/alerta.png";
		        	if($rs["tipo5"] == 2) $icono = "images/advertencia.png";
		        	if($rs["tipo5"] == 3) $icono = "images/rechazar.jpg";
		        	if($rs["tipo5"] == 4) $icono = "images/activar.gif";
		        ?>
       		<img src="<? echo($icono) ?>" title="Ok" class="oplistado" onclick="window.parent.verDetalle('<? echo($controller) ?>',<?php echo ($rs["ctrIdContratista"]) ?>)" />
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