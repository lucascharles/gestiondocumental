<?
	include("views/cabecera.php"); 
 	include("views/menu.php"); 
 
	$titulo_form = "DASHBOARD";
?>
    <div id="content">
	<div id="ventana_1" class="rojo arrastrable" cuadrante="cuadrante_1" style="display:none" onDblClick="zoomVentana(this)" zoom="0">1</div>
	<div id="ventana_2" class="rojo arrastrable" cuadrante="cuadrante_2" style="display:none" onDblClick="zoomVentana(this)" zoom="0">2</div>
    <div id="ventana_3" class="rojo arrastrable" cuadrante="cuadrante_3" style="display:none" onDblClick="zoomVentana(this)"  zoom="0">3</div>
    <div id="ventana_4" class="rojo arrastrable" cuadrante="cuadrante_4" style="display:none" onDblClick="zoomVentana(this)"  zoom="0">4</div>
    <div id="ventana_5" class="rojo arrastrable" cuadrante="cuadrante_5" style="display:none" onDblClick="zoomVentana(this)" zoom="0">5</div>
    <div id="ventana_6" class="rojo arrastrable" cuadrante="cuadrante_6" style="display:none" onDblClick="zoomVentana(this)" zoom="0">6</div>
    <table width="800" align="center" cellpadding="0" cellspacing="15" border="0">
    	<tr>
        	<td>
	<div id="cuadrante_1" class="suelta" >
		
	</div>
    		</td>
            <td>
	<div id="cuadrante_2" class="suelta" >
		
	</div>
    		</td>
            <td>
	<div id="cuadrante_3" class="suelta" >
		
	</div>
    		</td>
     	</tr>
        <tr>
        	<td>
	<div id="cuadrante_4" class="suelta" >
		
	</div>
    		</td>
            <td>
	<div id="cuadrante_5" class="suelta" >
		
	</div>
    		</td>
            <td>
	<div id="cuadrante_6" class="suelta" >
		
	</div>
    		</td>
     	</tr>
        <tr>
        	<td align="left"><span id="mensajes"></span></td>
     	</tr>
        </table>
</div>
<? include("views/pie.php"); ?>