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


?>
<form name="frmTrabajadoresControl" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">ID:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbIdTrabajador" id="trbIdTrabajador" value="<? echo($trbIdTrabajador); ?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
        </td>
        
    	<td align="right" class="etiqueta_form">Nombre:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbNombre" id="trbNombre" value="<? echo(utf8_decode($trbNombre)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    
    	<td align="right" class="etiqueta_form">Apellido:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbApPaterno" id="trbApPaterno" value="<? echo($trbApPaterno); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
   
    	
    </tr>
    <tr>
    
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
    <div id="documentos" style="">
		 <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		 	<tr>
				<td colspan="3">
		        	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
		            	<tr>
		                	<td class="boton_form_brillante" seleccionado="S" id="btnAntecedentesLaborales" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarPantalla('ANTECEDENTES_LABORALES')">
		                    	Antecedentes Laborales
		                    </td>
		                    <td class="boton_form" id="btnRemuneracionAsistencia" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarPantalla('REMUNERACION_ASISTENCIA')">
		                    	Remuneracion & Asistencia
		                    </td>
		                    <td class="boton_form" id="btnContratoTrabajo" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarPantalla('CONTRATO_TRABAJO')">
		                    	Contrato Trabajo
		                    </td>
		                    <td class="boton_form" id="btnPlanPagoPrev" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarPantalla('PLANPAGOPREVISIONAL')">
		                    	Plan Pago Prev.
		                    </td>
		                    <td class="boton_form" id="btnPrevencionRiesgo" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarPantalla('PREVENCIONRIESGO')">
		                    	Prevencion de riesgo
		                    </td>
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
		        	<iframe id="frmsubpantalla" src="" width="100%" align="middle" height="300" scrolling="auto" frameborder="0"></iframe>
		        </td>
		    </tr>
		
		</table>
	</div>
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
</table>
</div>
</form>
<? include("views/pie.php"); ?>