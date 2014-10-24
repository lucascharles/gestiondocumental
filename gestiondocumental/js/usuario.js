		$(document).ready(function()
		{
  			$('form').validator();
			document.getElementById("txtclave").focus();			
		});
		
		function salirCambioClave()
		{
			window.location = "index.php?controlador=Index&accion=page_default";
		}
		
		function validarClave(campo)
		{
			var resp = false;
			
			if(campo == "clave")
			{
				if($("#txtclave").val() == "")
				{
					$("#msj_error_txtclave").show();
					$("#msj_error_txtclave").text("No se permite campo vacio");
				}
				else
				{
					if($("#txtclave").val().length < 4)
					{
						$("#msj_error_txtclave").show();
						$("#msj_error_txtclave").text("Debe ingresar 4 o mas caracteres");
					}
					else
					{
						$("#msj_error_txtclave").hide();
						resp = true;
					}
				}
			}
			
			if(campo == "clave_confirm")
			{
				if($("#txtclaveconfirm").val() == "")
				{
					$("#msj_error_txtclaveconfirm").show();
					$("#msj_error_txtclaveconfirm").text("No se permite campo vacio");
				}
				else
				{
					if($("#txtclaveconfirm").val().length < 4)
					{
						$("#msj_error_txtclaveconfirm").show();
						$("#msj_error_txtclaveconfirm").text("Debe ingresar 4 o mas caracteres");
					}
					else
					{
						if($("#txtclave").val() != $("#txtclaveconfirm").val())
						{
							$("#clave_confirm_error").show();
							$("#msj_error_txtclaveconfirm").text("Confirmacion incorrecta");
						}
						else
						{
							$("#msj_error_txtclaveconfirm").hide();
							resp = true;
						}
					}
				}
			}
			
			return resp;
		}
		
		function grabarCambioClave()
		{
			if(validarClave("clave"))
			{
				if(validarClave("clave_confirm"))
				{				
					var datos = "controlador=Usuario";
					datos += "&accion=graba_cambio_clave";
					datos += "&nueva="+$("#txtclaveconfirm").val();
							
					$.ajax({
						url: "index.php",
						type: "GET",
						data: datos,
						cache: false,
						success: function(res)
						{							
							$("#mensaje").text("La clave se cambió con éxito.");
							setTimeout("window.location = 'index.php?controlador=Index&accion=page_default';",3000);
						},
						error: function()
						{
							$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
							setTimeout("$('#mensaje').text('')",3000);
						}
					});
				}
			}
			
		}