<? 	include("views/cabecera_front.php"); 
 	include("views/menu_front.php"); 
 
 	$label = "Trabajador";

	$titulo_form = "ADMINISTRAR TRABAJADORES";

	include("views/empresa/popup_confirmacion.php"); 
		
 ?>
<form name="frmusuario">
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
    	<td colspan="3" align="left">
        	<table width="100%" border="0" cellpadding="0" cellspacing="3" align="left" id="buscador">
		        <tr>
					<td colspan="1" align="right" width="50"  class="etiqueta_form">Contratista&nbsp;</td>
                    <td colspan="2" align="left" class="etiqueta_form">
                    
                    	<select name="ctrIdContratista" id="ctrIdContratista" filtro ="S" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="mostrar()" tabindex="0">
								<option value=""></option>
				   			<?
				   			while($rs=mysql_fetch_array($result))
							{
								$selected = "";
								if($_SESSION["f_ctrIdContratista"] == $rs["ctrIdContratista"])$selected = "selected='selected'";
						    ?>
							   <option value="<?=$rs["ctrIdContratista"]?>" <?=$selected?>> <? echo($rs["ctrNombreFantasia"]); ?> </option>
							<?
							  }
				    		?>
            			</select>
                    	
                    </td>
			    </tr>
                <tr>
                	<td colspan="1" align="right" width="50"  class="etiqueta_form">Apellido&nbsp;</td>
					<td colspan="2" align="left" class="etiqueta_form"><input type="text" name="trbApPaterno" id="trbApPaterno"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' />
                    &nbsp;&nbsp;&nbsp;Nombre&nbsp;
                    <input type="text" name="trbNombre" id="trbNombre"  filtro="S" value="<? echo($_SESSION["f_nombre"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' />
                    </td>
			    </tr>
               
                <tr>
			     	<td align="right"  colspan="3" class="etiqueta_form">
                    <table class="opciones" onclick="nuevoRegistro('<?=$controller?>')" title="Nuevo Trabajador">
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