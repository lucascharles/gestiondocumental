<? 
include("views/cabecera.php");
include("views/menu.php");

$titulo_form = "Detalle Faena";

$id= $ctrIdContratista;
?>
<form name="frmdashboard" action="" method='post'>
<input type="hidden" name="id_contratista" id="id_contratista" filtro="S" value="<? echo($ctrIdContratista)?>" />
<input type="hidden" name="controller" id="controller" value="<? echo($controller)?>" />
<input type="hidden" name="id_faena" id="idFaena" filtro="S" value="<? echo($datoFaena["faeIdFaenas"])?>" />
<input type="hidden" name="id_tipodocumento" id="id_tipodocumento" filtro="S" value="<?=$rs_tip_doc["id"]?>" />


<table  align="center" border="0" width="80%" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <tr>
		<th align="left" colspan="3" height="15"> </th>
    </tr>
    <tr>
    	<td align="left" class="etiqueta_form" colspan="2">Faena:&nbsp;<?=$datoFaena["faeNombre"]?></td>
        <td align="right" class="etiqueta_form" colspan="1">
        <table class="opciones" onclick="volverFaenaEmp('<?=$controller?>',0)" title="Volver" >
                        <tr>
                            <td align="right" valign="middle">.
                            <img src="images/volver.gif" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)"/>
                            </td>
                            <td align="left" valign="middle" >
                            Volver
                            </td>
                        </tr>
                    </table>
        </td>
    </tr>
	<tr>
       	<td align="left" colspan="3" class="etiqueta_form">Responsable:&nbsp;<?=$datoFaena["faeResponsable"]?></td>
   </tr>    
  
    <tr>
	   	<td colspan="3"> 
        	 <div id="documentos" style="">
			 <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			 	<tr>
					<td colspan="3">
			        	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
			            	<tr>
                            	<?
								$cont = 0;
                                while($rs=mysql_fetch_array($idsql_tip_doc))
								{
									$selected = "class='boton_form'";
									//if($cont == 0)	$selected = "class='boton_form_brillante' seleccionado='S'";
									$cont++;
								?>
			                	<td <?=$selected ?> id="btn_<?=$rs["id"]?>" tabname="btn_tipo_doc"  onclick="cargarTab('<?=$controller?>',<?=$rs["id"]?>)">
			                    	<?=$rs["descripcion"]?>
			                    </td>
                               	<?
                                }
								?>
                                
			                </tr>
			            </table>
			        </td>
			    </tr>
			    <tr>
					<td colspan="3" height="10">
			        
			        </td>
			    </tr>
			    <tr>
					<td colspan="3">
                      <div id="frmitemsadmin" style=" width:100%; min-height:1050px; overflow:auto;"></div>
			        </td>
			    </tr>
			
			</table>
		</div>
        </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>