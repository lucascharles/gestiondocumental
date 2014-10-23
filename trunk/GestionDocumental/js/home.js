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

function smail()
{

	if($.trim($("#mail_new").val()) == "") return false;
	if(!val_mail($.trim($("#mail_new").val()))) return false;
	
	var datos = "controlador=Index";
		datos += "&accion=save_emailnews";
		datos += "&email="+$.trim($("#mail_new").val());
	
		$.ajax({
				url: "index.php",
				type: "GET",
				data: datos,
				cache: false,
				success: function(res)
				{
					$("#mensaje_news").text("Gracias!!. Estaremos en contacto.");
					$("#mensaje_news").show("slow");
					setTimeout("$('#mensaje_news').hide('slow')",5000);
				},
				error: function()
				{
					//$("#mensaje").text("Ha ocurrido un error y no se ha podido agregar el registro.");
				//setTimeout("$('#mensaje').text('')",3000);
				}
		});
}
function val_mail(value){
	var valor=value;
	var minimo=0;
	for(a=0; a<valor.length; a++){
		switch(valor.charAt(a)){
			case "@": minimo++; break;
			case ".": minimo++; break;
		}
	}
	if(minimo<2){
		return false;
	}else{
		return true;
	}
}