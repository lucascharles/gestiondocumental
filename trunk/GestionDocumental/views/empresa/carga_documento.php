<? 
include("views/cabecera_front.php");
include("views/menu_front.php");

$hidden = "";
if(isset($_SESSION["bloqueo"]))
{
	if(in_array($id_f,$_SESSION["bloqueo"])) $hidden = "style='display:none;'";
}
 ?>

<form name="frmcargadoc" enctype='multipart/form-data' method='post' action='' target='_self'>
<input type="hidden" name="id_faena" id="id_faena" value="<?=$id_f?>" />
<input type="hidden" name="id_trabajador" id="id_trabajador" value="<? echo($id_t)?>" />
<input type="hidden" name="id_sub_tipodocumento" id="id_sub_tipodocumento" value="<? echo($id_d)?>" />
<input type="hidden" name="id_contratista" id="id_contratista" value="<?=$id_c?>" />
<input type="hidden" name="id_tipo_documento" id="id_tipo_documento" value="<?=$id_td?>" />

<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario" height="" width="70%" >
	<tr>
		<th align="left" colspan="3">Carga documentos: <?php echo($rs_sub_doc["descripcion"])?></th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
   <tr>
		<td align="left" class="etiqueta_form" colspan="2">Agencia:&nbsp;<?=$dato["ctrRazonSocial"]?></td>
        <td align="right"><input  type="button" name="btnsalir" id="btnsalir" onclick="volverDocContratista('<?=$controller?>',<?=$id_c?>)"  value="Volver" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/></td>
    </tr>
    <tr>
		<td align="left" class="etiqueta_form">Trabajador:&nbsp;<?=$rs_trabajador["trbNombre"]?></td>
        <td align="left" class="etiqueta_form"></td>
        <td align="left" class="etiqueta_form"></td>
    </tr>
    <tr>
		<!-- <td align="left" class="etiqueta_form">Documento:&nbsp;<?=$rs_sub_doc["descripcion"]?></td>  -->
        <td align="left" class="etiqueta_form"></td>
        <td align="left" class="etiqueta_form"></td>
    </tr>
     <tr>
        <td colspan="3" height="5">
         </td>
    </tr>
<!-- codigo -->
    <tr>
        <td colspan="3" height="5">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">       	
        </table>
         </td>
    </tr>
    
    <tr>
        <td colspan="3" height="5" valign="top">
        	<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#55A79A">
	        	<? 
				if($rs_sub_doc["orden"] !=28 and $rs_sub_doc["orden"] !=9 and $rs_sub_doc["orden"] !=11 and $rs_sub_doc["orden"] !=10)	{
				?>
	        	<tr>
            		<td colspan="<?=$cont?>">
                		Nombre: <input type="text" name="doctNombreArchivo" id="doctNombreArchivo" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)" />
                	</td>
            	</tr>
            	<? 
				}
				
				if($rs_sub_doc["id"]==28||$rs_sub_doc["id"]==9||$rs_sub_doc["id"]==10||$rs_sub_doc["id"]==11) {
				?>
				<tr>
            		<td colspan="<?=$cont?>">
                	Nombre:
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
            	<? }?>
				
	            <tr>
	            	<td colspan="<?=$cont?>">
	                	<div <?=$hidden?>>
	                		Archivo: <input type='file' id='archivo' name='archivo' />&nbsp;
	                		<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarFormUploadArch(<?=$_SESSION["f_id_tipo_documento"]?>)"  value="Adjuntar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
	                	</div>
	                </td>
	            </tr>
				
	            <tr>
	            	<td colspan="<?=$cont?>">
	            		<table width="100%" cellpadding="0" cellspacing="1" align="center" border="0" bgcolor="#ffffff" id="listado_home">
	        				<tr>
	            				<th colspan="6">Documentos</th>
	            			</tr>
				            
				            <tr bgcolor="#A9A9A9">
			                	<td></td>
			                    <td>Nombre</td>
			                    <td>Estado</td>
			                    <td>Observaciones</td>
			                    <td align="right">Archivo</td>
			                    <td align="center">Acciones</td>
			                </tr>
			            	<?
							if($idsql_doc > '')
							{
				                while($rs=mysql_fetch_array($idsql_doc))
									{
							?>
					        <tr bgcolor="#FFFFFF">
					                	<td></td>
					                    <td><?=$rs["doctNombreArchivo"]?></td>
					                    <td><?=$rs["estado_documento"]?></td>
					                    <td><?=$rs["nota"]?></td>
					                    <td align="right">
					                    	<a href="docvarios/<?=$id_c."_docs".$id_f."/".$rs["doctNombreEncrip"]?>" target="_blank"><?=$rs["NombreOriginal"]?></a>
										</td>
										<td align="right">
					                    	<img id="<?=$rs["id_documento"]?>" src="images/editar_estado.png" style="cursor:pointer;" title="Cambiar Estado" onclick='editarEstado(this)' />&nbsp;&nbsp;&nbsp;&nbsp;
                    						<img id="<?=$rs["id_documento"]?>" src="images/notas.png" style="cursor:pointer;" title="Notas" onclick='editarNota(this)' />&nbsp;&nbsp;&nbsp;&nbsp;
                    						<img id="<?=$rs["id_documento"]?>" src="images/borrar.gif" style="cursor:pointer;" title="Borrar" onclick='borrarDocumento(this)' />
					                    </td>
					                    <td align="center">
					                    </td>
					        </tr>
	                
	                		<tr bgcolor="#FFFFFF" >
	    						<td colspan="8" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; height:5px; "></td>
							</tr>
	                		<?
	                				}
							}
							else
							{
								?>
								<tr><td colspan="5"><? echo("Sin documentos")?></td></tr>
	                			<?
							}
							?>
	            		</table>
	            	</td>
	       		</tr>
	        </table>
	         </td>
	    </tr>
			
	
    
<!-- codigo -->       
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