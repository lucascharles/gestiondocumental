<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Dispositivo";
	
	$id = ($tipop=="M") ? $dato->get_data("id") : "";
	$descripcion = ($tipop=="M") ? $dato->get_data("descripcion") : "";
	$nro_serie = ($tipop=="M") ? $dato->get_data("nro_serie") : "";
	$marca= ($tipop=="M") ? $dato->get_data("marca") : "";
	$modelo = ($tipop=="M") ? $dato->get_data("modelo") : "";
	$id_tipo_dispositivo = ($tipop=="M") ? $dato->get_data("id_tipo_dispositivo") : "";	
	$id_estado_dispositivo = ($tipop=="M") ? $dato->get_data("id_estado_dispositivo") : "";	
	$direccion_ip = ($tipop=="M") ? $dato->get_data("direccion_ip") : "";
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Dispositivo(Nro. Serie: ".$nro_serie.")";
	}
?>
<form name="frmDispositivo" action="" method='post'>
<input type="hidden" name="id_dispositivo" id="id_dispositivo" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Descripci&oacute;n:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="descripcion" id="descripcion" value="<? echo(utf8_decode($descripcion)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Direcci&oacute;n IP:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="direccionip" id="direccionip" value="<? echo(utf8_decode($direccion_ip)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Nro. Serie:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="nro_serie" id="nro_serie" value="<? echo(utf8_decode($nro_serie)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Marca:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="marca" id="marca" value="<? echo(utf8_decode($marca)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Modelo:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="modelo" id="modelo" value="<? echo(utf8_decode($modelo)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Tipo:</td>
        <td align="left" class="etiqueta_form" colspan="2">
        <select name="id_tipo_dispositivo" id="id_tipo_dispositivo"  valida="" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
            <?
			  for($j=0; $j<$col_tipo_dispositivo->get_count(); $j++)
			  {
				$datoTmp = &$col_tipo_dispositivo->items[$j];
				$selected = "";
				if($id_tipo_dispositivo== $datoTmp->get_data("id"))
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
    	<td align="right" class="etiqueta_form">Estado:</td>
        <td align="left" class="etiqueta_form" colspan="2">
        <select name="id_estado_dispositivo" id="id_estado_dispositivo"  valida="" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
            <?
			  for($j=0; $j<$col_estado_dispositivo->get_count(); $j++)
			  {
				$datoTmp = &$col_estado_dispositivo->items[$j];
				$selected = "";
				if($id_estado_dispositivo== $datoTmp->get_data("id"))
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