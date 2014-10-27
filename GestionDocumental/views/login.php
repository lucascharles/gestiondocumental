<html>
	<head>
		<title><?php echo $nom_sistema ?></title>
        <!-- <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="images/favicon.ico" />-->
		<link rel="stylesheet" href="css/login_m.css" type="text/css" />
		<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#usrLogin').focus();
		});
		</script>
	</head>
	<body>
        <div>
        
        <br>
        <div id="login">
        <h2><?=$nom_sistema?></h2>
       	<div style="padding:20px;"> 
        <form class="formulario_html5" id="formulario_html5" action="<?php echo $accion_form ?>"  method="post">
        	<div>  
                <ul>  
                    <li>  
		            <input type="text" name="usrLogin" id="usrLogin"   placeholder="Email" required />  
                   </li>
                   <li>
	            	<input type="password"  name="passLogin" id="passLogin" placeholder="Clave" required />  
                    </li>
                    <li>

                    </li>
                     <li>

                    		<button type="submit" class="submit">Iniciar Sesi&oacute;n</button>

                    </li>
                    <li>
	            	<a href="#">Olvid&oacute; su contrase&ntilde;a?</a>
                    </li>
				</ul>
            </div>
			
			<div class="espacio"></div>
			
			</form>
            </div>
		</div>
        </div>
       

	</body>
</html>
