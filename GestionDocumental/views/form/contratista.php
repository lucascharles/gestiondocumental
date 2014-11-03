<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Contratista";
	
    $rs=mysql_fetch_array($dato);
	
	$id = ($tipop=="M") ? $rs["ctrIdContratista"] : "";
	$ctrIdContratista = ($tipop=="M") ? $rs["ctrIdContratista"] : "";
	$ccatIdAfiliado = ($tipop=="M") ? $rs["ccatIdAfiliado"] : "";
	$ctrEmail = ($tipop=="M") ? $rs["ctrEmail"] : "";
	$ctrEmailExpertoMutualidad = ($tipop=="M") ? $rs["ctrEmailExpertoMutualidad"] : "";
	$ctrEstado = ($tipop=="M") ? $rs["ctrEstado"] : "";
	$ctrFechaCreacion = ($tipop=="M") ? $rs["ctrFechaCreacion"] : "";
	$ctrFechaModificacion = ($tipop=="M") ? $rs["ctrFechaModificacion"] : "";
	$ctrFonoExpertoMutualidad = ($tipop=="M") ? $rs["ctrFonoExpertoMutualidad"] : "";
	$ctrIdAfiliadoMutualidad = ($tipop=="M") ? $rs["ctrIdAfiliadoMutualidad"] : "";
	$ctrIdServicioContratado = ($tipop=="M") ? $rs["ctrIdServicioContratado"] : "";
	$ctrIngresoFaena = ($tipop=="M") ? $rs["ctrIngresoFaena"] : "";
	$ctrNombreExpertoMutualidad = ($tipop=="M") ? $rs["ctrNombreExpertoMutualidad"] : "";
	$ctrNombreFantasia = ($tipop=="M") ? $rs["ctrNombreFantasia"] : "";
	$ctrNroActividadCab = ($tipop=="M") ? $rs["ctrNroActividadCab"] : "";
	$ctrNroActividadDet = ($tipop=="M") ? $rs["ctrNroActividadDet"] : "";
	$ctrRazonSocial = ($tipop=="M") ? $rs["ctrRazonSocial"] : "";
	$ctrRut = ($tipop=="M") ? $rs["ctrRut"] : "";
	$ctrTasaCotizacionActual = ($tipop=="M") ? $rs["ctrTasaCotizacionActual"] : "";
	$ctrTasaCotizacionTotal = ($tipop=="M") ? $rs["ctrTasaCotizacionTotal"] : "";
	$ctrTasaGenerica = ($tipop=="M") ? $rs["ctrTasaGenerica"] : "";
	$ctrTelefono = ($tipop=="M") ? $rs["ctrTelefono"] : "";
	$ctrTelefono2 = ($tipop=="M") ? $rs["ctrTelefono2"] : "";
	$ctrTelefono3 = ($tipop=="M") ? $rs["ctrTelefono3"] : "";
	$ctrUsuarioCreacion = ($tipop=="M") ? $rs["ctrUsuarioCreacion"] : "";
	$ctrUsuarioModificacion = ($tipop=="M") ? $rs["ctrUsuarioModificacion"] : "";
	$dirIdDirecion = ($tipop=="M") ? $rs["dirIdDirecion"] : "";
	$mutIdMutualidad = ($tipop=="M") ? $rs["mutIdMutualidad"] : "";
	$rplIdRepLegal = ($tipop=="M") ? $rs["rplIdRepLegal"] : "";
	$tjor_idTipoJornada = ($tipop=="M") ? $rs["tjor_idTipoJornada"] : "";

	
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Contratista(Id: ".$ctrIdContratista.")";
	}
?>
<form name="frmContratistas" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Rut:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="ctrRut" id="ctrRut" value="<? echo(utf8_decode($ctrRut)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Razon Social:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="ctrRazonSocial" id="ctrRazonSocial" value="<? echo($ctrRazonSocial); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Nombre Fantasia:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="ctrNombreFantasia" id="ctrNombreFantasia" value="<? echo($ctrNombreFantasia); ?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
<!--
    <tr>
    	<td align="right" class="etiqueta_form">Clave:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="password" name="clave" id="clave" value="<? echo($clave); ?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Fecha Alta:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="fec_alta" id="fec_alta" value="<? echo($fec_alta); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>

	<tr>
	<td align="right" class="etiqueta_form">Direccion:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="afp" id="afp" value="<? echo($fec_alta); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	

	<tr>
	<td align="right" class="etiqueta_form">Comuna:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="afp" id="afp" value="<? echo($fec_alta); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	
    	

        <tr>
     	<td align="right" class="etiqueta_form">Telefono:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="afp" id="afp" value="<? echo($fec_alta); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
     	
--> 
    	
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