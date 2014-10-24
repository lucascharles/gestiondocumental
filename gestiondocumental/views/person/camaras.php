<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<form name="frmcambioclave">
<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario" >
	<tr>
		<th align="left" colspan="3"><?=$des_layout?></th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
    <tr>
 	   	<td colspan="1" valign="top">
        <table border="0"  height="500px" width="150">
        	<? if(count($seccion) > 0){ ?>
        	<tr>
            	<td class="titulo_layout" height="5">
				SECCIONES
        		</td>
        	</tr>
            <? 
			for($i=0; $i<count($seccion); $i++) 
			{ 
				$seccaux = $seccion[$i];
			?>
            <tr>
            	<td height="10">			
                <div class="btn_seccion" onclick="zoomSeccion(<?=$seccaux["id"]?>)" onmouseover="resaltarSeccion(this,<?=$seccaux["id"]?>)" onmouseout="noresaltarSeccion(this,<?=$seccaux["id"]?>)"><?=$seccaux["descripcion"]?></div>
        		</td>
        	</tr>
            <? 
			} 
			?>
            <? 
			for($i=0; $i<count($secc_info); $i++) 
			{ 
				$infoaux = $secc_info[$i];
			?>
                <span id="info_disp_<?=$infoaux["id_seccion"]?>" style="display:none">
                Dispositivos:&nbsp;<?=$infoaux["cant_disp"]?><br>
                Activos:&nbsp;<?=$infoaux["cant_act"]?><br>
                Inactivos:&nbsp;<?=$infoaux["cant_inac"]?><br>
                </span>
            <? 
			} 
			?>
            <? } ?>
            <? if(count($dispositivo) > 0){ ?>
        	<tr>
            	<td class="titulo_layout" height="5">
				DISPOSITIVOS
        		</td>
        	</tr>
            <? 
			for($i=0; $i<count($dispositivo); $i++) 
			{ 
				$dispcaux = $dispositivo[$i];
			?>
            <tr>
            	<td height="10">			
                <div class="btn_seccion" onmouseover="resaltarDispositivo(this,<?=$dispcaux["id"]?>)" onmouseout="noresaltarDispositivo(this,<?=$dispcaux["id"]?>)"><?=$dispcaux["descripcion"]?></div>
        		</td>
        	</tr>
            <? 
			} 
			?>
            <? 
			for($i=0; $i<count($dispositivo); $i++) 
			{ 
				$infoaux = $dispositivo[$i];
			?>
                <span id="info_disp_<?=$infoaux["id"]?>" style="display:none">
                Estado:&nbsp;<?=$infoaux["estado_disp"]?><br>
                Modo:&nbsp;<?=$infoaux["modo_disp"]?><br>
                </span>
            <? 
			} 
			?>
            <? } ?>
            <tr>
            	<td height="80%">&nbsp;			
                	 <div id="info_dispositivos" class="info_dispositivos">
                     
                	</div>
        		</td>
        	</tr>
            <tr>
            	<td height="30">			
               
        		</td>
        	</tr>
        </table>
        </td>
		<td colspan="1">
        <div style="position:relative; width:623px; height:500px;">
        <div style="position:absolute; margin-left:0px; margin-top:0px; width:623px; height:500px;	">
        <img src="<?=$imagen?>" style="border-radius:10px;"   />
        </div>
        <? 
			for($i=0; $i<count($seccion); $i++ )
			{
				$icoaux = $seccion[$i];
		?>
        	<img src="images/ruter.png" id="ico_<?=$icoaux["id"]?>" title="<?=$icoaux["descripcion"]?>" onmouseover="resaltarSeccion(this,<?=$icoaux["id"]?>)" onmouseout="noresaltarSeccion(this,<?=$icoaux["id"]?>)" onclick="zoomSeccion(<?=$seccaux["id"]?>)" style="position:absolute; margin-left:<?=$icoaux["coordx"]?>px;  margin-top:<?=$icoaux["coordy"]?>px; cursor:pointer; float:left;" />	
        <?
			}
        ?> 
        <? 
			for($i=0; $i<count($dispositivo); $i++ )
			{
				$icoaux = $dispositivo[$i];
		?>
        	<img src="images/camara_min.png" id="ico_<?=$icoaux["id"]?>" title="<?=$icoaux["descripcion"]?>" onmouseover="resaltarDispositivo(this,<?=$icoaux["id"]?>)" onmouseout="noresaltarDispositivo(this,<?=$icoaux["id"]?>)" style="position:absolute; margin-left:<?=$icoaux["coordx"]?>px;  margin-top:<?=$icoaux["coordy"]?>px; cursor:pointer; float:left;" onclick="abrirCamaraIp('<?=$icoaux["direccion_ip"]?>')" />        	
        <?
			}
        ?> 
	    </div>
        </td>
        <td>
<!--
        	<div class="vis_camara">
            
        	// - aca la camara, definir la clase (vis_camara) en la hoja de estilos<br />
            // - ala  hacer click cargar en este div la camara, puede ser mediante jquery $('visualizador_l').load('pagina.php');

          

            </div>
    -->        
             <div id="ip1" style="position: relative; left: 76px; top: -3px; display: none;">
			  <img width="450" height="368" id="stream" src="/home/lcharles/Pictures/images.jpeg" width="800" height="600" border="0" alt=""> 
			 </div>
            
        </td>
  	  <td>
	    <? 
			for($i=0; $i<count($dispositivo); $i++ )
			{
				$icoaux = $dispositivo[$i];
		?>	

			<div id="ip1" style="position: relative; left: -200px; top: 30px;">
				<img width="300" height="268" border="0" alt="" src="<?=$icoaux["direccion_ip"]?>" id="stream"> 
			                &nbsp;
		    </div>            
        
        <?
			}
        ?> 	
      </td>  
    </tr>
      
    <tr>
        <td colspan="3" align="center" height="50">
           <input  type="button" name="btnsalir" id="btnsalir" onclick="salirFormLayout('<?=$controller?>','<?=$opcion_lay?>')" value="Salir" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>

			 <div id="ip1" style="position: relative; left: 76px; top: -3px; display: none;">
			  <img width="450" height="368" id="stream" src="http://trackfield.webcam.oregonstate.edu/mjpg/video.mjpg" width="800" height="600" border="0" alt=""> 
			 </div>


</div>
</form>
<? include("views/pie.php"); ?>