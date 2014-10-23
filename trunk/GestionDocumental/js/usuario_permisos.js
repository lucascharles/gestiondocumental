		$(document).ready(function()
		{
			mostrarPermiso()
		});
		
		function salirFormPermisos(controler)
		{
			window.location = "index.php?controlador="+controler+"&accion=admin";
		}
		
		function grabarFormPermisos(op)
		{
			if(validar('N'))
			{
				setTimeout("document.frm"+op+".action = 'index.php?controlador="+op+"&accion=grabar_permisos'",1);
				setTimeout("document.frm"+op+".submit()",10);
			}
		}
		
		function mostrarPermiso()
		{
			var datos = "controlador=Usuario";
				datos += "&accion=get_detalle_permisos";
				datos += "&id_rol="+$("#id_rol").val();
		
				$.ajax({
						url: "index.php",
						type: "GET",
						data: datos,
						cache: false,
						dataType:"json",
						success: function(res)
						{	
							var det = "<table width='100%' id='listado'>";
							var det_modulo = "";
							for(var i=0; i<res.length; i++)		
							{
								var aux = res[i];
								//alert(aux[5]);
								if(det_modulo != aux[0])
								{
									det_modulo = aux[0];
									det += "<tr><td colspan='5' class='subtitulo_form'>";
									det += aux[0];
									det += "</td></tr>";
									det += "<tr><th>Alta</th><th>Baja</th><th>Modificacion</th><th>Vista</th><th>Extra</th></tr>";
								}
								det += "<tr>";
								det += "<td>"+aux[1]+"</td>";
								det += "<td>"+aux[2]+"</td>";
								det += "<td>"+aux[3]+"</td>";
								det += "<td>"+aux[4]+"</td>";
								det += "<td>"+aux[5]+"</td>";
								det += "</tr>";
							}
							det += "</table>";
							//alert(det);
							$("#detalle_rol").html(det);
						},
						error: function()
						{
							$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
							setTimeout("$('#mensaje').text('')",3000);
						}
					});
		}
