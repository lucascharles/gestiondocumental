<? include("views/cabecera.php"); ?>

<form name="frmdescarga">
<br />
<table width="60%"  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3">Descarga</th>
    </tr>
	<tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>
    
    <tr>
        <td colspan="3" align="center" height="50">
            <input  type="button" name="btnsalir" id="btnsalir" onclick="cerrarVentana()"value="Cerrar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
    <tr>
        <td colspan="3">
    		<? 
			$carpeta = "descarga/files".$_SESSION["userid"]."/";
			listar_directorios_ruta($carpeta); 
			?>   
    	</td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>