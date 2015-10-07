(function($){
		
			var base_url = location.protocol + "//" + location.host+"/edit/";
			
			$('.redactor').redactor({ 
					minHeight  : 150 , 
					buttons    : ['html', '|', 'formatting', '|', 'bold', 'italic', '|', 'unorderedlist', 'orderedlist', '|', 'image', 'file', 'link', 'alignment'] , 
					fileUpload : base_url + 'upload', 
					imageUpload: base_url + 'upload_image' 
			});
			
			$( ".module_date_start" ).datepicker({ dateFormat: "yy-mm-dd" });
			$( ".module_date_stop" ).datepicker({ dateFormat: "yy-mm-dd" });
			
			$(".full").hide();
			
		    $(".toggle").click(function(event) {
		    	event.preventDefault();

		    	$el = $(this).parent().next(".full");
				$el.toggle();
				
		        if($($el).is(":visible"))
		        {	
		        	$(this).find('span').removeClass('glyphicon-folder-close');
			        $(this).find('span').addClass('glyphicon-folder-open');
		        }
		        
		        if( $($el).is(":hidden") )
		        {
		        	$(this).find('span').removeClass('glyphicon-folder-open');
			        $(this).find('span').addClass('glyphicon-folder-close');
		        }   
		    });
		    
		    	// Delete button util function
			$('body').on('click','.deleteAction',function(){
				
				var $this   = $(this);
				var action  = $this.data('action');
				
				var answer = confirm('Do you really want to delete : '+ action +' ?');
			     if (answer){
					return true;
			     }
			    return false;	
			});

			
					
})(jQuery);
