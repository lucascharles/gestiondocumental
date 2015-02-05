<? 	
	include("views/cabecera.php"); 
 	include("views/menu.php"); 
	
	$controller = "Informes";
	$titulo_form = "LISTADO TRABAJADORES";
 ?>
<form name="frmlistado" method="post" action="index.php">
<input type="hidden" name="controlador" id="controlador" value="<?=$controller?>" />
<input type="hidden" name="accion" id="accion" value="<?=$accion?>" />
<input type="hidden" name="filtrar" id="filtrar" value="0" />

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
			        <td align="left" width="150" class="etiqueta_form">Empresa</td>
			        <td align="left" width="170" class="etiqueta_form">
                    <select name="consIdConstructora" id="consIdConstructora"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onchange="llenarFiltro(this,document.getElementById('ctrIdContratista'),'EMPRESA_AGENCIA');" >
				   			<?
				   			while($rs=mysql_fetch_array($idsql_empresa))
							{
								$selected = "";
								if($_SESSION["f_consIdConstructora"] == $rs["consIdConstructora"])$selected = "selected='selected'";
						    ?>
							   <option value="<?=$rs["consIdConstructora"]?>" <?=$selected?> > <?=$rs["consRazonSocial"]?> </option>
							<?
							  }
				    		?>
            			</select>
                    </td>
			        <td align="left" width="170" class="etiqueta_form"></td>
			        <td align="right">
                    <input  type="button" name="btnbuscar" id="btnbuscar" onClick="mostrarListado()"  value="Filtrar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
                    </td>
			    </tr>
                <tr>
			        <td align="left" width="100" class="etiqueta_form">Agencia</td>
			        <td align="left" width="170" class="etiqueta_form">
                    	<select name="ctrIdContratista" id="ctrIdContratista" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" >
				   			<?
				   			while($rs=mysql_fetch_array($result))
							{
								$selected = "";
								if($_SESSION["f_ctrIdContratista"] == $rs["ctrIdContratista"])$selected = "selected='selected'";
						    ?>
							   <option value="<?=$rs["ctrIdContratista"]?>" > <? echo($rs["ctrRazonSocial"]); ?> </option>
							<?
							  }
				    		?>
            			</select>
                    </td>
			        <td align="left" width="170" class="etiqueta_form"></td>
			        <td align="left">

                    </td>
			    </tr>
                <tr>
			        <td align="left" width="100" class="etiqueta_form">Descargar documento</td>
			        <td align="left" width="170" class="etiqueta_form">
                    <select name="id_tipodocumento" id="id_tipodocumento" class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)" onchange="habilitarDescarga(this)">	
                    <option value=""></option>
                    <?
				   		while($rs=mysql_fetch_array($idsql_tipdoc))
						{
							$selected = "";
							//if($_SESSION["f_id_tipodocumento"] == $rs["id"])$selected = "selected='selected'";
					?>
					   <option value="<?=$rs["id"]?>" <?=$selected?> > <?=$rs["descripcion"]?> </option>
					<?
					   }
				    ?>
                    </select>
                    </td>
			        <td align="left" colspan="2"  class="etiqueta_form">
                    <div id="content_descarga" style="display:none">
                    Grupos:&nbsp;<input type="text" name="lotes" id="lotes" class="input_form_min" onFocus="resaltar(this)" onBlur="noresaltar(this)" value="1" />&nbsp;
                    <input  type="button" name="btndescargar" id="btndescargar"  value="Descargar" onclick="descargarDocumentos()" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
                    </div>
                    </td>
			    </tr>
                <tr>
			        <td align="left" class="etiqueta_form" colspan="3"></td>
			        <td align="right">
                    
                    </td>
			    </tr>
             </table>
         <td>
    </tr>
    <tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>  
	<tr>
	  	<td colspan="3" height="2" align="right">
        	
      	</td>
	</tr>
    
    <tr>
	  	<td colspan="3" height="2" align="right">
    	<div class="btn_impresion">
					<img alt="img001" src="images/get_impresora.jpg" onclick="imprimirHtml()" />
                    <img alt="img002" src="images/get_pdf.jpg" onclick="imprimirPdf()" />
                    <img alt="img003" src="images/get_excel.jpg" onclick="imprimirExcel()" />
                    </div>
      	</td>
	</tr>
     <tr>
        <td colspan="3" valign="top">
        <div id="buscador">
        <table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
			<tr>
             	<th>ID</th>
                <th>NOMBRE</th>	
                <th>APELLIDO</th> 	
                <th>RUT</th> 	
                <th>AFP</th>
                <th>AGENCIA</th>
            </tr>
			<?php
			if(($idsql)>0)
			{
           		while($rs=mysql_fetch_array($idsql))
				{
        	?>
            <tr bgcolor="#FFFFFF">               
            	<td align="center"><?=$rs["trbIdTrabajador"]?></td>  
                <td align="center"><?=$rs["trbNombre"]?></td>  
                <td align="center"><?=$rs["trbApPaterno"]." ".$rs["trbApMaterno"] ?></td>  
                <td align="center"><?=$rs["trbRut"]?></td>  
                <td align="center"><?=$rs["afp"]?></td>  
                <td align="center"><?=$rs["contratista"]?></td>  
            </tr>
            <tr bgcolor="#FFFFFF"  >
                <td colspan="7" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
            </tr>
            <?php
            	}
			}
            ?>
            
            </table>
        </div>
        	
         </td>
    </tr>  
</table>
</div>
</form>
<? include("views/pie.php"); ?>