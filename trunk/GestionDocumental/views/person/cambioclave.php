<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<form name="frmcambioclave">
<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario" >
	<tr>
		<th align="left" colspan="3">Cambio Clave</th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
    <tr>
		<td width="150" align="left"  class="etiqueta_form">Usuario apellido:</td>
        <td align="left"> <input type="text" name="txtnomape" id="txtnomape" value="<? echo($usuario->get_data("nom_usuario")." ".$usuario->get_data("ape_usuario")) ?>"  size="40" disabled="disabled" valida="requerido" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)"/>
       	</td>
        <td> <span id="msj_error_txtnomape" class="msjdato_incomp"></span>
       	</td>
    </tr>
    <tr>
     	<td width="150" align="left"  class="etiqueta_form">Login:</td>
        <td align="left"><input type="text" name="txtlogin" id="txtlogin" value="<? echo($usuario->get_data("id_usuario")) ?>"  size="40" valida="requerido" tipovalida="texto" disabled="disabled" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)"/>
        </td>
        <td><span id="msj_error_txtlogin" class="msjdato_incomp"></span>
        </td>
    </tr>
    <tr>
    	<td width="150" align="left"  class="etiqueta_form">Clave:</td>
        <td align="left"><input type="password" name="txtclave" id="txtclave"  value="" size="40" valida="requerido" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this);"/>
        </td>
        <td><span id="msj_error_txtclave" class="msjdato_incomp"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="left" class="etiqueta_form">Confirmar Clave:</td>
        <td align="left"><input type="password" name="txtclaveconfirm" id="txtclaveconfirm" value="" size="40" valida="requerido" tipovalida="texto" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this);"/>
        </td>
        <td><span id="msj_error_txtclaveconfirm" class="msjdato_incomp"></span>
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
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarCambioClave()"  value="Grabar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirCambioClave()"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>