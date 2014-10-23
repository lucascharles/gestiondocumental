	var eventzoom = false;
	function getPosicionCuadrantes(id)
	{
		var pos = new Array(2);
		pos[0] = parseInt($("#"+id).offset().left);
		pos[1] = parseInt($("#"+id).offset().top);
		return pos;
	}
	
	function zoomVentana(obj)
	{							
		if($(obj).attr("zoom") == 0)
		{
			$(obj).attr("zoom",1);
			eventzoom = true;
			$(".arrastrable").draggable( 'option', 'disabled', true ); 
			$(obj).draggable( 'option', 'disabled', false); 
			$(obj).draggable( "destroy" );
			/*
			$(obj).css("-moz-transform","scale(2)");
			$(obj).css("-ms-transform","scale(2)");
			$(obj).css("-moz-transform","scale(2)");
			$(obj).css("-o-transform","scale(2)");
			$(obj).css("-webkit-transform","scale(2)");
			$(obj).css("transform","scale(2)");
			*/
			//$(obj).css("width",$(obj).attr("width",600));
			$(obj).css("width",parseInt($(obj).width())*2);
			$(obj).css("height",parseInt($(obj).height())*2);
			$(obj).css("z-index","9999999");
			$(obj).css({
				   position:'absolute',
				   left: ($(window).width() - $(obj).outerWidth())/2,
				   top: ($(window).height() - $(obj).outerHeight())/2
			  });
			recargarContenido($(obj).attr("id"),"D");
		}
		else
		{
			$(obj).attr("zoom",0);
			/*
			$(obj).css("-moz-transform","scale(1)");
			$(obj).css("-ms-transform","scale(1)");
			$(obj).css("-moz-transform","scale(1)");
			$(obj).css("-o-transform","scale(1)");
			$(obj).css("-webkit-transform","scale(1)");
			$(obj).css("transform","scale(1)");
			*/
			$(obj).css("width",parseInt($(obj).width())/2);
			$(obj).css("height",parseInt($(obj).height())/2);
			$(obj).css("z-index","0");
			
			
			var pos = getPosicionCuadrantes($(obj).attr("cuadrante"));
			$(obj).animate({ "left": pos[0], "top": pos[1] }, "fast" );
			$(".arrastrable").draggable(); 
			$(".arrastrable").draggable( 'option', 'disabled', false ); 
			eventzoom = false;
			recargarContenido($(obj).attr("id"),"R");
		}
		
	}
	
	function recargarContenido(id, op)
	{
		var datos = "op=recarga_ventana";
			datos += "&id="+id;
		
		$.ajax({
				url: "panelcontrol_ajax.php",
				type: "GET",
				data: datos,
				cache: false,
				dataType: "json",
				success: function(res)
				{
					if(res[1] == "page")
					{
						var url = res[0];
						if(op=="D")
						{
							url += "&det=1";
						}
						$("#"+id).fadeOut('slow').load(url).fadeIn("slow");
					}
				},
				error: function(){
					//alert("Ha ocurrido un error y no se ha podido borrar el registro.");
				}
			});
	}
	
	function damepos(obj)
	{
		alert("left: "+$(obj).offset().left+"   top: "+$(obj).offset().top);
	}

	function cargarPanel()
	{
		var datos = 'controlador=PanelControl&accion=carga_panel';

		$.ajax({
				url: "index.php",
				type: "GET",
				data: datos,
				cache: false,
				dataType: "json",
				success: function(res)
				{
					
					if(res.length > 0)
					{
						for(var i=0; i<res.length; i++)
						{
							
							var aux = res[i];
					
							var pos = getPosicionCuadrantes(aux[1]);
							$("#"+aux[0]).animate({ "left": pos[0], "top": pos[1] }, "fast" );
							$("#"+aux[0]).attr("cuadrante",aux[1]);
							setTimeout("document.getElementById('"+aux[0]+"').style.display = ''",500) ;
							
						}
						
						for(var i=0; i<res.length; i++)
						{
							var aux = res[i];
							if(aux[3] == "java_script")
							{
								$("#"+aux[0]).html(aux[2]);
							}
							if(aux[3] == "page")
							{
								var url = "index.php?controlador=PanelControl&accion="+aux[2];
								$("#"+aux[0]).fadeOut('slow').load(url).fadeIn("slow");
							}
						}
						
					}
				},
				error: function(){
					//alert("Ha ocurrido un error y no se ha podido borrar el registro.");
				}
			});
	}
	
	function guardarPosicion(param)
	{
		$("#mensajes").text("procesando...");
		//var datos = "op=guarda_posicion";
		var datos = 'controlador=PanelControl&accion=guarda_posicion';
		var valor = param[0];
		datos += "&ventana_a="+valor[0];
		datos += "&cuadrante_a="+valor[1];
		var valor_2 = param[1];
		datos += "&ventana_b="+valor_2[0];
		datos += "&cuadrante_b="+valor_2[1];
		$.ajax({
				url: "index.php",
				type: "GET",
				data: datos,
				cache: false,
				dataType: "json",
				success: function(res)
				{
					$("#mensajes").text("");
				},
				error: function(){
					//alert("Ha ocurrido un error y no se ha podido borrar el registro.");
				}
			});
		
	}

	function getElementByAttributeValue(attribute, value)
	{
  		var allElements = document.getElementsByTagName('div');
	  	for (var i = 0; i < allElements.length; i++)
	  	 {
		if (allElements[i].getAttribute(attribute) == value)
		{
		  return allElements[i];
		}
	  }
	}
	
		function aleatorio(inferior,superior){ 
			numPosibilidades = superior - inferior 
			aleat = Math.random() * numPosibilidades 
			aleat = Math.floor(aleat) 
			return parseInt(inferior) + aleat 
		} 
		
		$(document).ready(function(){
								   
			
			//defino los elementos que se pueden arrastrar
			$(".arrastrable").draggable();
			$(".arrastrable").data("soltado", false);
			
			//voy a crear una variable para contar los elementos que estoy soltando
			$(".suelta").data("numsoltar", 0);
			//defino elementos donde se puede soltar
			$(".suelta").droppable({
				drop: function( event, ui ){
					var elem = $(this);
					
					if(eventzoom == true)
					{
						return false;
					}
					
					if(elem.attr("id") == ui.draggable.attr("cuadrante"))
					{
						// el propietario hace como que va a salir pero no 
						var obj = ui.draggable;
						valx = $(this).offset().left;
						valy = $(this).offset().top;
						valx_obj = $(obj).offset().left;
						valy_obj = $(obj).offset().top;
						
						var res = valx - valx_obj;
						var res_y = valy - valy_obj;
						var move_left = ""

						if(res > 0)
						{
							move_left = "+="+res+"px";
						}
						else
						{
							move_left = "-="+(-1*res)+"px";
						}
						if(res_y > 0)
						{
							move_top = "+="+res_y+"px";
						}
						else
						{
							move_top = "-="+(-1*res_y)+"px";
						}
						
						$(obj).animate({ "left": move_left, "top": move_top  }, "slow" );
					}
					else
					{
						// usurpador a la cueva
						var obj = ui.draggable;
						valx = $(this).offset().left;
						valy = $(this).offset().top;
						valx_obj = $(obj).offset().left;
						valy_obj = $(obj).offset().top;
						
						var res = valx - valx_obj;
						var res_y = valy - valy_obj;
						var move_left = ""

						if(res > 0)
						{
							move_left = "+="+res+"px";
						}
						else
						{
							move_left = "-="+(-1*res)+"px";
						}
						if(res_y > 0)
						{
							move_top = "+="+res_y+"px";
						}
						else
						{
							move_top = "-="+(-1*res_y)+"px";
						}
						
						$(obj).animate({ "left": move_left, "top": move_top  }, "slow" );
						
						// desplazar al propietario
						var cuad = getElementByAttributeValue("id",ui.draggable.attr("cuadrante"));
						var obj = getElementByAttributeValue("cuadrante",$(this).attr("id"));
						if(obj == null)
						{
							$(ui.draggable).attr("cuadrante",$(this).attr("id"));
							return false;
						}

						valx = $(cuad).offset().left;
						valy = $(cuad).offset().top;
						valx_obj = $(obj).offset().left;
						valy_obj = $(obj).offset().top;
						
						res = valx - valx_obj;
						res_y = valy - valy_obj;
						move_left = "";
						move_top = "";

						if(res > 0)
						{
							move_left = "+="+res+"px";
						}
						else
						{
							move_left = "-="+(-1*res)+"px";
						}
						if(res_y > 0)
						{
							move_top = "+="+res_y+"px";
						}
						else
						{
							move_top = "-="+(-1*res_y)+"px";
						}
						
						$(obj).animate({ "left": move_left, "top": move_top  }, "slow" );
						var param = new Array();
						var param_aux = new Array(2);
						param_aux[0] = $(ui.draggable).attr("id");
						param_aux[1] = $(this).attr("id");
						param[0] = param_aux;
						var param_aux_1 = new Array(2);
						param_aux_1[0] = $(obj).attr("id");
						param_aux_1[1] = $(cuad).attr("id");
						param[1] = param_aux_1;
						$(ui.draggable).attr("cuadrante",$(this).attr("id"));
						$(obj).attr("cuadrante",$(cuad).attr("id"));
						guardarPosicion(param);
					}
				},

			});
	
			cargarPanel();
			//cargarDivs();
		})
