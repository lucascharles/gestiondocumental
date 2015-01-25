<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Empresa";
	
	$rs= $dato;
	
	$id = ($tipop=="M") ? $rs["consIdConstructora"] : "";
	$consIdConstructora = ($tipop=="M") ? $rs["consIdConstructora"] : "";
	$consEmail = ($tipop=="M") ? $rs["consEmail"] : "";
	$consEstado = ($tipop=="M") ? $rs["consEstado"] : "";
	$consFechaCreacion = ($tipop=="M") ? $rs["consFechaCreacion"] : "";
	$consFechaModificacion = ($tipop=="M") ? $rs["consFechaModificacion"] : "";
	$consNombreFantasia = ($tipop=="M") ? $rs["consNombreFantasia"] : "";
	$consRazonSocial = ($tipop=="M") ? $rs["consRazonSocial"] : "";
	$consRut = ($tipop=="M") ? $rs["consRut"] : "";
	$consTelefono = ($tipop=="M") ? $rs["consTelefono"] : "";
	$consTelefono2 = ($tipop=="M") ? $rs["consTelefono2"] : "";
	$consTelefono3 = ($tipop=="M") ? $rs["consTelefono3"] : "";
	$consUsuarioCreacion = ($tipop=="M") ? $rs["consUsuarioCreacion"] : "";
	$consUsuarioModificacion = ($tipop=="M") ? $rs["consUsuarioModificacion"] : "";
	$dirIdDireccion = ($tipop=="M") ? $rs["dirIdDireccion"] : "";
	$rplIdRepLegal = ($tipop=="M") ? $rs["rplIdRepLegal"] : "";

	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Empresa(Id: ".$consIdConstructora.")";
	}
?>
<form name="frmConstructora" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />
<input type="hidden" name="consIdConstructora" id="consIdConstructora" value="<? echo($consIdConstructora)?>" />
<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Rut:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consRut" id="consRut" value="<? echo(utf8_decode($consRut)); ?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Razon Social:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consRazonSocial" id="consRazonSocial" value="<? echo($consRazonSocial); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Nombre Fantasia:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consNombreFantasia" id="consNombreFantasia" value="<? echo($consNombreFantasia); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    
    <tr>
    	<td align="right" class="etiqueta_form">Email:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consEmail" id="consEmail" value="<? echo($consEmail); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
	<tr>
	<td align="right" class="etiqueta_form">Telefono:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="consTelefono" id="consTelefono" value="<? echo($consTelefono); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	

	<tr>
	<td align="right" class="etiqueta_form">Telefono (2):</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="consTelefono2" id="consTelefono2" value="<? echo($consTelefono2); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	
    	

	<tr>
		<td align="right" class="etiqueta_form">Telefono (3):</td>
		   <td align="left" class="etiqueta_form" colspan="1">
		   <input type="text" name="consTelefono3" id="consTelefono3" value="<? echo($consTelefono3); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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