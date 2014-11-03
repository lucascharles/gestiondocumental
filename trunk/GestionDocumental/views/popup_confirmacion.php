<div id="popup_confirmacion" style="position:absolute; margin-left:20px; width:95%; display:none;  z-index:9999;">
	<table border="0" cellpadding="0" cellspacing="2" align="center" width="40%" id="popup" >
     <tr>
     	<td align="left" class="titulo_popup" colspan="3">CONFIRMACI&Oacute;N</td>

    </tr>
     <tr>
     	<td align="center" height="10" colspan="3" >
        
        </td>

    </tr>
     <tr>
     	<td align="center" height="5" colspan="3" class="mensaje_confirmacion">
        Popup_confirmacion2 la baja del registro de <? echo($label) ?>?
        </td>

    </tr>
    <tr>
     	<td align="center" height="10" colspan="3" >
        
        </td>

    </tr>
    <tr>
        <td align="right" class="etiqueta_form" colspan="3">
        	<input  type="button" name="btnaceptar" id="btnaceptar" onclick="bajaRegistro('<? echo($controller) ?>')"  value="Aceptar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btncancelar" id="btncancelar" onclick="cerrarPopUp('popup_confirmacion')"  value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
        </td>
	
        </td>
    </tr>
    
    </table>
</div>