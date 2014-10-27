<? include("views/cabecera_front.php"); ?>
<div id="page-wrap">
<form name="frmcargadoc" enctype='multipart/form-data' method='post' action='' target='_self'>
<table  align="center" border="0" cellpadding="0" cellspacing="0" id="formulario_home" height="" width="70%" >
	<tr>
		<th align="left" colspan="3">Empresa</th>
    </tr>
    <tr>
		<td align="left" height="10" colspan="3"></td>
    </tr>
    <tr>
		<td align="left" class="etiqueta_form">Rut:&nbsp;<?=$dato["ctrRut"]?></td>
        <td align="left" class="etiqueta_form">Raz&oacute; Social:&nbsp;<?=$dato["ctrRazonSocial"]?></td>
        <td align="left" class="etiqueta_form"></td>
    </tr>
    <tr>
        <td align="left" class="etiqueta_form" colspan="3">Direcci&oacute;n:&nbsp;<?=$dato["direccion"]?></td>
    </tr>
    <tr>
        <td align="left" class="etiqueta_form" colspan="3">Tel&eacute;fono:&nbsp;<?=$dato["ctrTelefono"]?></td>
    </tr>
     <tr>
        <td colspan="3" height="5">
         </td>
    </tr>
    <tr>
        <td colspan="3" height="5">
         <select id="id_faena" name="id_faena" class="input_form" filtro="S" onFocus="resaltar(this)" onchange="alert('filtrar')" onBlur="noresaltar(this)" >
		 <?
			while($rs=mysql_fetch_array($idsql_faena))
            {
            	$selected = "";
                if($rs["id"] == $_SESSION["f_id_faena"])
                {
                	$selected = "selected='selected'";
                }
         ?>
                <option value="<?=$rs["faeIdFaenas"]?>" <?=$selected?>><?=$rs["faeNombre"]?> </option>
         <?
            }
         ?>
         </select>
         </td>
    </tr>
    <tr>
        <td colspan="3" height="5">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
        	
        </table>
         </td>
    </tr>
    <tr>
        <td colspan="3" height="5" valign="top">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#55A79A">
        	<tr>
            	<?
				$cont = 0;
                while($rs=mysql_fetch_array($idsql_tip_doc))
				{
				$cont++;
				?>
                <td  class="solapa" onclick="cargarDocumento(<?=$rs["id"]?>)"><?=$rs["descripcion"]?></td>
                <?
                }
				?>
            </tr>
	        <tr>
            	<td colspan="<?=$cont?>">
                Nombre: <input type="text" name="doctNombreArchivo" id="doctNombreArchivo" class="input_form" onFocus="resaltar(this)" onBlur="noresaltar(this)" />
                </td>
            </tr>
            <tr>
            	<td colspan="<?=$cont?>">
                Archivo: <input type='file' id='archivo' name='archivo' />&nbsp;<input  type="button" name="btngrabar" id="btngrabar" onclick="grabarFormUploadArch(<?=$_SESSION["f_id_tipo_documento"]?>)"  value="Adjuntar" class="boton_form" onMouseOver='overClassBoton(this)' onMouseOut='outClassBoton(this)'/>
                </td>
            </tr>
            <tr>
            <td colspan="<?=$cont?>">
            <table width="100%" cellpadding="0" cellspacing="0" align="center" border="0" bgcolor="#FFFFFF" id="listado_home">
        		<tr>
            	<th></th><th>Documento</th>
            	</tr>
            	<?
				if($idsql_doc > '')
				{
                while($rs=mysql_fetch_array($idsql_doc))
				{
				?>
                <tr><td></td><td><?=$rs["doctNombreArchivo"]?></td></tr>
                <tr bgcolor="#FFFFFF" >
    			<td colspan="2" style="border-bottom:solid; border-bottom-width:2px; border-bottom-color:#CCCCCC; height:5px; "></td>
				</tr>
                <?
                }
				}
				else
				{
				?>
				<tr><td></td><td><? echo("Sin documentos")?></td></tr>
                <?
				}
				?>
            </table>
            </td>
            </tr>
        </table>
         </td>
    </tr>
    <tr>
        <td colspan="3">
        	<span id="mensaje"></span>
         </td>
    </tr>   
    <tr>
        <td colspan="3" align="center" height="50">
        	
         </td>
    </tr>
</table>
</form>
</div>

<div class="foot">
<table width="90%" align="center" >
	<tr>
    	<td height="30">
        </td>
    </tr>
	<tr>
    	<td valign="top"  width="20%">
        	<table width="100%">
            	<tr>
                	<td>
                    	<label class="tit_foot">Cont&aacute;ctenos</label>
                    </td>
                </tr>
                <tr>
                	<td valign="top">
                    <table>
                    	<tr>
                        	<td> <img src="images/mail.png"></td>
                        	<td>
			                 <font class="txt_foot">support@seguridad-ip.com</font>
                    		</td>
                    	</tr>
                        <tr>
                        	<td><img src="images/adress.png"></td>
                        	<td>
							<font class="txt_foot">Santiago de Chile, Chile</font>
                            </td>
                        </tr>
                    </table>
                    </td>
                </tr>
            </table>
		</td>
        <td  valign="top"  width="40%">
        	<table  width="100%">
            	<tr>
                	<td>
                    	<label class="tit_foot">Acerca de nosotros</label>
                    </td>
                </tr>
                <tr>
                	<td>
                    <font class="txt_foot">
                    Seguridad-Ip podr&iacute;a ser la herramienta de seguridad que ha estado esperando.
                    </font>
                    </td>
                </tr>
            </table>
        </td>
        <td  valign="top" width="40%">
        	<table  width="100%">
            	<tr>
                	<td>
                    	<label class="tit_foot">Novedades</label>
                    </td>
                </tr>
                <tr>
                	<td>
                     <font class="txt_foot">
                    Mant&eacute;ngase al d&iacute;a con nuestras &uacute;ltimas noticias y comunicados de productos mediante la firma de nuestro bolet&iacute;n de noticias.
                    
                    </font>
                    </td>
                </tr>
                <tr>
                	<td>
                     <font class="txt_foot">
                    
                    
                     <div class="content_op"> 
                     <input type="email" name="mail_new" id="mail_new" placeholder="Email" size="30">
                    <button class="selected_op" onClick="smail()">OK</button>
                    </div>
                    </font>
                    <span id="mensaje_news" class="mensaje_news">Loooo</span>
                    </td>
                </tr>
            </table>
        </td>
	</tr>
</table>


<hr class="sep_foot">

<table width="90%" style="position:relative; margin-top:15px;"  align="center">
	<tr>
    	<td align="left">
        <a href="#" class="txt_foot">Seguridad-Ip</a><font class="txt_foot"> &Iota; Copyright <?=date("Y")?> &copy; All Rights Reserved.</font>
        </td>
    </tr>
</table>
</div>

</body>
</html>