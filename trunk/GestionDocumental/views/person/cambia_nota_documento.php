<table border="0"> 
<tr>
<td width="98%"></td>
<td width='5'></td>
<td><img src='images/ok.gif' style='cursor:pointer' title='Aceptar' onclick='grabarEditNota(<?=$id?>)'></td>
<td width='5'></td>
<td><img src='images/cancelar.gif' style='cursor:pointer' title='Cancelar' onclick='cerrarEditNota(<?=$id?>)'></td>
</tr>
<tr>
<td colspan="5">
<textarea id="nota<?=$id?>" name="nota<?=$id?>" class="text_area_form"><?=nl2br($rs_doc["nota"])?> </textarea>
</td>
</tr>
</table>
