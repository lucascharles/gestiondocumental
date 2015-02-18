<? include("views/cabecera_front.php"); ?>
<? include("views/menu_front.php"); ?>
<?
	$titulo_form = "Alta Trabajador";
	
	$id = ($tipop=="M") ? $rs["trbIdTrabajador"] : "";
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
	$ctrIdContratista= ($tipop=="M") ? $rs["ctrIdContratista"] : "";
	$id_faena= ($tipop=="M") ? $rs["id_faena"] : "";
	
	$trbDireccion = ($tipop=="M") ? $rs["trbDireccion"] : "";
	
	$idRegion = ($tipop=="M") ? $rs["idRegion"] : "";
	$region = ($tipop=="M") ? $rs["region"] : "";
	
	$idComuna = ($tipop=="M") ? $rs["idComuna"] : "";
	$comuna = ($tipop=="M") ? $rs["comuna"] : "";
	
	$idCiudad = ($tipop=="M") ? $rs["idCiudad"] : "";
	$ciudad = ($tipop=="M") ? $rs["ciudad"] : "";
	
	$isaIdIsapre= ($tipop=="M") ? $rs["isaIdIsapre"] : "";
	$isaIsapre= ($tipop=="M") ? $rs["isaIsapre"] : "";
	
	$trbPactoIsapre = ($tipop=="M") ? $rs["trbPactoIsapre"] : "";
	
	$afpIdAfp= ($tipop=="M") ? $rs["afpIdAfp"] : "";
	$afpNombre= ($tipop=="M") ? $rs["afpNombre"] : "";
	
	$trbPensionado = ($tipop=="M") ? $rs["afpNombre"] : "";
	$trbSeguroCesantia = ($tipop=="M") ? $rs["afpNombre"] : "";
	
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Trabajador (Id: ".$id.")";
	}
	
	$disabled = "";
	if(isset($_SESSION["bloqueo"]))
	{
		if(in_array($_SESSION["f_ctrIdContratista"],$_SESSION["bloqueo"])) $disabled = "disabled='disabled'";
	}
?>
<form name="frm<?=$controller?>" action="" method='post'>
<input type="hidden" name="id_reg" id="id_reg" value="<?=$id?>" />
<input type="hidden" name="tipop" id="tipop" value="<? echo($tipop)?>" />

<table  align="center" border="0" width="50%" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
    	<td align="right" class="etiqueta_form" width="150">Nombre:</td>
        <td align="left" class="etiqueta_form" colspan="1">
        <input type="text" name="trbNombre" id="trbNombre" value="<? echo(utf8_decode($nom_usu)); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" tabindex="0"/>
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
     	<td align="right" class="etiqueta_form">Fecha Nac.:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbFechaNac" id="trbFechaNac" value="<? echo($trbFechaNac); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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
	<td align="left" class="subtitulo_form" colspan="3">Direcci&oacute;n</td>
    </tr>
    
<!-- ------------------------------------------------------------------- -->
	<tr>
	<td align="right" class="etiqueta_form">Direccion:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="trbDireccion" id="trbDireccion" value="<? echo($trbDireccion); ?>" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	
   <tr>
    <td align="right" class="etiqueta_form">Region:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <select name="idRegion" id="idRegion" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
			<option value="<? echo($idRegion); ?>"><? if($region==""){ echo("Seleccion"); }else{echo($region);} ?></option>
	   			<?
	   			while($rs=mysql_fetch_array($regiones))
				{
			    ?>
			<option value="<?=$rs["idRegion"]?>" > <? echo($rs["region"]); ?> </option>
				<?
				  }
	    		?>
	   </select>
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
	</tr>
   
   <tr>
    <td align="right" class="etiqueta_form">Ciudad:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <select name="idCiudad" id="idCiudad" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
			<option value="<? echo($idCiudad); ?>"><? if($ciudad==""){ echo("Seleccion"); }else{echo($ciudad);} ?></option>
	   			<?
	   			while($rs=mysql_fetch_array($ciudades))
				{
			    ?>
			<option value="<?=$rs["idCiudad"]?>" > <? echo($rs["ciudad"]); ?> </option>
				<?
				  }
	    		?>
	   </select>
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
	</tr>
	   <tr>
	    <td align="right" class="etiqueta_form">Comuna:</td>
		   <td align="left" class="etiqueta_form" colspan="1">
		   <select name="idComuna" id="idComuna" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
				<option value="<? echo($idComuna); ?>"><? if($comuna==""){ echo("Seleccion"); }else{echo($comuna);} ?></option>
		   			<?
		   			while($rs=mysql_fetch_array($comunas))
					{
				    ?>
				<option value="<?=$rs["idComuna"]?>" > <? echo($rs["comuna"]); ?> </option>
					<?
					  }
		    		?>
		   </select>
		   </td>
		   <td align="left" class="etiqueta_form" >
		  
		   </td>
		</tr>
   <tr>
	<td align="left" class="subtitulo_form" colspan="3">Agencia</td>
    </tr>
    <tr> 	
    <td align="right" class="etiqueta_form">Agencia:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <select name="ctrIdContratista" id="ctrIdContratista" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
			<option value="">Seleccion</option>
	   			<?
	   			while($rs=mysql_fetch_array($contratistas))
				{
			    ?>
			<option value="<?=$rs["ctrIdContratista"]?>" > <? echo($rs["ctrNombreFantasia"]); ?> </option>
				<?
				  }
	    		?>
	   </select>
	   </td>
	   <td align="left" class="etiqueta_form" > </td>
	   </tr>
    <tr> 	
	    <td align="right" class="etiqueta_form">Supervisor:</td>
		   <td align="left" class="etiqueta_form" colspan="1">
		   <select name="idSupervisor" id="idSupervisor" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
				<option value="">Seleccion</option>
		   			<?
		   			while($rs=mysql_fetch_array($supervisores))
					{
				    ?>
				<option value="<?=$rs["idSupervisor"]?>" > <? echo($rs["supNombre"]); ?> </option>
					<?
					  }
		    		?>
		   </select>
		   </td>
		<td align="left" class="etiqueta_form" > </td>
	</tr>
	   
	   <tr>
	<td align="left" class="subtitulo_form" colspan="3">Datos Laborales</td>
    </tr>
    	<tr>
    	<td align="right" class="etiqueta_form">Cargo:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="tgrlIdCargoContractual" id="tgrlIdCargoContractual" value="<? echo($tgrlIdCargoContractual); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
       
       <tr>
       	<td align="right" class="etiqueta_form">Fecha de Ingreso:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbFechaContrato" id="trbFechaContrato" value="<? echo($trbFechaContrato); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	</td>
       </tr>    	
       
       <tr>
       	<td align="right" class="etiqueta_form">Fecha Desvinculacion:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbFechaDesvinculado" id="trbFechaDesvinculado" value="<? echo($trbFechaDesvinculado); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	</td>
       </tr>    	
       
	   <tr>
	      <td align="right" class="etiqueta_form">Isapre:</td>
	   		<td align="left" class="etiqueta_form" colspan="1">
 	   			<select name="isaIdIsapre" id="isaIdIsapre" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
					<option value="<? echo($isaIdIsapre); ?>"><? if($isapre==""){ echo("Seleccion"); }else{echo($isapre);} ?></option>
	   					<?
				   			while($rs=mysql_fetch_array($isapres))
							{
						?>		<option value="<?=$rs["isaIdIsapre"]?>" > <? echo($rs["isaIsapre"]); ?> </option>
						<?
							}
				    	?>
	   			</select>
	   		</td>
	   </tr>    	

	   <tr>
	      <td align="right" class="etiqueta_form">Pacto Isapre:</td>
	   		<td align="left" class="etiqueta_form" colspan="1">
 	   			<select name="trbPactoIsapre" id="trbPactoIsapre" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
					<option value="<? echo($trbPactoIsapre); ?>"><? if($trbPactoIsapre==""){ echo("Seleccion"); }else{echo($trbPactoIsapre);} ?></option>
					<option value="UF">UF</option>
					<option value="PESOS">PESOS</option>
					<option value="USD">USD</option>
	   			</select>
	   		</td>
	   </tr>    	
	   
	   <tr>
	      <td align="right" class="etiqueta_form">AFP:</td>
	   		<td align="left" class="etiqueta_form" colspan="1">
 	   			<select name="afpIdAfp" id="afpIdAfp" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
					<option value="<? echo($afpIdAfp); ?>">Seleccion</option>
	   					<?
				   			while($rs=mysql_fetch_array($afps))
							{
						?>		<option value="<?=$rs["afpIdAfp"]?>" > <? echo($rs["afpNombre"]); ?> </option>
						<?
							}
				    	?>
	   			</select>
	   		</td>
	   </tr>    	

	   <tr>
    	<td align="right" class="etiqueta_form">Seguro Cesantia:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="trbSeguroCesantia" id="trbSeguroCesantia" value="<? echo($trbSeguroCesantia); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
        	
        	
       <tr>
    	<td align="right" class="etiqueta_form">Pensionado:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
    	   <input type="text" name="trbPensionado" id="trbPensionado" value="<? echo($trbPensionado); ?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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
        	<?
        	if($disabled=="")
			{
			?>
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarForm('<?=$controller?>')"  value="Grabar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <?
            }
			?>
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirForm('<?=$controller?>')"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>