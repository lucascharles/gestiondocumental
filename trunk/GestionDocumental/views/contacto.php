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
        <h2>CONTACTO</h2>
       	<div style="padding:20px;"> 
        <?
        if($envio == true)
		{
			if($result=="")
			{
				echo("El mensaje ha sido enviado con &eacute;xito, en breve nos podremos en contacto con usted. Gracias.");
			}
			else
			{
				echo("Ha ocurrido un problema con el envio del mensaje. Por favor reintente mas tarde. Gracias.");
			}
		?>
        <form class="formulario_html5" id="formulario_html5" action="<?php echo $accion_form ?>"  method="post">
        	<div>  
                <ul>  
                    <li>

                    		<button type="submit" class="submit">Salir</button>

                    </li>
                    <li>

                    </li>
				</ul>
            </div>
			
			<div class="espacio"></div>
			
			</form>
        <?
		}
		else
		{
		?>
        Por favor introduzca sus datos de contacto y trataremos de responder a su consulta lo antes posible.  
        <form class="formulario_html5" id="formulario_html5" action="<?php echo $accion_form ?>"  method="post">
        	<div>  
                <ul>  
                    <li>  
		            <input type="text" name="nombre" id="noombre" placeholder="Razón Social" required style="width:80%" />  
                   </li>
                   <li>
	            	<input type="email"  name="email" id="email" placeholder="Email" required style="width:80%" />  
                    </li>
                    <li>
	            	<textarea id="mensaje" name="mensaje" placeholder='Mensaje'  required style="width:80%"></textarea>
                    </li>
                     <li>

                    		<button type="submit" class="submit">Enviar</button>

                    </li>
                    <li>

                    </li>
				</ul>
            </div>
			
			<div class="espacio"></div>
			
			</form>
          <?
		  }
		  ?>
            </div>
		</div>
        </div>
       

	</body>
</html>
