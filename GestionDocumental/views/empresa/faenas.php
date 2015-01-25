<? 	include("views/cabecera_front.php"); 
 	include("views/menu_front.php"); 
 
 	$label = "Agencias";

	$titulo_form = "Agencias";

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
					<td colspan="1" align="right" width="5"  class="etiqueta_form">Periodo:</td>
					<td colspan="1" align="left" width="80"  class="etiqueta_form"><input type="text" name="periodo" id="periodo"  filtro="S" value="<?echo(date('Y')) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>
               </tr>
        	
        		<tr>
					<td colspan="1" align="right" width="30"  class="etiqueta_form">Agencia:</td>
					<td colspan="1" align="left" width="55"  class="etiqueta_form"><input type="text" name="faeNombre" id="faeNombre"  filtro="S" value="<?=$_SESSION["f_faeNombre"] ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="1"/></td>
               </tr>
               <tr>
	 	 	 	 	<td colspan="1" align="right" width="30"  class="etiqueta_form">Encargado:</td>
 	 	 	 		<td colspan="1" align="left" width="55"  class="etiqueta_form"><input type="text" name="faeResponsable" id="faeResponsable"  filtro="S" value="<?=$_SESSION["f_faeResponsable"]?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="2"/></td>
 	 	 	 	</tr>
                <tr>
			     	<td colspan="1" align="right" width="30"  class="etiqueta_form"></td>
			     	<td colspan="1" align="right" width="55"  class="etiqueta_form"></td>
			    </tr>
             </table>
         <td>
    </tr>

<!--     <tr> -->
<!--     	<td colspan="4"> -->
<!--     		<table width="100%" border="0" cellpadding="0" cellspacing="3" align="right" id="leyendas"> -->
<!--          		<tr> -->
<!--             		<td colspan="2" align="right" width="80" class="etiqueta_form"></td> -->
<!--             		<td align="right" width="5" class="etiqueta_form">Sin Subir:<img src="images/alerta.png"  /> </td> -->
<!--                 	<td align="right" width="5" class="etiqueta_form">Sin Revisar:<img src="images/advertencia.png"  /></td> -->
<!--                 	<td align="right" width="5" class="etiqueta_form">Rechazado:<img src="images/cancelar.gif"  /></td> -->
<!--                 	<td align="right" width="5" class="etiqueta_form">Aprobado:<img src="images/activar.gif"  /></td> -->
<!--             	</tr> -->
<!--         	</table> -->
<!--     	</td> -->
<!--     </tr> -->

    
    <tr>
    	<td colspan="4">
        	<? include("views/help.php") ?>
            
    	</td>
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