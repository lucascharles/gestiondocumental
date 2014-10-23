<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Faena";
	
	$id = ($tipop=="M") ? $dato->get_data("id") : "";
	$id_usuario = ($tipop=="M") ? $dato->get_data("id_usuario") : "";
	$ape_usuario = ($tipop=="M") ? $dato->get_data("ape_usuario") : "";
	$nom_usu = ($tipop=="M") ? $dato->get_data("nom_usuario") : "";
	$clave = ($tipop=="M") ? $dato->get_data("clave") : "";
	$fec_alta = ($tipop=="M" && $dato->get_data("fec_alta")<>"0000-00-00") ? formatoFecha($dato->get_data("fec_alta"),"yyyy-mm-dd H:m:s","dd/mm/yyyy") : "";
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Faena(Id: ".$id_usuario.")";
	}
?>
<form name="frmUsuario" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>

	<tr>
    	<td align="right" class="etiqueta_form">Constructora:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        
        <select name="consIdConstructora" id="consIdConstructora" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)" onchange="mostrar()">	
                    <option value="">Seleccione</option>
                    <?
//                     for($i=0; $i<$constructoras->get_count(); $i++)
// 					{
// 						$dtmp = &$constructoras->items[$i];
						
					?>
                    	<option value="<?=$dtmp->get_data("id")?>"> <?=utf8_decode($dtmp->get_data("consNombre"))?> </option>
                    <?
// 					}
					?>
        </select>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
	
	<tr>
		<td align="right" class="etiqueta_form">Nombre Faena:</td>
		   <td align="left" class="etiqueta_form" colspan="1">
		   <input type="text" name="ape_usuario" id="ape_usuario" value="<? echo($ape_usuario); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
		   </td>
		   <td align="left" class="etiqueta_form" >
		  
		   </td>
	 </tr>
     <tr>
    	<td align="right" class="etiqueta_form">Fecha Inicio:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="fec_alta" id="fec_alta" value="<? echo($fec_alta); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
       	<td align="right" class="etiqueta_form">Fecha Fin:</td>
           <td align="left" class="etiqueta_form" colspan="1">
           <input type="text" name="fec_alta" id="fec_alta" value="<? echo($fec_alta); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
           </td>
           <td align="left" class="etiqueta_form" >
          
           </td>
       </tr>
        <tr>
       	<td align="right" class="etiqueta_form">Responsable:</td>
           <td align="left" class="etiqueta_form" colspan="1">
           <input type="text" name="fec_alta" id="fec_alta" value="<? echo($fec_alta); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
           </td>
           <td align="left" class="etiqueta_form" >
          
           </td>
       </tr>
        <tr>
       	<td align="right" class="etiqueta_form">Telefono:</td>
           <td align="left" class="etiqueta_form" colspan="1">
           <input type="text" name="fec_alta" id="fec_alta" value="<? echo($fec_alta); ?>" valida="" tipovalida="fecha" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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
<!-- </div>  -->
</form>
<? include("views/pie.php"); ?>