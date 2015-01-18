<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title><?php echo $nom_sistema; ?></title>
        <!-- <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />-->
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="css/menuheader.css" />
        <link rel="stylesheet" type="text/css" href="css/general.css" />
	    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/cabecera.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menuheader.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
<?php

	for($i=0;$i<count($arrayscriptJs);$i++)
	{
		echo "<script type='text/javascript' src='js/".$arrayscriptJs[$i]."' ></script>\n";
	}
	for($i=0;$i<count($arrayscriptCss);$i++)
	{
		echo "<link rel='stylesheet' type='text/css' href='css/".$arrayscriptCss[$i]."' />\n";
	}
?>		
</head>
<body>
	<div id="encabezado">
    	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" class="secc_opcabecera"  >
        	<!--
        	<tr>
			<td  class="secc_opcabecera_2" valign="top"  height="4" colspan="1"></td>
                 <td  class="secc_opcabecera_1" valign="top"  height="4" colspan="2"></td>
            </tr>
			-->
        	<tr class="">
            	<td valign="top" align="left">
                	<table border="0">
                    <tr>
                    	<td valign="middle">
                	<img src="images/logoproyecto_min.png" />
                    	</td>
                    	<td align="left" valign="middle">
                	<div id="nombre_sistema">
                	<?php echo $nom_sistema; ?>
                   </div>
                   		</td>
                    </tr>
                   </table>
                </td>
                <td width="300" class="" valign="top" colspan="2" >
			       	<div id="opcEncabezado">
                    	<table align="right"  border="0">
                        	<tr>
                            	<td align="left" width="50">
                                    	<img src="images/aviso.png" id="bandera_aviso" title="Notificaciones" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)" style="cursor:pointer; display:none;" onclick="abrirAvisos()" />
                                        
                                </td>
                                <td align="left" width="50">
                                        <img src="images/actualiza.png" id="bandera_actualiza" title="Actualizacion pendiente" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)" style="cursor:pointer; display:none;" onclick="abrirActualizacion()" />
                                        
                                </td>                                
                            	<td>
				        <div class="userlogin" title="Cambiar clave" onclick="cambiarClave()"><?php echo $_SESSION["idusuario"];?></div>
                        		</td>
                            	<td>
						 <div class="logoff" onClick="salirSistema()"><img src="images/logoff.png" title="Salir" onmouseover="resaltarImagen(this)" onmouseout="noresaltarImagen(this)"  alt="Salir" class="img_logoff"/></div>
                        		</td>
                        	</tr>
                        </table>
			        </div>
        		</td>
            </tr>
        </table>
	</div>
    <? $display_a = (checkPermisos($modulo,"alta")) ? '' : 'display:none'; ?>
	<? $display_b = (checkPermisos($modulo,"baja")) ? '' : 'display:none'; ?>
	<? $display_m = (checkPermisos($modulo,"modificacion")) ? '' : 'display:none'; ?>
	<? $display_e = (checkPermisos($modulo,"extra")) ? '' : 'display:none'; ?>
    
   
