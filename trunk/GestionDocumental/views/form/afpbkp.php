<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta AFP";
	
//	$id = ($tipop=="M") ? $dato->get_data("id") : "";
//	$id_usuario = ($tipop=="M") ? $dato->get_data("id_usuario") : "";
//	$ape_usuario = ($tipop=="M") ? $dato->get_data("ape_usuario") : "";
//	$nom_usu = ($tipop=="M") ? $dato->get_data("nom_usuario") : "";
//	$clave = ($tipop=="M") ? $dato->get_data("clave") : "";
//	$fec_alta = ($tipop=="M" && $dato->get_data("fec_alta")<>"0000-00-00") ? formatoFecha($dato->get_data("fec_alta"),"yyyy-mm-dd H:m:s","dd/mm/yyyy") : "";
	
	$afpIdAfp = ($tipop=="M") ? $dato->get_data("afpIdAfp") : ""; 
	$afpEstado = ($tipop=="M") ? $dato->get_data("afpEstado") : "";
	$afpFechaCreacion = ($tipop=="M") ? $dato->get_data("afpFechaCreacion") : "";
	$afpFechaModificacion = ($tipop=="M") ? $dato->get_data("afpFechaModificacion") : "";
	$afpNombre = ($tipop=="M") ? $dato->get_data("afpNombre") : "";
	$afpUsuarioCreacion = ($tipop=="M") ? $dato->get_data("afpUsuarioCreacion") : "";),
	$afpUsuarioModificacion = ($tipop=="M") ? $dato->get_data("afpUsuarioCreacion") : "";
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n AFP(Id: ".$afpIdAfp .")";
	}
?>
<form name="frmAfp" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($afpIdAfp)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
<!--
	<tr>
		<td align="right" class="etiqueta_form">Nombre AFP:</td>
		   <td align="left" class="etiqueta_form" colspan="1">
		   <input type="text" name="afpNombre" id="afpNombre" value="<? echo($afpNombre); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
		   </td>
		   <td align="left" class="etiqueta_form" >
		  
		   </td>
	 </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Estado:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="afpEstado" id="afpEstado" value="<? echo($afpEstado); ?>" valida="" tipovalida="text" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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