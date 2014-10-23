<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<form name="frmresplado_bd">
<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3">Copia seguridad de base de datos</th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
    <tr>
		<td width="800" align="left"  class="etiqueta_form">
			La copia de suguridad de su base de datos sera alojada en la siguiente ubicaci&oacute;n:
            &nbsp;<br><h4>C:\AppServ\www\gcontratista\CopiaBaseDatos</h4>

            </td>
        <td> 
       	</td>
        <td>
       	</td>
    </tr>
    <tr>
     	<td align="left"  class="etiqueta_form" colspan="3"></td>

    </tr>
    <tr>
     	<td width="150" align="left"  class="etiqueta_form"><font class="subtitulo">Es recomendable que realize una copia peri&oacute;dica de los archivos de Base de Datos. 
            Puede usar: <h4>CD o PenDrive o su casilla de correo.  </h4>
            </font></td>
        <td>
        </td>
        <td>
        </td>
    </tr>
     <tr>
        <td colspan="3" height="5">
        	<table width="70%" align="center" cellpadding="0" cellspacing="0" border="0" id="espera">
            	<tr>
                	<td>
        	<img src="images/loading1.gif" />
            		</td>
            	</tr>
                <tr>
                	<td  class="etiqueta_form" align="center">
        				procesando...
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
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarRespaldoBD()"  value="Copiar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirRespaldoBD()"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>