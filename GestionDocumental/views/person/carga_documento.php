<? 
include("views/cabecera.php");
include("views/menu.php");

 ?>

<form name="frmcargadoc" enctype='multipart/form-data' method='post' action='' target='_self'>
<input type="hidden" name="id_faena" id="id_faena" value="<? echo($id_f)?>" />
<input type="hidden" name="id_trabajador" id="id_trabajador" value="<? echo($id_t)?>" />
<input type="hidden" name="id_sub_tipodocumento" id="id_sub_tipodocumento" value="<? echo($id_d)?>" />
<input type="hidden" name="id_contratista" id="id_contratista" value="<? echo($id_c)?>" />

<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario" height="" width="70%" >
	<tr>
		<th align="left" colspan="3">Carga documentos</th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
   <tr>
		<td align="left" class="etiqueta_form" colspan="2">Contratista:&nbsp;<?=$dato["ctrRazonSocial"]?></td>
        <td align="right"><input  type="button" name="btnsalir" id="btnsalir" onclick="volverDocContratista('<?=$controller?>',<?=$id_c?>)"  value="Volver" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/></td>
    </tr>
     <tr>
		<td align="left" class="etiqueta_form" colspan="3">Faena:&nbsp;<?=$rs_faena["faeNombre"]?></td>
    </tr>
    <tr>
		<td align="left" class="etiqueta_form">Trabajador:&nbsp;<?=$rs_trabajador["trbNombre"]?></td>
        <td align="left" class="etiqueta_form"></td>
        <td align="left" class="etiqueta_form"></td>
    </tr>
    <tr>
		<td align="left" class="etiqueta_form">Documento:&nbsp;<?=$rs_sub_doc["descripcion"]?></td>
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
                Nombre: <input type="text" name="doctNombreArchivo" id="doctNombreArchivo" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)" />
                </td>
            </tr>
            <tr>
            	<td colspan="<?=$cont?>">
                Archivo: <input type='file' id='archivo' name='archivo' />&nbsp;<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarFormUploadArch(<?=$_SESSION["f_id_tipo_documento"]?>)"  value="Adjuntar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
                </td>
            </tr>
            <tr>
            <td colspan="<?=$cont?>">
            <table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado_home">
        		<tr>
            	<th></th><th>Documento</th>
            	</tr>
            	<?
				if($idsql_doc > '')
				{
                while($rs=mysql_fetch_array($idsql_doc))
				{
				?>
                <tr><td></td><td><?=$rs["doctNombreArchivo"]?></td></tr>
                <tr bgcolor="#FFFFFF" >
    			<td colspan="2" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; height:5px; "></td>
				</tr>
                <?
                }
				}
				else
				{
				?>
				<tr><td></td><td><? echo("Sin documentos")?></td></tr>
                <?
				}
				?>
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