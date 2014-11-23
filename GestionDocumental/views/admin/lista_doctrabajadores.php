<? 
include("views/cabecera_listado.php"); 
?>
            <table width="100%" cellpadding="0" cellspacing="1" align="center" border="0" bgcolor="#ffffff" id="listado_home">
            	<?
				if($result > '')
				{
                while($rs=mysql_fetch_array($result))
				{
				?>
                <tr bgcolor="#FFFFFF">
                	<td></td>
                    <td><?=$rs["doctNombreArchivo"]?></td>
                    <td><?=$rs["estado_documento"]?></td>
                    <td align="right"><a href="docvarios/<?=$id_c."_docs_".$id_f."/".$rs["doctNombreEncrip"]?>" target="_blank"><?=$rs["NombreOriginal"]?></a></td>
                    <td align="center">
                    <img id="<?=$rs["id_documento"]?>" src="images/editar_estado.png" style="cursor:pointer;" title="Cambiar Estado" onclick='editarEstado(this)' />&nbsp;&nbsp;&nbsp;&nbsp;
                    <img id="<?=$rs["id_documento"]?>" src="images/borrar.gif" style="cursor:pointer;" title="Borrar" onclick='borrarDocumento(this)' />
                    </td>
                    
                </tr>
                <tr bgcolor="#FFFFFF" >
    			<td colspan="5" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; height:5px; "></td>
                
				</tr>
                <?
                }
				}
				else
				{
				?>
				<tr><td colspan="5"><? echo("Sin documentos")?></td></tr>
                <?
				}
				?>
            </table>
    
<? include("views/pie_listado.php"); ?>