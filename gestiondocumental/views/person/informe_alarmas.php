<? 
include("views/cabecera.php"); 
include("views/menu.php");  

	$controller = "Informe";
	$titulo_form = "INFORME ALARMAS";
 ?>
<form name="frmlistado" method="post" action="index.php">
<input type="hidden" name="controlador" id="controlador" value="<?=$controller?>" />
<input type="hidden" name="accion" id="accion" value="<?=$accion?>" />
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
			     	<td align="left"  colspan="4" class="etiqueta_form">Fecha desde:&nbsp;
                    <input type="text" name="fecha_desde" id="fecha_desde" value="<? echo($_SESSION["f_fechadesde"]) ?>" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);"  />
                    &nbsp;&nbsp;Fecha hasta:&nbsp;<input type="text" name="fecha_hasta" id="fecha_hasta" value="<? echo($_SESSION["f_fechahasta"]) ?>" class="input_form_medio" onFocus="resaltar(this)" onBlur="noresaltar(this);"/>

                    </td>
			    </tr>
                
			    <tr>
			        <td align="left"  class="etiqueta_form">Dispositivo:&nbsp;&nbsp;
                    <input type="text" name="descripcion" id="descripcion"  value="<? echo($_SESSION["f_descripcion"]) ?>"  class="input_form_largo" onFocus="resaltar(this)" onBlur="noresaltar(this)"  onkeyup='mostrar()' tabindex="0"/></td>
			        <td align="left" class="etiqueta_form">
                    Modalidad
                    <select name="id_modo_camara" id="id_modo_camara" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)">	
                    <?
                    for($i=0; $i<$col_modo_camara->get_count(); $i++)
					{
						$dtmp = &$col_modo_camara->items[$i];
						$selected = "";
						if($dtmp->get_data("id") == $_SESSION["f_id_modo_camara"])
						{
							$selected = "selected='selected'";
						}
					?>
                    	<option value="<?=$dtmp->get_data("id")?>" <?=$selected?>><?=utf8_decode($dtmp->get_data("descripcion"))?> </option>
                    <?
					}
					?>
                    </select>
                    </td>
			        <td align="left" class="etiqueta_form">
                    Estado
                    <select name="id_estado_dispositivo" id="id_estado_dispositivo" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)">	
                    <?
                    for($i=0; $i<$col_estado_disp->get_count(); $i++)
					{
						$dtmp = &$col_estado_disp->items[$i];
						$selected = "";
						if($dtmp->get_data("id") == $_SESSION["f_id_estado_dispositivo"])
						{
							$selected = "selected='selected'";
						}
					?>
                    	<option value="<?=$dtmp->get_data("id")?>" <?=$selected?>><?=utf8_decode($dtmp->get_data("descripcion"))?> </option>
                    <?
					}
					?>
                    </select>
                    </td>
			        <td align="left" width="200">
                    <input  type="button" name="btnbuscar" id="btnbuscar" onclick="mostrarListado()"  value="Filtrar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>&nbsp;
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
    	
      	</td>
	</tr>
     <tr>
        <td colspan="3" valign="top">
        <div id="buscador">
        <table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado">
			<tr>
                <th>FECHA</th>
                <th>DISPOSITIVO</th>
                <th>MODO</th>
                <th>ESTADO</th>
            </tr>
			<?php
            while($rs=mysql_fetch_array($idsql))
			{
        	?>
            <tr bgcolor="#FFFFFF">               
                <td align="center"><?php echo (formatoFecha($rs["fecha"],"yyyy-mm-dd H:m:s","dd/mm/yyyy")) ?></td>
                <td align="center"><?=$rs["dispositivo"]?></td>
				<td align="center"><?=$rs["modalidad"]?></td>  
                <td align="center"><?=$rs["estado"]?></td>  
            </tr>
            <tr bgcolor="#FFFFFF"  >
                <td colspan="4" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; "></td>
            </tr>
            <?php
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