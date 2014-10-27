<html>
<head>
<title>
	Gestión-Documental
</title>
<link rel="stylesheet" href="css/sticky-navigation.css" />
 <!--<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />-->
	<script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/home.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/home.css" />
     <link rel="stylesheet" type="text/css" href="css/general.css" />
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

<div id="demo_top_wrapper">


    <div style="width:90%; height:50px;  margin-right: auto; margin-left: auto;">
	<div id="my_logo">Gesti&oacute;n Documental</div>	
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
                    		<!--<button class="selected_op">REGISTRARSE</button>-->
                            </div>
                            </td>
                            <td>
							<div class="content_op">
                            <button class="selected_op" onclick="salirSistema()" >SALIR</button>
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
   
