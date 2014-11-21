<? 	include("views/cabecera_front.php"); 
 	include("views/menu_front.php"); 
 
 	$label = "Faenas";

	$titulo_form = "FAENAS";

	include("views/popup_confirmacion.php"); 
		

 ?>
<form name="frmfaenas">
<input type="hidden" name="controller" id="controller" value="<?=$controller?>" />
<input type="hidden" name="id_reg" id="id_reg" value="" />
<input type="hidden" name="inicio" id="inicio" value="<? echo($ini) ?>" filtro="S" />
<input type="hidden" name="inicio_pag" id="inicio_pag" value="<? echo($ini_pag) ?>" filtro="S" />
<table  align="center" width="90%" border="0" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
		<td align="left" height="2" colspan="3"></td>
    </tr>
    
    <tr>
    	<td colspan="3">
        	<table width="100%" border="0" cellpadding="0" cellspacing="3" align="left" id="buscador">
		        <tr>
					<td colspan="1" align="right" width="50"  class="etiqueta_form">Nombre:</td>
					<td colspan="1" align="left" width=""  class="etiqueta_form"><input type="text" name="faeNombre" id="faeNombre"  filtro="S" value="<?=$_SESSION["f_faeNombre"] ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>
               </tr>
               <tr>
	 	 	 	 	<td colspan="1" align="right" width="50"  class="etiqueta_form">Responsable:</td>
 	 	 	 		<td colspan="1" align="left" width=""  class="etiqueta_form"><input type="text" name="faeResponsable" id="faeResponsable"  filtro="S" value="<?=$_SESSION["f_faeResponsable"]?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()'/></td>
 	 	 	 	</tr>
                <tr>
			     	<td align="right"  colspan="2" class="etiqueta_form">
                    
                   </td>
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
        	<div id="frmitemsadmin" style=" width:100%; min-height:1050px; overflow:auto; "></div>
         </td>
    </tr>  
</table>
</div>
</form>
<? include("views/pie.php"); ?>