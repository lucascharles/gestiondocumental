function bloquerContratista(id)
{
	var datos = "controlador=Constructora&accion=bloquear_contratista";
	datos += "&id_contratista="+id;
	$("#img_"+id).attr("src","images/cargando.gif");
		$.ajax({
			url: "index.php",
			data: datos,
			cache: false,
			success: function(res)
			{
				if(res == 1)
				{
					$("#img_"+id).attr("src","images/bloqueado.png");
				}
				else
				{
					$("#img_"+id).attr("src","images/desbloqueado.png");
				}
			},
			error: function(){
				//alert("Ha ocurrido un error y no se ha podido borrar el registro.");
			}
		});

}