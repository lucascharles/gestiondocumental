<? 	include("views/cabecera_front.php"); 
 	include("views/menu_front.php"); 
 
 	$label = "Trabajador";

	$titulo_form = "Administrar Trabajadores";

	include("views/empresa/popup_confirmacion.php"); 
	
	
		
 ?>
<form name="frmTrabajador" >
<input type="hidden" name="controller" id="controller" value="<?=$controller?>" />
<input type="hidden" name="id_reg" id="id_reg" value="" />
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
					<td colspan="1" align="right" width="50"  class="etiqueta_form">Faena&nbsp;</td>
                    <td colspan="2" align="left" class="etiqueta_form">
                    
                    	<select name="id_faena" id="id_faena" filtro="S" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="mostrar(); refrescarAdmin('<?=$controller?>');" tabindex="0">
                        	<option></option>
				   			<?
				   			while($rs=mysql_fetch_array($result))
							{
								if(!$_SESSION["f_id_faena"]>0) $_SESSION["f_id_faena"] = $rs["id"];
								$selected = "";
								if($_SESSION["f_id_faena"] == $rs["id"])$selected = "selected='selected'";
						    ?>
							   <option value="<?=$rs["id"]?>" <?=$selected?>> <? echo($rs["faeNombre"]); ?> </option>
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
                    <?
                    $hidden = "";
					if(isset($_SESSION["bloqueo"]))
					{
						if(in_array($_SESSION["f_id_faena"],$_SESSION["bloqueo"])) $hidden = "style='display:none;'";
					}
					?>
                    <table class="opciones" onclick="nuevoRegistro('<?=$controller?>')" title="Nuevo Trabajador">
                        <tr>
                            <td align="right" valign="middle">
                            <img src="images/nuevoregistro.png" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)" <?=$hidden?>/>
                            </td>
                            <td align="left" valign="middle" >
                            <font <?=$hidden?>>Nuevo </font>
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