<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Faena";
	
// 	$id = ($tipop=="M") ? $dato->get_data("id") : "";
// 	$id_usuario = ($tipop=="M") ? $dato->get_data("id_usuario") : "";
// 	$ape_usuario = ($tipop=="M") ? $dato->get_data("ape_usuario") : "";
// 	$nom_usu = ($tipop=="M") ? $dato->get_data("nom_usuario") : "";
// 	$clave = ($tipop=="M") ? $dato->get_data("clave") : "";
// 	$fec_alta = ($tipop=="M" && $dato->get_data("fec_alta")<>"0000-00-00") ? formatoFecha($dato->get_data("fec_alta"),"yyyy-mm-dd H:m:s","dd/mm/yyyy") : "";
	
	$id = ($tipop=="M") ? $dato->get_data("faeIdFaenas") : "";
	$faeIdFaenas = ($tipop=="M") ? $dato->get_data("faeIdFaenas") : "";
	$consIdConstructora = ($tipop=="M") ? $dato->get_data("consIdConstructora") : "";
	$dirIdDireccion = ($tipop=="M") ? $dato->get_data("dirIdDireccion") : "";
	$faeEstado = ($tipop=="M") ? $dato->get_data("faeEstado") : "";
	$faeFechaCreacion = ($tipop=="M") ? $dato->get_data("faeFechaCreacion") : "";
	$faeFechaInicio = ($tipop=="M") ? $dato->get_data("faeFechaInicio") : "";
	$faeFechaModificacion = ($tipop=="M") ? $dato->get_data("faeFechaModificacion") : "";
	$faeFechaTermino = ($tipop=="M") ? $dato->get_data("faeFechaTermino") : "";
	$faeIdFaenaPadre = ($tipop=="M") ? $dato->get_data("faeIdFaenaPadre") : "";
	$faeNombre = ($tipop=="M") ? $dato->get_data("faeNombre") : "";
	$faeResponsable = ($tipop=="M") ? $dato->get_data("faeResponsable") : "";
	$faeTelefono = ($tipop=="M") ? $dato->get_data("faeTelefono") : "";
	$faeUsuarioCreacion = ($tipop=="M") ? $dato->get_data("faeUsuarioCreacion") : "";
	$faeUsuarioModificacion = ($tipop=="M") ? $dato->get_data("faeUsuarioModificacion") : "";
	
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Faena(Id: ".$faeIdFaenas.")";
	}
?>
<form name="frmFaenas" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>

   <tr>
   		<td align="right" class="etiqueta_form">Constructora:</td>
   		<td align="left" class="etiqueta_form" colspan="1">
   			<select name="consIdConstructora" id="consIdConstructora"  valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
				<option value="">Seleccion</option>
   			<?
            $coleccion = $listConstructoras[0];
            $cant = $listConstructoras[1];
			  for($j=0; $j<$cant; $j++)
			  {
				$datoTmp = &$coleccion->items[$j];
		    ?>
			   <option value="<?=$datoTmp->get_data("consIdConstructora")?>" > <? echo($datoTmp->get_data("consRazonSocial")); ?> </option>
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
           <input type="text" name="faeFechaInicio" id="faeFechaInicio" value="<? echo($faeFechaInicio); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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