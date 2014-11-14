<table>
<tr>
<td>
<select id="id_estado_documento<?=$id?>" name="id_estado_documento<?=$id?>" class="input_form" >
<?
	while($rs=mysql_fetch_array($idsql_estado))
    {
		$select = "";
		if($rs_doc["id_estado_documento"] == $rs["id"])	$select = "selected='selected'";
?>  
		<option value="<?=$rs["id"]?>" <?=$select?> ><?=$rs["descripcion"]?></option>
<?
	}
?>
</select>
</td>
<td width='5'></td>
<td><img src='images/ok.gif' style='cursor:pointer' title='Aceptar' onclick='grabarEditEstado(<?=$id?>)'></td>
<td width='5'></td>
<td><img src='images/cancelar.gif' style='cursor:pointer' title='Cancelar' onclick='cerrarEditEstado(<?=$id?>)'></td>
</tr>
</table>
