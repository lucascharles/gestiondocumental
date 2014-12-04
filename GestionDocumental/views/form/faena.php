<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Faena";
	

	$id = ($tipop=="M") ? $dato["faeIdFaenas"] : "";
	$consIdConstructora = ($tipop=="M") ? $dato["consIdConstructora"] : "";
	$dirIdDireccion = ($tipop=="M") ? $dato["dirIdDireccion"] : "";
	$faeEstado = ($tipop=="M") ? $dato["faeEstado"] : "";
	$faeFechaInicio = ($tipop=="M") ? formatoFecha($dato["faeFechaInicio"],"yyyy-mm-dd", "dd/mm/yyyy") : "";
	$faeFechaTermino = ($tipop=="M") ? formatoFecha($dato["faeFechaTermino"],"yyyy-mm-dd","dd/mm/yyyy") : "";
	$faeIdFaenaPadre = ($tipop=="M") ? $dato["faeIdFaenaPadre"] : "";
	$faeNombre = ($tipop=="M") ? $dato["faeNombre"] : "";
	$faeResponsable = ($tipop=="M") ? $dato["faeResponsable"] : "";
	$faeTelefono = ($tipop=="M") ? $dato["faeTelefono"] : "";
	$consRazonSocial = ($tipop=="M") ? $cons["consRazonSocial"] : "";
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Faena(Id: ".$id.")";
	}
?>
<form name="frmFaenas" action="" method='post'>
<input type="hidden" name="id_reg" id="id_reg" value="<?=$id?>" />
<input type="hidden" name="tipop" id="tipop" value="<?=$tipop?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>

   <tr>
   		<td align="right" class="etiqueta_form">Constructora:</td>
   		<td align="left" class="etiqueta_form" colspan="1">
   			<select name="consIdConstructora" id="consIdConstructora"  valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">			
   			<?
			while($rs=mysql_fetch_array($idsql_constructora))
			{
				$selected = "";
				if($rs["consIdConstructora"] == $consIdConstructora) $selected = "selected='selected'";
		    ?>
			   <option value="<?=$rs["consIdConstructora"]?>" <?=$selected?> > <?=$rs["consRazonSocial"]?> </option>
			<?
			  }
    		?>
            </select>
        </td>
   </tr>

	<tr>
		<td align="right" class="etiqueta_form">Nombre Faena:</td>
		   <td align="left" class="etiqueta_form" colspan="1">
		   <input type="text" name="faeNombre" id="faeNombre" value="<? echo($faeNombre); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
		   </td>
		   <td align="left" class="etiqueta_form" >
		  
		   </td>
	 </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Fecha Inicio:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="faeFechaInicio" id="faeFechaInicio" value="<? echo($faeFechaInicio); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
       	<td align="right" class="etiqueta_form">Fecha Fin:</td>
           <td align="left" class="etiqueta_form" colspan="1">
           <input type="text" name="faeFechaTermino" id="faeFechaTermino" value="<? echo($faeFechaTermino); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
           </td>
           <td align="left" class="etiqueta_form" >
          
           </td>
       </tr>
        <tr>
       	<td align="right" class="etiqueta_form">Responsable:</td>
           <td align="left" class="etiqueta_form" colspan="1">
           <input type="text" name="faeResponsable" id="faeResponsable" value="<? echo($faeResponsable); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
           </td>
           <td align="left" class="etiqueta_form" >
          
           </td>
       </tr>
        <tr>
       	<td align="right" class="etiqueta_form">Telefono:</td>
           <td align="left" class="etiqueta_form" colspan="1">
           <input type="text" name="faeTelefono" id="faeTelefono" value="<? echo($faeTelefono); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
           </td>
           <td align="left" class="etiqueta_form" >
          
           </td>
       </tr>

    	
    <tr>
        <td colspan="3" height="5">
         </td>
    </tr>
    <tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>   
    <tr>
        <td colspan="3" align="center" height="50">
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarForm('<?=$controller?>')"  value="Grabar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirForm('<?=$controller?>')"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>