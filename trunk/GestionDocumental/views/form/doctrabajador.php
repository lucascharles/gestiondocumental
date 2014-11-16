<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Documentos del Trabajador";
		
	
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

?>
<form name="frmTrabajadoresControl" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="80%" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>

    <tr>
    	<td align="left" class="etiqueta_form" colspan="2">Rut:&nbsp;<?=$trbRut?></td>
        <td align="right" class="etiqueta_form" colspan="1">
        <table class="opciones" onclick="volverTrabajador('<?=$controller?>',0)" title="Volver" >
                        <tr>
                            <td align="right" valign="middle">.
                            <img src="images/volver.gif" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)"/>
                            </td>
                            <td align="left" valign="middle" >
                            Volver
                            </td>
                        </tr>
         </table>
        </td>
    </tr>
	<tr>
       	<td align="left" colspan="3" class="etiqueta_form">Nombre:&nbsp;<?=$trbNombre?></td>
   	</tr>    
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
	   	<td colspan="3"> 
        	 <div id="documentos" style="">
			 <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			 	<tr>
					<td colspan="3">
			        	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			            	<tr>
                            	<?
								$cont = 0;
                                while($rs=mysql_fetch_array($idsql_tip_doc))
								{
									$selected = "class='boton_form'";
									$cont++;
								?>
			                	<td <?=$selected ?> id="btn_<?=$rs["id"]?>" tabname="btn_tipo_doc"  onclick="cargarTab('<?=$controller?>',<?=$rs["id"]?>)">
			                    	<?=$rs["descripcion"]?>
			                    </td>
                               	<?
                                }
								?>
                                
			                </tr>
			            </table>
			        </td>
			    </tr>
			    <tr>
					<td colspan="3" height="10">
			        
			        </td>
			    </tr>
			    <tr>
					<td colspan="3">
                      <div id="frmitemsadmin" style=" width:100%; min-height:1050px; overflow:auto;"></div>
			        </td>
			    </tr>
			
			</table>
		</div>
        </td>
    </tr> 
   
</table>
</div>
</form>
<? include("views/pie.php"); ?>