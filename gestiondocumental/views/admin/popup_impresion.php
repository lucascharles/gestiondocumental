<!-- actualiza00005 -->
<div id="popup_impresion" style="position:absolute; margin-left:20px; width:95%; display:none;  z-index:9999;">
	<table border="0" cellpadding="0" cellspacing="2" align="center" width="40%" id="popup" >
     <tr>
     	<td align="left" class="titulo_popup" colspan="3">Impresi&oacute;n formularios</td>

    </tr>
     <tr>
     	<td align="center" height="10" colspan="3" >
        </td>
    </tr>
    <tr>
     	<td align="left" height="5" colspan="3" class="mensaje_confirmacion">
        <input type="radio" name="rdImpresion" id="imp_form_ingreso"   value="imp_form_ingreso" checked >&nbsp;Formulario de  ingreso 
        </td>
    </tr>
    <tr>
     	<td align="left" height="5" colspan="3" class="mensaje_confirmacion">
        <input type="radio" name="rdImpresion" id="imp_form_presupuesto" value="imp_form_presupuesto">&nbsp;Presupuesto
        </td>
    </tr>
    <tr>
     	<td align="left" height="5" colspan="3" class="mensaje_confirmacion">
       	<input type="radio" name="rdImpresion" id="imp_form_permiso" value="imp_form_permiso">&nbsp;Permiso
        </td>
    </tr>
    <tr>
     	<td align="left" height="5" colspan="3" class="mensaje_confirmacion">
       	<input type="radio" name="rdImpresion" id="imp_form_permiso_azul" value="imp_form_permiso_azul">&nbsp;Permiso C&eacute;dula azul
        </td>
    </tr>
    <tr>
     	<td align="left" height="5" colspan="3" class="mensaje_confirmacion">
       	<input type="radio" name="rdImpresion" id="imp_form_automotor_08"  value="imp_form_automotor_08">&nbsp;Formulario 08
        </td>
    </tr>
    <tr>
     	<td align="left" height="5" colspan="3" class="mensaje_confirmacion">
       	<input type="radio" name="rdImpresion" id="imp_form_declaracion"  value="imp_form_declaracion">&nbsp;Declaraci&aacute;n jurada
        </td>
    </tr>
    <tr>
     	<td align="center" height="10" colspan="3" >
        </td>
    </tr>
    <tr>
        <td align="right" class="etiqueta_form" colspan="3">
        	<input  type="button" name="btnimprimir" id="btnimprimir" onclick="imprimirForm('<? echo($controller) ?>')"  value="Imprimir" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btncancelar" id="btncancelar" onclick="cerrarPopUp('popup_impresion')"  value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
        </td>
	
        </td>
    </tr>
    
    </table>
</div>