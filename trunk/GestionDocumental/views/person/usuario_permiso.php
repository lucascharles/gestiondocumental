<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Permisos Usuario";
	
	$id = $dato->get_data("id");
	$id_usuario = $dato->get_data("id_usuario");
	$ape_usuario = $dato->get_data("ape_usuario");
	$nom_usu = $dato->get_data("nom_usuario");
?>
<form name="frm<?=$controller?>" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id_usuario)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Id:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <?=$id_usuario?>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Nombre:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <? echo(utf8_decode($nom_usu." ".$ape_usuario)); ?>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Rol:</td>
        <td align="left" class="etiqueta_form" colspan="1">
         <select name="id_rol" id="id_rol" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)" onchange="mostrarPermiso()">	
                    <?
                    for($i=0; $i<$col_rol->get_count(); $i++)
					{
						$dtmp = &$col_rol->items[$i];
						$selected = "";
						if($dtmp->get_data("id") == $id_rol_usu)
						{
							$selected = "selected='selected'";
						}
					?>
                    	<option value="<?=$dtmp->get_data("id")?>" <?=$selected?>><?=utf8_decode($dtmp->get_data("descripcion"))?> </option>
                    <?
					}
					?>
                    </select>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
     <tr>
    	<td align="right" class="etiqueta_form"></td>
        <td align="left" class="etiqueta_form" colspan="1">
        <div id='detalle_rol'> 
        
        </div>
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
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarFormPermisos('<?=$controller?>')"  value="Grabar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirFormPermisos('<?=$controller?>')"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>