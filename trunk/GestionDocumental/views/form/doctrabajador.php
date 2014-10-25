<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Documentos del Trabajador";
		
	
	$trbNombre= $dato->get_data("trbNombre");
	$trbApPaterno= $dato->get_data("trbApPaterno");
	$trbIdTrabajador= $dato->get_data("trbIdTrabajador");
	$dirIdDireccion= $dato->get_data("dirIdDireccion");
	$comIdComuna= $dato->get_data("comIdComuna");
	$isaIdIsapre= $dato->get_data("isaIdIsapre");
	$nacIdNacionalidad= $dato->get_data("nacIdNacionalidad");
	$tgrlIdCargoContractual= $dato->get_data("tgrlIdCargoContractual");
	$tgrlIdOficioCab= $dato->get_data("tgrlIdOficioCab");
	$tgrlIdOficioDet= $dato->get_data("tgrlIdOficioDet");
	$tgrlIdTipoContrato= $dato->get_data("tgrlIdTipoContrato");
	$tjorIdTipoJornada= $dato->get_data("tjorIdTipoJornada");
	$trbAfectoArt22= $dato->get_data("trbAfectoArt22");
	$trbAntiguedadMeses= $dato->get_data("trbAntiguedadMeses");
	$trbApMaterno= $dato->get_data("trbApMaterno");
	$trbCeco= $dato->get_data("trbCeco");
	$trbFechaNac= $dato->get_data("trbFechaNac");
	$trbTelefono= $dato->get_data("trbTelefono");
	$trbTitulo= $dato->get_data("trbTitulo");


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