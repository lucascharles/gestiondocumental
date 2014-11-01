<? 
include("views/cabecera.php");
include("views/menu.php");

$label = "Documentos de la Constructora";

$titulo_form = "Documentos de la Constructora";

include("views/popup_confirmacion.php");
	
	
	
	$id= $dato["consIdConstructora"];
	$consIdConstructora= $dato["consIdConstructora"]; // $dato->get_data("consIdConstructora");
	$consRazonSocial= $dato["consRazonSocial"]; //$dato->get_data("consRazonSocial");
	$consRut= $dato["consRut"];  //$dato->get_data("consRut");
	
	

?>
<form name="frmdashboard" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">ID:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consIdConstructora" id="consIdConstructora" value="<? echo($consIdConstructora); ?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
        </td>
        
    	<td align="right" class="etiqueta_form">Razon Social:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consRazonSocial" id="consRazonSocial" value="<? echo(utf8_decode($consRazonSocial)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
        </td>
    
    	<td align="right" class="etiqueta_form">Rut:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="consRut" id="consRut" value="<? echo($consRut); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
        </td>
    </tr>
    
    <tr>
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
			                	<td class="boton_form_brillante" seleccionado="S" id="btnAntecedentesLaborales" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarTab('ANTECEDENTES_LABORALES','Dashboard')">
			                    	Antecedentes Laborales
			                    </td>
			                    <td class="boton_form" id="btnRemuneracionAsistencia" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarTab('REMUNERACION_ASISTENCIA','Dashboard')">
			                    	Remuneracion & Asistencia
			                    </td>
			                    <td class="boton_form" id="btnContratoTrabajo" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarTab('CONTRATO_TRABAJO','Dashboard')">
			                    	Contrato Trabajo
			                    </td>
			                    <td class="boton_form" id="btnPlanPagoPrev" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarTab('PLANPAGOPREVISIONAL','Dashboard')">
			                    	Plan Pago Prev.
			                    </td>
			                    <td class="boton_form" id="btnPrevencionRiesgo" onMouseOver='overClassBotonMenu(this)' onMouseOut='outClassBotonMenu(this)' onclick="cargarTab('PREVENCIONRIESGO','Dashboard')">
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
</table>
</div>
</form>
<? include("views/pie.php"); ?>