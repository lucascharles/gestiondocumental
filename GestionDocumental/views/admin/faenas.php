<? 	include("views/cabecera.php"); 
 	include("views/menu.php"); 
 
 	$label = "Faenas";

	$titulo_form = "ADMINISTRAR FAENAS";

	include("views/popup_confirmacion.php"); 
		
	if((!isset($_SESSION["f_inicio"])) || trim($_SESSION["f_inicio"]) == "")
	{
		$ini = 0;
	}
	else
	{
		$ini = $_SESSION["f_inicio"];
	}
	if((!isset($_SESSION["f_inicio_pag"])) || trim($_SESSION["f_inicio_pag"]) == "")
	{
		$ini_pag = 0;
	}
	else
	{
		$ini_pag = $_SESSION["f_inicio_pag"];
	}
 ?>
<form name="frmusuario">
<input type="hidden" name="controller" id="controller" value="<?=$controller?>" />
<input type="hidden" name="id_reg" id="id_reg" value="" />
<input type="hidden" name="inicio" id="inicio" value="<? echo($ini) ?>" filtro="S" />
<input type="hidden" name="inicio_pag" id="inicio_pag" value="<? echo($ini_pag) ?>" filtro="S" />
<table  align="center" width="100%" border="0" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
		<td align="left" height="2" colspan="3"></td>
    </tr>
    
    <tr>
    	<td colspan="3">
        	<table width="100%" border="0" cellpadding="0" cellspacing="3" align="center" id="buscador">
		        <tr>
					<td colspan="1" align="right" width="50"  class="etiqueta_form">Nombre Faena:</td>
					<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="contratista" id="contratista"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>

 	 	 	 	 	<td colspan="1" align="right" width="50"  class="etiqueta_form">Estado Faena:</td>
					<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="apellido" id="apellido"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>
<!--
 	 	 	 	 	<td colspan="1" align="right" width="50"  class="etiqueta_form">Responsable Faena:</td>
 	 	 	 		<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="apellido" id="apellido"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>

 	 	 	 	 	<td colspan="1" align="right" width="50"  class="etiqueta_form">Telefono Faena:</td>
 	 	 	 		<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="apellido" id="apellido"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>

 	 	 	 	 	<td colspan="1" align="right" width="50"  class="etiqueta_form">Fecha Inicio:</td>
 	 	 	 		<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="apellido" id="apellido"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>

 	 	 	 	 	<td colspan="1" align="right" width="50"  class="etiqueta_form">Fecha Termino:</td>
 	 	 	 		<td colspan="1" align="left" width="200"  class="etiqueta_form"><input type="text" name="apellido" id="apellido"  filtro="S" value="<? echo($_SESSION["f_apellido"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>
--> 	 	 	 	 	
                    </td>
                    <td colspan="1"></td>
			    </tr>
               
               
                <tr>
			     	<td align="right"  colspan="4" class="etiqueta_form">
                    <table class="opciones" onclick="nuevoRegistro('<?=$controller?>')" title="Nueva Faena">
                        <tr>
                            <td align="right" valign="middle">
                            <img src="images/nuevoregistro.png" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)"/>
                            </td>
                            <td align="left" valign="middle" >
                            Nuevo 
                            </td>
                        </tr>
                    </table>
                   </td>

			    </tr>
                <!--
                <tr>
			        <td align="right" colspan="4">
                    <input  type="button" name="btnbuscar" id="btnbuscar" onclick="mostrar()"  value="Buscar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
                    </td>
                    </tr>
                    -->
             </table>
         <td>
    </tr>
    <tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>  
	<tr>
        <td colspan="3" valign="top">
        	<iframe id="frmitemsadmin" src="" frameborder="0" width="100%" align="middle" scrolling="no" height="1050"></iframe>
         </td>
    </tr>  
</table>
</div>
</form>
<? include("views/pie.php"); ?>