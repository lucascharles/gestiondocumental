<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "Alta Trabajador";
	
	$id = ($tipop=="M") ? $rs["trbIdTrabajador"] : "";
	$ape_usuario = ($tipop=="M") ? $rs["trbApPaterno"] : "";
	$nom_usu = ($tipop=="M") ? $rs["trbNombre"] : "";
	$clave = ($tipop=="M") ? $rs["clave"] : "";
	$fec_alta = ($tipop=="M" && $rs["fec_alta"]<>"0000-00-00") ? formatoFecha($rs["fec_alta"],"yyyy-mm-dd H:m:s","dd/mm/yyyy") : "";
	$trbRut= ($tipop=="M") ? $rs["trbRut"] : "";
	$trbApPaterno= ($tipop=="M") ? $rs["trbApPaterno"] : "";
	$trbIdTrabajador= ($tipop=="M") ? $rs["trbIdTrabajador"] : "";
	$dirIdDireccion= ($tipop=="M") ? $rs["dirIdDireccion"] : "";
	$comIdComuna= ($tipop=="M") ? $rs["comIdComuna"] : "";
	$isaIdIsapre= ($tipop=="M") ? $rs["isaIdIsapre"] : "";
	$nacionalidad= ($tipop=="M") ? $rs["nacionalidad"] : "";
	$trbSexo= ($tipop=="M") ? $rs["trbSexo"] : "";
	$tgrlIdCargoContractual= ($tipop=="M") ? $rs["tgrlIdCargoContractual"] : "";
	$tgrlIdOficioCab= ($tipop=="M") ? $rs["tgrlIdOficioCab"] : "";
	$tgrlIdOficioDet= ($tipop=="M") ? $rs["tgrlIdOficioDet"] : "";
	$tgrlIdTipoContrato= ($tipop=="M") ? $rs["tgrlIdTipoContrato"] : "";
	$tjorIdTipoJornada= ($tipop=="M") ? $rs["tjorIdTipoJornada"] : "";
	$trbAfectoArt22= ($tipop=="M") ? $rs["trbAfectoArt22"] : "";
	$trbAntiguedadMeses= ($tipop=="M") ? $rs["trbAntiguedadMeses"] : "";
	$trbApMaterno= ($tipop=="M") ? $rs["trbApMaterno"] : "";
	$trbCeco= ($tipop=="M") ? $rs["trbCeco"] : "";
	$trbFechaNac= ($tipop=="M") ? formatoFecha($rs["trbFechaNac"],"yyyy-mm-dd","dd/mm/yyyy") : "";
	$trbFechaContrato = ($tipop=="M") ? formatoFecha($rs["trbFechaContrato"],"yyyy-mm-dd","dd/mm/yyyy") : "";
	$trbFechaDesvinculado = ($tipop=="M") ? formatoFecha($rs["trbFechaDesvinculado"],"yyyy-mm-dd","dd/mm/yyyy") : "";
	$trbTelefono= ($tipop=="M") ? $rs["trbTelefono"] : "";
	$trbTitulo= ($tipop=="M") ? $rs["trbTitulo"] : "";
	$ctrIdContratista= ($tipop=="M") ? $rs["ctrIdContratista"] : "";
	$id_faena= ($tipop=="M") ? $rs["id_faena"] : "";
	$trbDireccion = ($tipop=="M") ? $rs["trbDireccion"] : "";
	$idRegion = ($tipop=="M") ? $rs["idRegion"] : "";
	$idComuna = ($tipop=="M") ? $rs["idComuna"] : "";
	$idCiudad = ($tipop=="M") ? $rs["idCiudad"] : "";
	$trbPactoIsapre = ($tipop=="M") ? $rs["trbPactoIsapre"] : "";
	$afpIdAfp= ($tipop=="M") ? $rs["afpIdAfp"] : "";
	$trbPensionado = ($tipop=="M") ? $rs["trbPensionado"] : "";
	$trbSeguroCesantia = ($tipop=="M") ? $rs["trbSeguroCesantia"] : "";
	
	
	if($tipop=="M")
	{
		$titulo_form = "Edici&oacute;n Trabajador (Id: ".$id.")";
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
     	   <input type="text" name="trbApMaterno" id="trbApMaterno" value="<? echo($trbApMaterno); ?>" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
     	
        <tr>
     	<td align="right" class="etiqueta_form">Ap Paterno:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbApPaterno" id="trbApPaterno" value="<? echo($trbApPaterno); ?>" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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
    	   <input type="text" name="nacionalidad" id="nacionalidad" value="<?=$nacionalidad?>" valida="" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
    </tr>    	
        <tr>
     	<td align="right" class="etiqueta_form">Rut:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbRut" id="trbRut" value="<?=$trbRut?>" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
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
			<?
			$selected_h = "";
			$selected_m = "";
            if($trbSexo==1) $selected_h = "selected='selected'";
			if($trbSexo==2) $selected_m = "selected='selected'";
			?>
           <select name="trbSexo" id="trbSexo" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)">            
           		<option value="1" <?=$selected_h?>>HOMBRE</option>
           		<option value="2" <?=$selected_m?>>MUJER</option>
           </select>
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	   </td>
        </tr>    	
    <tr>
	<td align="left" class="subtitulo_form" colspan="3">Direcci&oacute;n</td>
    </tr>
	<tr>
	<td align="right" class="etiqueta_form">Direccion:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <input type="text" name="trbDireccion" id="trbDireccion" value="<? echo($trbDireccion); ?>" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
	   </td>
	   <td align="left" class="etiqueta_form" >
	  
	   </td>
   </tr>    	
   <tr>
    <td align="right" class="etiqueta_form">Region:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <select name="idRegion" id="idRegion" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="limpiarDendencia(document.getElementById('idComuna')); llenarFiltro(this,document.getElementById('idCiudad'),'REGION_CIUDAD')">            
	   			<?
	   			while($rs=mysql_fetch_array($regiones))
				{
					$selected = "";
					if($rs["idRegion"] == $idRegion)$selected = "selected='selected'";
			    ?>
			<option value="<?=$rs["idRegion"]?>" <?=$selected?> > <? echo($rs["region"]); ?> </option>
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
	   <select name="idCiudad" id="idCiudad" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" onchange="llenarFiltro(this,document.getElementById('idComuna'),'CIUDAD_COMUNA')">
			   <?
			   if($tipop=="M")
			   {
	   			while($rs=mysql_fetch_array($ciudades))
				{
					$selected = "";
					if($rs["idCiudad"] == $idCiudad)$selected = "selected='selected'";
			    ?>
				<option value="<?=$rs["idRegion"]?>" <?=$selected?> > <? echo($rs["ciudad"]); ?> </option>
				<?
				  }
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
		   <select name="idComuna" id="idComuna" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
                    <?
				   if($tipop=="M")
				   {
					while($rs=mysql_fetch_array($comunas))
					{
						$selected = "";
						if($rs["idComuna"] == $idComuna)$selected = "selected='selected'";
					?>
					<option value="<?=$rs["idComuna"]?>" <?=$selected?> > <? echo($rs["comuna"]); ?> </option>
					<?
					  }
				   }
				   ?>
		   </select>
		   </td>
		   <td align="left" class="etiqueta_form" >
		  
		   </td>
		</tr>
   <tr>
	<td align="left" class="subtitulo_form" colspan="3">Empresa</td>
    </tr>
    <tr> 	
    <td align="right" class="etiqueta_form">Empresa:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <select name="consIdConstructora" id="consIdConstructora" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" onchange="llenarFiltro(this,document.getElementById('ctrIdContratista'),'EMPRESA_AGENCIA');"s >
	   			<?
	   			while($rs=mysql_fetch_array($idsql_empresa))
				{
					$selected = "";
					if($consIdConstructora == $rs["consIdConstructora"])$selected = "selected='selected'";
			    ?>
					<option value="<?=$rs["consIdConstructora"]?>" <?=$selected?> > <? echo($rs["consRazonSocial"]); ?> </option>
				<?
				  }
	    		?>
	   </select>
	   </td>
	   <td align="left" class="etiqueta_form" > </td>
	   </tr>
	   
	<tr>
    <tr> 	
    <td align="right" class="etiqueta_form">Agencia:</td>
	   <td align="left" class="etiqueta_form" colspan="1">
	   <select name="ctrIdContratista" id="ctrIdContratista" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
	   			<?
					while($rs=mysql_fetch_array($contratistas))
					{
						$selected = "";
						if($ctrIdContratista == $rs["ctrIdContratista"])$selected = "selected='selected'";
					?>
				<option value="<?=$rs["ctrIdContratista"]?>" <?=$selected?> > <? echo($rs["ctrRazonSocial"]); ?> </option>
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
           <select name="tgrlIdCargoContractual" id="tgrlIdCargoContractual" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
	   			<?
					while($rs=mysql_fetch_array($idsql_cargo))
					{
						$selected = "";
						if($tgrlIdCargoContractual == $rs["id"])$selected = "selected='selected'";
					?>
				<option value="<?=$rs["id"]?>" <?=$selected?> > <? echo($rs["descripcion"]); ?> </option>
					<?
					  }
				
					?>
	   </select>
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
       
       <tr>
       	<td align="right" class="etiqueta_form">Fecha de Ingreso:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbFechaContrato" id="trbFechaContrato" value="<?=$trbFechaContrato?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	</td>
       </tr>    	
       
       <tr>
       	<td align="right" class="etiqueta_form">Fecha Desvinculacion:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
     	   <input type="text" name="trbFechaDesvinculado" id="trbFechaDesvinculado" value="<?=$trbFechaDesvinculado?>" valida="" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);" />
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
     	</td>
       </tr>    	
       
	   <tr>
	      <td align="right" class="etiqueta_form">Isapre:</td>
	   		<td align="left" class="etiqueta_form" colspan="1">
 	   			<select name="isaIdIsapre" id="isaIdIsapre" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)">
                		<option value=""></option>
	   					<?
				   			while($rs=mysql_fetch_array($isapres))
							{
								$selected = "";
								if($isaIdIsapre == $rs["isaIdIsapre"]) $selected = "selected='selected'";
						?>	
                        	<option value="<?=$rs["isaIdIsapre"]?>" <?=$selected?> > <?=$rs["isaIsapre"]?> </option>
						<?
							}
				    	?>
	   			</select>
	   		</td>
	   </tr>    	

	   <tr>
	      <td align="right" class="etiqueta_form">Pacto Isapre:</td>
	   		<td align="left" class="etiqueta_form" colspan="1">
 	   			<select name="trbPactoIsapre" id="trbPactoIsapre" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
                		<option value=""></option>
					<?
				   			while($rs=mysql_fetch_array($idsql_pactoisapres))
							{
								$selected = "";
								if($trbPactoIsapre == $rs["id"]) $selected = "selected='selected'";
						?>	
                        	<option value="<?=$rs["id"]?>" <?=$selected?> > <?=$rs["descripcion"]?> </option>
						<?
							}
				    	?>
                  
	   			</select>
	   		</td>
	   </tr>    	
	   
	   <tr>
	      <td align="right" class="etiqueta_form">AFP:</td>
	   		<td align="left" class="etiqueta_form" colspan="1">
 	   			<select name="afpIdAfp" id="afpIdAfp" valida="requerido" tipovalida="texto" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="">
                		<option value=""></option>
	   					<?
				   			while($rs=mysql_fetch_array($afps))
							{
								$selected = "";
								if($afpIdAfp == $rs["afpIdAfp"]) $selected = "selected='selected'";
						?>		<option value="<?=$rs["afpIdAfp"]?>" <?=$selected?> > <?=$rs["afpNombre"]?> </option>
						<?
							}
				    	?>
	   			</select>
	   		</td>
	   </tr>    	

	   <tr>
    	<td align="right" class="etiqueta_form">Seguro Cesantia:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
           <select name="trbSeguroCesantia" id="trbSeguroCesantia" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
           <?
		   $combo = $_SESSION["combo_sino"];
           for($i=0; $i<count($combo); $i++)
		   {
		   		$selected = "";
				if($trbSeguroCesantia == $combo[$i][0]) $selected = "selected='selected'";
		   ?>
           	<option value="<?=$combo[$i][0]?>" <?=$selected?> ><?=$combo[$i][1]?></option>
           <?
		   }
		   ?>
           
           </select>
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	
        	
        	
       <tr>
    	<td align="right" class="etiqueta_form">Pensionado:</td>
    	   <td align="left" class="etiqueta_form" colspan="1">
           <select name="trbPensionado" id="trbPensionado" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
           <?
           for($i=0; $i<count($combo); $i++)
		   {
		   		$selected = "";
				if($trbPensionado == $combo[$i][0]) $selected = "selected='selected'";
		   ?>
           	<option value="<?=$combo[$i][0]?>" <?=$selected?> ><?=$combo[$i][1]?></option>
           <?
		   }
		   ?>           
           </select>
    	   </td>
    	   <td align="left" class="etiqueta_form" >
    	  
    	   </td>
       </tr>    	

    	
        <tr>
     	<td align="right" class="etiqueta_form">Afecto Art. 22:</td>
     	   <td align="left" class="etiqueta_form" colspan="1">
           <select name="trbAfectoArt22" id="trbAfectoArt22" valida="requerido" tipovalida="texto" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
           <?
           for($i=0; $i<count($combo); $i++)
		   {
		   		$selected = "";
				if($trbAfectoArt22 == $combo[$i][0]) $selected = "selected='selected'";
		   ?>
           	<option value="<?=$combo[$i][0]?>" <?=$selected?> ><?=$combo[$i][1]?></option>
           <?
		   }
		   ?>
           
           </select>
     	   </td>
     	   <td align="left" class="etiqueta_form" >
     	  
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
        	<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarForm('<?=$controller?>')"  value="Grabar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirForm('<?=$controller?>')"value="Cancelar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>