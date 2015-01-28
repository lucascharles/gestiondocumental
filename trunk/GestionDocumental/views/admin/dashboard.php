<? 	include("views/cabecera.php"); 
 	include("views/menu.php"); 
 
 	$label = "Panel de Control";

	$titulo_form = "Panel de Control";

	include("views/popup_confirmacion.php"); 
		

 ?>
<form name="frmdashboard">
<input type="hidden" name="controller" id="controller" value="<?=$controller?>" />
<input type="hidden" name="id_reg" id="id_reg" value="" />
<input type="hidden" name="inicio" id="inicio" value="<? echo($ini) ?>" filtro="S" />
<input type="hidden" name="inicio_pag" id="inicio_pag" value="<? echo($ini_pag) ?>" filtro="S" />
<table  align="center" width="100%" border="0" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
		<td align="left" height="2" colspan="3"></td>
    </tr>
    
    <tr>
    	<td colspan="3">
        	<table width="100%" border="0" cellpadding="0" cellspacing="3" align="center" id="buscador">
		        <tr>
					<td colspan="1" align="left" class="etiqueta_form">Periodo:&nbsp;<input type="text" name="periodo" id="periodo"  filtro="S" value="<? echo(date("Y")) ?>"  class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>
				</tr>
				 
				<tr>
					<td align="left" class="etiqueta_form">Empresa:&nbsp;
<!-- 				   		<td align="left" class="etiqueta_form" colspan="1"> -->
			 	   			<select name="consIdConstructora" id="consIdConstructora" filtro="S" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="mostrar()">
								<option value="<? echo($consIdConstructora); ?>"><?echo($rs["consNombreFantasia"])?></option>
				   					<?
							   			while($rs=mysql_fetch_array($constructoras))
										{
									?>		<option value="<?=$rs["consIdConstructora"]?>" > <? echo($rs["consNombreFantasia"]); ?> </option>
									<?
										}
							    	?>
				   			</select>
				   		</td>
				   </tr>    	
				   
				   <tr>		 
 	 	 	 	   		<td colspan="1" align="left"  class="etiqueta_form" colspan="2">Agencia:&nbsp;<input type="text" name="consRazonSocial" id="consRazonSocial"  filtro="S" value="<? echo($_SESSION["f_consRazonSocial"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="2"/></td>
				 		<td colspan="1"></td>
				   </tr>
				   

             </table>
         <td>
    </tr>
    <tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>  
	<tr>
        <td colspan="3" valign="top">
            <div id="frmitemsadmin" style=" width:100%; min-height:1050px; overflow:auto;"></div>
         </td>
    </tr>  
</table>
</div>
</form>
<? include("views/pie.php"); ?>