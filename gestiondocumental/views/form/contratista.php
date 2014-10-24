<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Contratista";
	
//	$id = ($tipop=="M") ? $dato->get_data("id") : "";
//	$id_usuario = ($tipop=="M") ? $dato->get_data("id_usuario") : "";
//	$ape_usuario = ($tipop=="M") ? $dato->get_data("ape_usuario") : "";
//	$nom_usu = ($tipop=="M") ? $dato->get_data("nom_usuario") : "";
//	$clave = ($tipop=="M") ? $dato->get_data("clave") : "";
//	$fec_alta = ($tipop=="M" && $dato->get_data("fec_alta")<>"0000-00-00") ? formatoFecha($dato->get_data("fec_alta"),"yyyy-mm-dd H:m:s","dd/mm/yyyy") : "";
	
	$id = ($tipop=="M") ? $dato->get_data("ctrIdContratista") : "";
	$ctrIdContratista = ($tipop=="M") ? $dato->get_data("ctrIdContratista") : "";
	$ccatIdAfiliado = ($tipop=="M") ? $dato->get_data("ccatIdAfiliado") : "";
	$ctrEmail = ($tipop=="M") ? $dato->get_data("ctrEmail") : "";
	$ctrEmailExpertoMutualidad = ($tipop=="M") ? $dato->get_data("ctrEmailExpertoMutualidad") : "";
	$ctrEstado = ($tipop=="M") ? $dato->get_data("ctrEstado") : "";
	$ctrFechaCreacion = ($tipop=="M") ? $dato->get_data("ctrFechaCreacion") : "";
	$ctrFechaModificacion = ($tipop=="M") ? $dato->get_data("ctrFechaModificacion") : "";
	$ctrFonoExpertoMutualidad = ($tipop=="M") ? $dato->get_data("ctrFonoExpertoMutualidad") : "";
	$ctrIdAfiliadoMutualidad = ($tipop=="M") ? $dato->get_data("ctrIdAfiliadoMutualidad") : "";
	$ctrIdServicioContratado = ($tipop=="M") ? $dato->get_data("ctrIdServicioContratado") : "";
	$ctrIngresoFaena = ($tipop=="M") ? $dato->get_data("ctrIngresoFaena") : "";
	$ctrNombreExpertoMutualidad = ($tipop=="M") ? $dato->get_data("ctrNombreExpertoMutualidad") : "";
	$ctrNombreFantasia = ($tipop=="M") ? $dato->get_data("ctrNombreFantasia") : "";
	$ctrNroActividadCab = ($tipop=="M") ? $dato->get_data("ctrNroActividadCab") : "";
	$ctrNroActividadDet = ($tipop=="M") ? $dato->get_data("ctrNroActividadDet") : "";
	$ctrRazonSocial = ($tipop=="M") ? $dato->get_data("ctrRazonSocial") : "";
	$ctrRut = ($tipop=="M") ? $dato->get_data("ctrRut") : "";
	$ctrTasaCotizacionActual = ($tipop=="M") ? $dato->get_data("ctrTasaCotizacionActual") : "";
	$ctrTasaCotizacionTotal = ($tipop=="M") ? $dato->get_data("ctrTasaCotizacionTotal") : "";
	$ctrTasaGenerica = ($tipop=="M") ? $dato->get_data("ctrTasaGenerica") : "";
	$ctrTelefono = ($tipop=="M") ? $dato->get_data("ctrTelefono") : "";
	$ctrTelefono2 = ($tipop=="M") ? $dato->get_data("ctrTelefono2") : "";
	$ctrTelefono3 = ($tipop=="M") ? $dato->get_data("ctrTelefono3") : "";
	$ctrUsuarioCreacion = ($tipop=="M") ? $dato->get_data("ctrUsuarioCreacion") : "";
	$ctrUsuarioModificacion = ($tipop=="M") ? $dato->get_data("ctrUsuarioModificacion") : "";
	$dirIdDirecion = ($tipop=="M") ? $dato->get_data("dirIdDirecion") : "";
	$mutIdMutualidad = ($tipop=="M") ? $dato->get_data("mutIdMutualidad") : "";
	$rplIdRepLegal = ($tipop=="M") ? $dato->get_data("rplIdRepLegal") : "";
	$tjor_idTipoJornada = ($tipop=="M") ? $dato->get_data("tjor_idTipoJornada") : "";

	
	
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