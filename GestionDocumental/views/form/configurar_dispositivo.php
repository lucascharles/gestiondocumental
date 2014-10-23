<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Configurar Dispositivo";
	
	$id = ($tipop=="M") ? $dato->get_data("id") : "";
	
	$ubicacion = ($tipop=="M") ? $dato->get_data("ubicacion") : "";
	$posicion_relativa = ($tipop=="M") ? $dato->get_data("posicion_relativa") : "";
	$altura = ($tipop=="M") ? $dato->get_data("altura") : "";
	$id_tipo_alerta = ($tipop=="M") ? $dato->get_data("id_tipo_alerta") : "";
	$sensibilidad = ($tipop=="M") ? $dato->get_data("sensibilidad") : "";
	$id_modo_camara = ($tipop=="M") ? $dato->get_data("id_modo_camara") : "";
	$sensibilidad = ($tipop=="M") ? $dato->get_data("sensibilidad") : "";
	
	$disp_des = ($tipop=="M") ? $dispositivo->get_data("id_modo_camara") : "";
	$id_dispositivo = ($tipop=="M") ? $dispositivo->get_data("id") : "";
	
?>
<form name="frmConfigurarDispositivo" action="" method='post'>
<input type="hidden" name="id_dispositivo" id="id_dispositivo" value="<? echo($id_dispositivo)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Ubicaci&oacute;n:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="ubicacion" id="ubicacion" value="<? echo(utf8_decode($ubicacion)); ?>" valida="requerido" tipovalida="int" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Posici&oacute;n relativa:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="posicion_relativa" id="posicion_relativa" value="<? echo(utf8_decode($posicion_relativa)); ?>" valida="requerido" tipovalida="int" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Altura:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="altura" id="altura" value="<? echo(utf8_decode($altura)); ?>" valida="requerido" tipovalida="int" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Modo:</td>
        <td align="left" class="etiqueta_form" colspan="2">
        <select name="id_modo_camara" id="id_modo_camara"  valida="" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
            <?
			  for($j=0; $j<$col_modo_camara->get_count(); $j++)
			  {
				$datoTmp = &$col_modo_camara->items[$j];
				$selected = "";
				if($id_modo_camara == $datoTmp->get_data("id"))
				{
					$selected = "selected";
				}
			    echo("<option value=".$datoTmp->get_data("id")." ".$selected." >".utf8_decode($datoTmp->get_data("descripcion"))."</option>");           
			        }
    			?>
            </select>
        
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Tipo Alerta:</td>
        <td align="left" class="etiqueta_form" colspan="2">
        <select name="id_tipo_alerta" id="id_tipo_alerta"  valida="" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
        	<option value="0"></option>
            <?
			  for($j=0; $j<$col_tipo_alerta->get_count(); $j++)
			  {
				$datoTmp = &$col_tipo_alerta->items[$j];
				$selected = "";
				if($id_tipo_alerta== $datoTmp->get_data("id"))
				{
					$selected = "selected";
				}
			    echo("<option value=".$datoTmp->get_data("id")." ".$selected." >".utf8_decode($datoTmp->get_data("descripcion"))."</option>");           
			        }
    			?>
            </select>
        
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Sensibilidad:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="sensibilidad" id="sensibilidad" value="<? echo(utf8_decode($sensibilidad)); ?>" valida="requerido" tipovalida="int" class="input_form_min" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarFormConfigurar('<?=$controller?>')"  value="Grabar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirForm('<?=$controller?>')"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>