<html>
<head>
<title>
	Seguridad-Ip
</title>
<link rel="stylesheet" href="css/sticky-navigation.css" />
 <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />
<script src="js/jquery-1.7.1.min.js"></script>
<script>
$(function() {

	// grab the initial top offset of the navigation 
	var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;
	
	// our function that decides weather the navigation bar should have "fixed" css position or not.
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop(); // our current vertical position from the top
		
		// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#sticky_navigation').css({ 'position': 'fixed', 'top':0, 'left':0 });
		} else {
			$('#sticky_navigation').css({ 'position': 'relative' }); 
		}   
	};
	
	// run our function on load
	sticky_navigation();
	
	// and run it again every time you scroll
	$(window).scroll(function() {
		 sticky_navigation();
	});
	
	// NOT required:
	// for this demo disable all links that point to "#"
	$('a[href="#"]').click(function(event){ 
		event.preventDefault(); 
	});
	
});
</script>
<style>
body
{
	padding:0;
	margin:0;
}
#header_top
{
	width:100%;
	height:360px;
	background: -webkit-linear-gradient(bottom, #EBEBEB, white); 
	background: -moz-linear-gradient(bottom, #EBEBEB, white); 
	background: -o-linear-gradient(bottom, #EBEBEB, white); 
	background: -ms-linear-gradient(bottom, #EBEBEB, white); 
	background: filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EBEBEB', endColorstr='#ffffffff', gradientType='1'); 
	linear-gradient(bottom, #EBEBEB, white);
}
de-em{font-weight:normal;color:rgba(51,51,51,0.8)}
.title-divider{text-align:left;margin-bottom:1em;padding:0}
.title-divider span{padding-right:0.5em; color:#666; font-family:Calibri, Verdana, Geneva, sans-serif}
.title-divider small{display:block;color:rgba(51,51,51,0.6)}

.btn_home
{	
	background:url(images/home.png) no-repeat;
	height:25px;
	width:25px;
	margin-top:8px;
	border:none;
	background-color:#000;
	cursor:pointer;
}

.content_btnhome button:hover
{	
	background:url(images/home.png) no-repeat;
	opacity: .85;  
	height:25px;
	width:25px;
	margin-top:8px;
	border:none;
	background-color:#000;
	cursor:pointer;
}

.selected_op
{
	border:none;
	color:#FFF;
	height:25px;
	background:#55A79A;
	font-family:Calibri, Verdana, Geneva, sans-serif;
	font-size:17px;
	text-align:center;
	cursor:pointer;
	border-radius:3px;
}
.content_op button:hover
{
	border:none;
	color:#FFF;
	height:25px;
	background:#46897E;
	font-family:Calibri, Verdana, Geneva, sans-serif;
	font-size:17px;
	text-align:center;
	cursor:pointer;
	border-radius:3px;
}
.icon_disp
{
	border:solid;
	border-width:1px;
	border-color:#E6E6E6;
	border-radius:3px;
	width:250px;
	text-align:center;
	background: -webkit-linear-gradient(bottom, #EBEBEB, white); 
	background: -moz-linear-gradient(bottom, #EBEBEB, white); 
	background: -o-linear-gradient(bottom, #EBEBEB, white); 
	background: -ms-linear-gradient(bottom, #EBEBEB, white); 
	background: filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EBEBEB', endColorstr='#ffffffff', gradientType='1'); 
	linear-gradient(bottom, #EBEBEB, white);
}

.tit_feature
{
	color:#55A79A;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:20px;
}

.tit_foot
{
	color:#ffffff;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:20px;
}
.txt_feature
{
	color:#666;
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
}
.title_prin
{
	color:#000;
	font-family:Calibri,Helvetica, sans-serif;
	font-size:35px;
	font-weight:lighter;
	font-stretch:semi-condensed;
}
.sub_title_prin
{
	color:#000;
	font-family:Calibri,Helvetica, sans-serif;
	font-size:25px;
	font-weight:lighter;
	font-stretch:semi-condensed;
}
.txt_foot
{
	color:#ADADAC;
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
}
.foot
{
	background:#333;
	height:100%px;
	padding:15px;
}
.sep_foot
{
	height:1px;
	color: #333;
	width:90%;
	position:relative; margin-top:15px;
}
a {
	text-decoration:none;
}
#my_logo
{
	background:url(images/logoproyecto_min.png) no-repeat;
	height:55px;
	padding-top:10px;
	padding-left:20px;
}
</style>
</head>

<body>
<div id="demo_top_wrapper">

	<div id="demo_top">
		<div class="demo_container">
			<div id="my_logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seguridad IP</div>
		</div>
	</div>

	<div id="sticky_navigation_wrapper">
		<div id="sticky_navigation">
			<div class="demo_container">
            	<table width="100%" border="0">
                <tr>
                	<td>
                    
				<ul style="margin-bottom:auto; background-color:#000;" >
					<li><a href="#" title="Home"  style="background-color: #000;"><div class="content_btnhome"><button class="btn_home"></button></div></a></li>
					
				</ul>
                	</td>
                    <td align="right" width="40%">
    				<div style="position:relative; margin-right:2px;">                
                    	<table>
                        <tr>
                        	<td>
                            <div class="content_op"> 
                    		<button class="selected_op">REGISTRARSE</button>
                            </div>
                            </td>
                            <td>
							<div class="content_op">
                            <button class="selected_op" onClick="window.location='index.php'">ENTRAR</button>
                            </div>
                    		</td>
                    	</tr>
                    	</table>
                    </div>
                    </td>
                </tr>
				</table>
           </div>
		</div>
	</div>

	
</div><!-- #demo_top_wrapper -->

<div id="header_top">
	<table width="920" align="center">
    	<tr>
        	<td>
            <img src="images/present_1.png">
            </td>
            <td valign="top">
            	<h2 class="title_prin"><span>
            	La forma m&aacute;s f&aacute;cil de seguir, gestionar y colaborar en su seguridad. 
                </span> </h2><br>
                <h2 class="sub_title_prin"><span>
				Con el poder de Seguridad-Ip.
                </span> </h2>
                 
            </td>
        </tr>
    </table>

</div>

<div id="">

<div>
<table width="100%">
    <tr>
    	<td>
        <table width="90%" align="center" border="0">
        	<tr>
            	<td colspan="4" height="20">
                
                </td>
            </tr>
        	<tr>
            	<td colspan="4">
                	 <h2 class="title-divider"><span>Caracter&iacute;sticas principales </span> </h2>
                </td>
            </tr>
			<tr>
    			<td valign="top" align="center">
                <table width="230">
                	<tr>
                    	<td>
         		<div class="icon_disp">
         		<img src="images/mobile.png">
         		</div>
                		</td>
                	</tr>
                    <tr>
                    	<td>
						<label class="tit_feature">Mobile friendly</label>
                		</td>
                    </tr>
                    <tr>
                    	<td>
                        <font class="txt_feature">
				Mantente conectado con los temas que usted est&aacute; viendo, creado, o se le ha asignado y no te pierdas el ritmo mientras se desplaza usando SeguridadIp Touch.
                		</font>
                		</td>
                    </tr>
                  </table>
				</td>
                <td valign="top"  align="center">
                <table width="230">
                	<tr>
                    	<td>
         		<div class="icon_disp">
         		<img src="images/gols.png">
         		</div>
                		</td>
                	</tr>
                    <tr>
                    	<td>
						<label class="tit_feature">Set & Meet Goals</label>
                		</td>
                    </tr>
                    <tr>
                    	<td>
                        <font class="txt_feature">
				Con la ayuda de Seguridad-Ip, se puede realizar un seguimiento de las caracter&iacute;sticas e hitos previstos y establecer las fechas de lanzamiento.
                		</font>
                		</td>
                    </tr>
                  </table>
				</td>
                <td valign="top"  align="center"> 
                <table width="230">
                	<tr>
                    	<td>
         		<div class="icon_disp">
         		<img src="images/acces.png">
         		</div>
                		</td>
                	</tr>
                    <tr>
                    	<td>
						<label class="tit_feature">Role Based Access Control</label>
                		</td>
                    </tr>
                    <tr>
                    	<td>
                        <font class="txt_feature">
						Involucre a sus clientes a trav&eacute;s de inscripciones o invitaciones y controlar su acceso a los proyectos.
                		</font>
                		</td>
                    </tr>
                  </table>
				</td>
                <td valign="top"  align="center">
                <table width="230">
                	<tr>
                    	<td>
         		<div class="icon_disp">
         		<img src="images/help.png">
         		</div>
                		</td>
                	</tr>
                    <tr>
                    	<td>
						<label class="tit_feature">Help & Assistance</label>
                		</td>
                    </tr>
                    <tr>
                    	<td>
                        <font class="txt_feature">
						Queremos saber de usted. Haremos todo lo posible para responder a sus preguntas y resolver cualquier problema.
                		</font>
                		</td>
                    </tr>
                  </table>
				</td>
             </tr>
         </table>
		</td>
        <td>
        </td>
	</tr>
</table>
<div>
<div>
<table width="100%">
	<tr>
    	<td>
         <table width="90%" align="center" border="0">
        	<tr>
            	<td colspan="4" height="20">
                
                </td>
            </tr>
        	<tr>
            	<td colspan="4" align="left" width="100%">
                	 <h2 class="title-divider"><span>Migrar a Seguridad-Ip</span> </h2>
                </td>
            </tr>
            <tr>
            	<td colspan="4" >
                	 <table width="100%" border="0" >
                     	<tr>
                        	<td valign="top" width="50%">
                            	<table width="100%" border="0">
                                <tr>
                                	<td>
                                  <label class="tit_feature">  Esta usted ...</label>
                                    </td>
                                </tr>
                                <tr>
                                	<td>
                                    <font class="txt_feature">
                                    <ul>
                                    <li>Cansado de mantener su sistema de seguridad en casa?</li>
                                    <li>Insatisfecho con los proveedores de hosting gen&aacute;ricos con poca o ninguna experiencia en Seguridad-Ip?</li>
                                    <li>
Buscando un apoyo profesional de las personas que saben Seguridad-Ip mejor?</li>
                                    </ul>
                                    </font>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            <td valign="top" width="50%" >
                            <table width="100%">
                                <tr>
                                	<td>
                                   <label class="tit_feature"> Usted ha venido al lugar correcto ...</label>
                                    </td>
                                </tr>
                                <tr>
                                	<td height="5">
                                   
                                    </td>
                                </tr>
                                <tr>
                                	<td>
                                    
                                    <font class="txt_feature">
                                    Con m&aacute;s de 14 a&ntilde;os de experiencia en la construcci&aacute;n de software, nosotros hemos llegado a conocer sobre Seguridad-Ip de adentro hacia afuera.

Ofrecemos servicios profesionales de consultor&iacute;a para ayudarle a importar sus datos existentes, archivos adjuntos, archivos a su Seguridad-Ip representan sin problemas y libre de riesgos.
									</font>
                                    </td>
                                </tr>
                                </table>
                            </td>
                        </tr>
                         <tr>
			            	<td colspan="4" align="right" >
                            	 <div class="content_op"> 
                    		<button class="selected_op">Cont&aacute;ctenos para obtener m&aacute;s informaci&oacute;n</button>
                            </div>
                            </td>
                         </tr>
                     </table>
                </td>
            </tr>
          </table>
		
		</td>
        <td>
        </td>
	</tr>
</table>
<br>
<div>

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
                    <button class="selected_op">OK</button>
                    </div>
                    </font>
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