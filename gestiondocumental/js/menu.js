		
		function cargarOpcion(op)
		{
			var accion = "admin"
			var array = op.split("@");
			if(array.length > 1)
			{
				accion = array[1];
				op = array[0];
			}
			
			if(array.length > 2)
			{
				if(array[2] == "popup")
				{
					window.open("index.php?controlador="+op+"&accion="+accion);
				}
			}
			else
			{
				window.location = "index.php?controlador="+op+"&accion="+accion;
			}
			
			if(array.length > 3)
			{
				if(array[3] != "")
				{
					var datos = "controlador=Tramite";
					datos += "&accion=pendientes";
					datos += "&pendientes="+array[3];
							
					$.ajax({
						url: "index.php",
						type: "GET",
						data: datos,
						cache: false,
						success: function(res)
						{	
							window.location = "index.php?controlador="+op+"&accion="+accion;
						},
						error: function()
						{
							$("#mensaje").text("Ha ocurrido un error.");
						}
					});	
						
			    }
			}
		}
		
		function resaltarOpMenu(obj)
		{
			$(obj).removeClass('principal');
			$(obj).addClass('resaltaopMenu');
		}

		function noresaltarOpMenu(obj)
		{	
			$(obj).removeClass('resaltaopMenu');
			$(obj).addClass('principal');
		}