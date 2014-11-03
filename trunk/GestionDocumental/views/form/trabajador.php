<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Trabajador";
	$rs = $dato;
	$id = ($tipop=="M") ? $rs["trbIdTrabajador"] : "";
	$id_usuario = ($tipop=="M") ? $rs["trbIdTrabajador"] : "";
	$ape_usuario = ($tipop=="M") ? $rs["trbApPaterno"] : "";
	$nom_usu = ($tipop=="M") ? $rs["trbNombre"] : "";
	$clave = ($tipop=="M") ? $rs["clave"] : "";
	$fec_alta = ($tipop=="M" && $rs["fec_alta"]<>"0000-00-00") ? formatoFecha($rs["fec_alta"],"yyyy-mm-dd H:m:s","dd/mm/yyyy") : "";
	
	$trbApPaterno= ($tipop=="M") ? $rs["trbApPaterno"] : "";
	$trbIdTrabajador= ($tipop=="M") ? $rs["trbIdTrabajador"] : "";
	$dirIdDireccion= ($tipop=="M") ? $rs["dirIdDireccion"] : "";
	$comIdComuna= ($tipop=="M") ? $rs["comIdComuna"] : "";
	$isaIdIsapre= ($tipop=="M") ? $rs["isaIdIsapre"] : "";
	$nacIdNacionalidad= ($tipop=="M") ? $rs["nacIdNacionalidad"] : "";
	$tgrlIdCargoContractual= ($tipop=="M") ? $rs["tgrlIdCargoContractual"] : "";
	$tgrlIdOficioCab= ($tipop=="M") ? $rs["tgrlIdOficioCab"] : "";
	$tgrlIdOficioDet= ($tipop=="M") ? $rs["tgrlIdOficioDet"] : "";
	$tgrlIdTipoContrato= ($tipop=="M") ? $rs["tgrlIdTipoContrato"] : "";
	$tjorIdTipoJornada= ($tipop=="M") ? $rs["tjorIdTipoJornada"] : "";
	$trbAfectoArt22= ($tipop=="M") ? $rs["trbAfectoArt22"] : "";
	$trbAntiguedadMeses= ($tipop=="M") ? $rs["trbAntiguedadMeses"] : "";
	$trbApMaterno= ($tipop=="M") ? $rs["trbApMaterno"] : "";
	$trbCeco= ($tipop=="M") ? $rs["trbCeco"] : "";
	$trbFechaNac= ($tipop=="M") ? $rs["trbFechaNac"] : "";
	$trbTelefono= ($tipop=="M") ? $rs["trbTelefono"] : "";
	$trbTitulo= ($tipop=="M") ? $rs["trbTitulo"] : "";

	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Trabajador(Id: ".$id_usuario.")";
	}
?>
<form name="frmTrabajadoresControl" action="" method='post'>
<input type="hidden" name="id_usu" id="id_usu" value="<? echo($id)?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Nombre:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbNombre" id="trbNombre" value="<? echo(utf8_decode($nom_usu)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">Apellido:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbApPaterno" id="trbApPaterno" value="<? echo($ape_usuario); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form">ID:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbIdTrabajador" id="trbIdTrabajador" value="<? echo($id_usuario); ?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
        </td>
        <td align="left" class="etiqueta_form" >
       
        </td>
    </tr>
<!-- ------------------------------------------------------------------- -->
	<tr>
	<td align="right" class="etiqueta_form">Direccion:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="dirIdDireccion" id="dirIdDireccion" value="<? echo($dirIdDireccion); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	

	<tr>
	<td align="right" class="etiqueta_form">Comuna:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="comIdComuna" id="comIdComuna" value="<? echo($comIdComuna); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	
    	
    	
   <tr>
	<td align="right" class="etiqueta_form">Isapre:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="isaIdIsapre" id="isaIdIsapre" value="<? echo($isaIdIsapre); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	
    	<tr>
    	<td align="right" class="etiqueta_form">Nacionalidad:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="nacIdNacionalidad" id="nacIdNacionalidad" value="<? echo($nacIdNacionalidad); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	

    	<tr>
    	<td align="right" class="etiqueta_form">Cargo Contractual:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="tgrlIdCargoContractual" id="tgrlIdCargoContractual" value="<? echo($tgrlIdCargoContractual); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
        	
        	
       <tr>
    	<td align="right" class="etiqueta_form">Oficio CAB:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="tgrlIdOficioCab" id="tgrlIdOficioCab" value="<? echo($tgrlIdOficioCab); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
    	<tr>
    	<td align="right" class="etiqueta_form">Oficio DET:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="tgrlIdOficioDet" id="tgrlIdOficioDet" value="<? echo($tgrlIdOficioDet); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	

    	<tr>
    	<td align="right" class="etiqueta_form">Tipo Contrato:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="tgrlIdTipoContrato" id="tgrlIdTipoContrato" value="<? echo($tgrlIdTipoContrato); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
        	
        	
       <tr>
    	<td align="right" class="etiqueta_form">Tipo Jornada:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="tjorIdTipoJornada" id="tjorIdTipoJornada" value="<? echo($tjorIdTipoJornada); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	

    	
        <tr>
     	<td align="right" class="etiqueta_form">Afecto Art. 22:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbAfectoArt22" id="trbAfectoArt22" value="<? echo($trbAfectoArt22); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
     	
        <tr>
     	<td align="right" class="etiqueta_form">Antiguedad (Meses):</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbAntiguedadMeses" id="trbAntiguedadMeses" value="<? echo($trbAntiguedadMeses); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
     	
        <tr>
     	<td align="right" class="etiqueta_form">Ap. Materno:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbApMaterno" id="trbApMaterno" value="<? echo($trbApMaterno); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
     	
        <tr>
     	<td align="right" class="etiqueta_form">Ap Paterno:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbApPaterno" id="trbApPaterno" value="<? echo($trbApPaterno); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
        
     	<tr>
     	<td align="right" class="etiqueta_form">Ceco:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbCeco" id="trbCeco" value="<? echo($trbCeco); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	

        <tr>
     	<td align="right" class="etiqueta_form">Fecha Nac.:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbFechaNac" id="trbFechaNac" value="<? echo($trbFechaNac); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	

        <tr>
     	<td align="right" class="etiqueta_form">Rut:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbRut" id="trbRut" value="<? echo($trbRut); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	

        <tr>
     	<td align="right" class="etiqueta_form">Telefono:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbTelefono" id="trbTelefono" value="<? echo($trbTelefono); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	

        <tr>
     	<td align="right" class="etiqueta_form">Sexo:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbSexo" id="trbSexo" value="<? echo($trbSexo); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	

        <tr>
     	<td align="right" class="etiqueta_form">Titulo:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbTitulo" id="trbTitulo" value="<? echo($trbTitulo); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	

     	
<!-- --------------------------------------------------------------- --> 
    	
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