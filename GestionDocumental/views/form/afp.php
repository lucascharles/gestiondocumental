<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta AFP";
	
$rs = ($result=="") ? "" : mysql_fetch_array($result);	
$id = ($tipop=="M") ? $rs["afpIdAfp"] : "";
$afpEstado = ($tipop=="M") ? $rs["afpEstado"] : "";
$afpNombre = ($tipop=="M") ? $rs["afpNombre"] : "";
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n AFP(Id: ".$id.")";
	}
?>
<form name="frmAfp" action="" method='post'>
<input type="hidden" name="afpIdAfp" id="afpIdAfp" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Nombre AFP:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="afpNombre" id="afpNombre" value="<? echo(utf8_decode($afpNombre)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Estado:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="afpEstado" id="afpEstado" value="<? echo($afpEstado); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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