<? 	include("views/cabecera.php"); 
 	include("views/menu.php"); 
 
 	$label = "Afp";

	$titulo_form = "ADMINISTRAR AFPs";

	include("views/popup_confirmacion.php"); 
	
 ?>
<form name="frmAfp">
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
					<td colspan="1" align="right" width="50"  class="etiqueta_form">Nombre:</td>
					<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="afpNombre" id="afpNombre"  filtro="S" value="<? echo($_SESSION["f_afpNombre"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>

 	 	 	 	 	<td colspan="2" align="left" width="50"  class="etiqueta_form"></td>
                    
			    </tr>
               
               
                <tr>
			     	<td align="right"  colspan="4" class="etiqueta_form">
                    <table class="opciones" onclick="nuevoRegistro('<?=$controller?>')" title="Nueva AFP">
                        <tr>
                            <td align="right" valign="middle">
                            <img src="images/nuevoregistro.png" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)"/>
                            </td>
                            <td align="left" valign="middle" >
                            Nuevo 
                            </td>
                        </tr>
                    </table>
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
            <div id="frmitemsadmin" style=" width:100%; min-height:1050px; overflow:auto;"></div>
         </td>
    </tr>  
</table>
</div>
</form>
<? include("views/pie.php"); ?>