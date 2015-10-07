(function($){
	/////////////////////////////
	
           $(".inner").mCustomScrollbar({
					scrollButtons:{
						enable:false
					},
					advanced:{
					    updateOnContentResize: Boolean
					},
					theme:"dark"
		   });
		   
		    $( "#accordion" ).accordion({
				heightStyle: "content"
			});
			
		   $( "#tabs" ).tabs();
		   $( "#tabs2" ).tabs();
		
			$("#form").validate();
	/////////////////////////////
})(jQuery);
