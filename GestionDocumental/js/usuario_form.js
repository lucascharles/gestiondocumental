$(document).ready(function()
{
	$("#fec_alta").datepicker({changeYear: true});	
});


function validarUsertId()
{
	if($("#user_id").val() == "")
	{
		return false;
	}
	var cont = 0;
	if($("#id_contratista").val() != "")
	{
		cont = $("#id_contratista").val();
	}
	
	var datos = 'controlador=Contratista&accion=validar_user_id&user_id='+$("#user_id").val();
	datos += "&id_contratista="+cont;
		
	$.ajax({
		url: "index.php",
		type: "GET",
		data: datos,
		cache: false,
		success: function(res)
		{		
			if($.trim(res) == "N")
			{
				$("#mensaje").text("El User ID "+$("#user_id").val()+" esta asociado a otro contratista.");	
				$("#user_id").val("");
				setTimeout("$('#mensaje').text('');	",3000);
			}
			
		},
		error: function()
		{
			$("#mensaje").text("Ha ocurrido un error.");
			
		}
	});
	
}
