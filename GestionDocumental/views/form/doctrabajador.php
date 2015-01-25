<? 
include("views/cabecera.php");
include("views/menu.php");

$trbNombre= $rs["trbNombre"];
$trbApPaterno= $rs["trbApPaterno"];
$trbIdTrabajador= $rs["trbIdTrabajador"];
$dirIdDireccion= $rs["dirIdDireccion"];
$comIdComuna= $rs["comIdComuna"];
$isaIdIsapre= $rs["isaIdIsapre"];
$nacIdNacionalidad= $rs["nacIdNacionalidad"];
$tgrlIdCargoContractual= $rs["tgrlIdCargoContractual"];
$tgrlIdOficioCab= $rs["tgrlIdOficioCab"];
$tgrlIdOficioDet= $rs["tgrlIdOficioDet"];
$tgrlIdTipoContrato= $rs["tgrlIdTipoContrato"];
$tjorIdTipoJornada= $rs["tjorIdTipoJornada"];
$trbAfectoArt22= $rs["trbAfectoArt22"];
$trbAntiguedadMeses= $rs["trbAntiguedadMeses"];
$trbApMaterno= $rs["trbApMaterno"];
$trbCeco= $rs["trbCeco"];
$trbFechaNac= $rs["trbFechaNac"];
$trbTelefono= $rs["trbTelefono"];
$trbTitulo= $rs["trbTitulo"];
$trbRut= $rs["trbRut"];

	if($id_f =="" ){
		$id_f = $_SESSION["id_f"];
	}
	if($id_c =="" ){
		$id_c = $_SESSION["id_c"];
	}
	if($id_t =="" ){
		$id_t = $_SESSION["id_t"];
	}

 ?>

<form name="frmcargadoc" enctype='multipart/form-data' method='post' action='' target='_self'>
<input type="hidden" name="id_faena" filtro = "S" id="id_faena" value="<?=$id_f?>" />
<input type="hidden" name="id_trabajador" filtro = "S"  id="id_trabajador" value="<? echo($id_t)?>" />
<input type="hidden" name="id_contratista" filtro = "S"  id="id_contratista" value="<?=$id_c?>" />
<input type="hidden" name="controller" id="controller" value="<?=$controller?>" />

<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario" height="" width="70%" >
	<tr>
		<th align="left" colspan="3">Carga documentos del trabajador</th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
   <tr>
		<td align="left" class="etiqueta_form" colspan="2">Nombre:&nbsp;<?=$trbNombre . " ". $trbApPaterno?></td>
        <td align="right"><input  type="button" name="btnsalir" id="btnsalir" onclick="volverDocContratista('<?=$controller?>',<?=$id_c?>)"  value="Volver" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/></td>
    </tr>
     <tr>
		<td align="left" class="etiqueta_form" colspan="3">Rut:&nbsp;<?=$trbRut?></td>
    </tr>
    <tr>
		<td align="left" class="etiqueta_form">Fecha Nac.:&nbsp;<?=$trbFechaNac?></td>
        <td align="left" class="etiqueta_form"></td>
        <td align="left" class="etiqueta_form"></td>
    </tr>
    <tr>
        <td align="left" class="etiqueta_form"></td>
        <td align="left" class="etiqueta_form"></td>
    </tr>
     <tr>
        <td colspan="3" height="5">
         </td>
    </tr>
   
    <tr>
        <td colspan="3" height="5">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
        	
        </table>
         </td>
    </tr>
    <tr>
        <td colspan="3" height="5" valign="top">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#55A79A">
	        
	        <tr>
            	<td colspan="<?=$cont?>">
        	Grupo documento:
			<select name="id_tipo_documento" id="id_tipo_documento" valida="" filtro="S" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" onchange="llenarFiltro(this,document.getElementById('id_sub_tipodocumento'),'TIPODOC_SUTIPODOC')">
		   	<?
		   			while($rs=mysql_fetch_array($grupo_doc))
					{
						$selected = "";
						if($tipoDoc["id"] == $rs["id"]) $selected = "selected='selected'";
			?>
				<option value="<?=$rs["id"]?>" <?=$selected?> > <? echo($rs["descripcion"]); ?> </option>
			<?
					  }
		    ?>
		   </select>
                </td>
           </tr>
		   
	        <tr>
            	<td colspan="<?=$cont?>">
        	Tipo documento:
			<select name="id_sub_tipodocumento" id="id_sub_tipodocumento" valida="" filtro="S" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange='mostrar(this)'>
		   	<?
		   			while($rs=mysql_fetch_array($rs_tip_doc))
					{
						$selected = "";
						if($subTipoDoc["id"] == $rs["id"]) $selected = "selected='selected'";
						$tipoDoc = $rs["id"];
			?>
				<option value="<?=$rs["id"]?>" <?=$selected?> > <? echo($rs["descripcion"]); ?> </option>
			<?
					  }
		    ?>
		   </select>
                </td>
            </tr>
	        
            
            <? if($tipoDoc==28||$tipoDoc==29||$tipoDoc==11) {?>
	        <tr>
            	<td colspan="<?=$cont?>">
                Nombre:
                <!-- <input type="text" name="doctNombreArchivo" id="doctNombreArchivo" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)" /> -->
                 <select name="doctNombreArchivo" id="doctNombreArchivo" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
					<option value="Enero" > Enero </option>
					<option value="Febrero" > Febrero </option>
					<option value="Marzo" > Marzo </option>
					<option value="Abril" > Abril </option>
					<option value="Mayo" > Mayo </option>
					<option value="Junio" > Junio </option>
					<option value="Julio" > Julio </option>
					<option value="Agosto" > Agosto </option>
					<option value="Septiembre" > Septiembre </option>
					<option value="Octubre" > Octubre </option>
					<option value="Noviembre" > Noviembre </option>
					<option value="Diciembre" > Diciembre </option>
				
	   			 </select>
                
                </td>
            </tr>
            <? } else { ?>
            
            <tr>
            	<td colspan="<?=$cont?>">
                Nombre: <input type="text" name="doctNombreArchivo" id="doctNombreArchivo" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)" />
                </td>
            </tr>
            
            
            <? } ?>
            <tr>
            	<td colspan="<?=$cont?>">
                Archivo: <input type='file' id='archivo' name='archivo' />&nbsp;<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarFormUploadArch(<?=$_SESSION["f_id_tipo_documento"]?>)"  value="Adjuntar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
                </td>
            </tr>
            <tr>
            <td colspan="<?=$cont?>">
            <table width="100%" cellpadding="0" cellspacing="1" align="center" border="0" bgcolor="#ffffff" id="listado_home">
        		<tr>
            	<th colspan="5">Documentos</th>
            	</tr>
				<tr>
        			<td colspan="3" valign="top">
        	  			<div id="frmitemsadmin" style=" width:100%; min-height:1050px; overflow:auto;"></div>
         			</td>
    			</tr>  
            </table>
            </td>
            </tr>
        </table>
         </td>
    </tr>
    <tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>   
    <tr>
        <td colspan="3" align="center" height="50">
        	
         </td>
    </tr>
</table>
</form>

</body>
</html>