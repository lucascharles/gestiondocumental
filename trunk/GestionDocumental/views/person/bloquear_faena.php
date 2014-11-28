<? include("views/cabecera.php"); ?>
<? include("views/menu.php"); ?>
<?
	$titulo_form = "BLOQUEAR FAENA";
?>
<form name="frmBloquear" action="" method='post'>
<input type="hidden" name="id_faena" id="id_faena" value="<?=$id_faena?>" />
<table  align="center" border="0" width="40%" cellpadding="0" cellspacing="0" id="formulario">
	<tr>
		<th align="left" colspan="3"><? echo($titulo_form) ?></th>
    </tr>
    <?
    while($rs=mysql_fetch_array($idsql_contratistas))
	{
		$img = "desbloqueado.png";
		if($rs["bloqueada"] == 1) $img = "bloqueado.png";
	?>
    <tr>
    	<td align="left" class="etiqueta_form"><?=$rs["ctrRazonSocial"]?></td>
        <td align="right" class="etiqueta_form" colspan="1"><img id="img_<?=$rs["ctrIdContratista"]?>" src="images/<?=$img?>" style="cursor:pointer;" onclick="bloquerContratista(<?=$rs["ctrIdContratista"]?>)"></td>
    </tr> 
    <tr>
    	<td align="left" colspan="2" style="border-bottom:solid; border-bottom-width:1px; border-bottom-color:#0000FF;"></td>
    </tr>   	
    <?
    }
	?>
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

            <input  type="button" name="btnsalir" id="btnsalir" onclick="salirForm('<?=$controller?>')"value="Salir" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)' />
         </td>
    </tr>
</table>
</div>
</form>
<? include("views/pie.php"); ?>