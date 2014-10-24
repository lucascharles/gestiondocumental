
<?
	$titulo_form = "Contrato de Trabajo";
	
// $id = ($tipop=="M") ? $dato->get_data("afpIdAfp") : "";
// $afpEstado = ($tipop=="M") ? $dato->get_data("afpEstado") : "";
// $afpFechaCreacion = ($tipop=="M") ? $dato->get_data("afpFechaCreacion") : "";
// $afpFechaModificacion = ($tipop=="M") ? $dato->get_data("afpFechaModificacion") : "";
// $afpNombre = ($tipop=="M") ? $dato->get_data("afpNombre") : "";
// $afpUsuarioCreacion = ($tipop=="M") ? $dato->get_data("afpUsuarioCreacion") : "";
// $afpUsuarioModificacion = ($tipop=="M") ? $dato->get_data("afpUsuarioModificacion") : "";
	
// 	if($tipop=="M")
// 	{
// 		$titulo_form = "Edici&oacute;n AFP(Id: ".$id.")";
// 	}
?>
<form name="frmAfp" action="" method='post'>
<input type="hidden" name="afpIdAfp" id="afpIdAfp" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
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
