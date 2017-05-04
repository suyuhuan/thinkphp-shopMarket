function initialise(content) {
	// Effects
	$easingType= 'easeInOutQuart';
	
	
	/*---------------------------------------------- 
				   I S O T O P E   (masonry)
	------------------------------------------------*/
	var $container = $('#masonry');
	$container.imagesLoaded( function(){
		$container.isotope({
			itemSelector : '.masonry_item'
		});	
	});
			
	
	
	/*---------------------------------------------- 
				 S L I D E   U P 
	------------------------------------------------*/
	if (content == 'body') {
		$('#slideup a').click(function() {
			$('.bottom_inner').slideToggle(600, $easingType);
			$(this).toggleClass('hide');
			return(false);
		});
	}
	
	
				
	
	/*---------------------------------------------- 
				   I M G   H O V E R
	------------------------------------------------*/
	/* SETTINGS */
	var hoverFade = 300;	
		
	// check if .overlay already exists or not
	$('.img_holder a').each(function(index){
		if($(this).find('.overlay').length == 0) { 
			$(this).append('<div class="overlay"></div>');
			$(this).find('.overlay').css({ opacity: 0 });
		} 										
	});
	
	$(content+' .img_holder').hover(function(){
		$(this).find('.overlay').animate({ opacity: 0.5 }, hoverFade);
	}, function(){
		$(this).find('.overlay').animate({ opacity: 0 }, hoverFade);
	});
	
	
	
	/*---------------------------------------------- 
				     F I L T E R
	------------------------------------------------*/
	// onclick reinitialise the isotope script
	$('.filter li a').click(function(){
		
		$('.filter li a').removeClass('active');
		$(this).addClass('active');
		
		var selector = $(this).attr('data-option-value');
		$container.isotope({ filter: selector });
		
		return(false);
	});
	
	
	
	
	/*---------------------------------------------- 
				      T O G G L E 
	------------------------------------------------*/	
	$(".article_content").on("click", '.toggle_title a', function() { 
		
		var status = $(this).find('span').html();
		if (status == '+') { $(this).find('span').html('-'); } else { $(this).find('span').html('+'); }
		
		$(this).parent().siblings('.toggle_inner').slideToggle(300);
		return(false);
	});
	
	
	
	/*---------------------------------------------- 
				  C H E C K   F O R M 
	------------------------------------------------*/
	// create the checkfalse div's
	$(content+' .checkform .req').each(function(){
		$(this).parent().append('<span class="checkfalse">false</span>');							   
	});
	$('.checkfalse').hide();
	
	// caching of the sart values
	labelstart = new Array();
	$(".checkform label.req").each(function(index){ 
		var name = $(this).attr('for');
		labelstart[index] = $('.'+name+'').val();
	});
	
	
	$(".checkform").on("click", 'input[type="submit"]', function() {
				
		form = $(this).parent('div');
		$form = $(form).parent('.checkform');
		form_action = $form.attr('target');
		id = $form.attr('id');
		
		var control = true;
		
		$form.find('label.req').each(function(index){
			var name = $(this).attr('for');
			value = $form.find('.'+name+'').val();
			formtype = $('.'+name).attr('type');
									
			if (formtype == 'radio' || formtype == 'checkbox') {
				if ($('.'+name+':checked').length == 0) { $(this).siblings('.checkfalse').fadeIn(200); control = false;  } else { $(this).siblings('.checkfalse').fadeOut(200); }
			} else if(name == 'email') {
				var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
				if (!value.match(re)) { $(this).siblings('.checkfalse').fadeIn(200); control = false;  } else { $(this).siblings('.checkfalse').fadeOut(200); }
			} else {
				if (  value == '' || 
					  value == labelstart[index] 
					  ) { 
					$(this).siblings('.checkfalse').fadeIn(200); control = false;  } else { $(this).siblings('.checkfalse').fadeOut(200); 
				}
			}
			
		});
		
		
		if (!control) { return false; } else {
							
				var str = $form.serialize();
					
				   $.ajax({
				   type: "POST",
				   url: form_action,
				   data: str,
				   success: function(msg){
					$("#form-note").ajaxComplete(function(event, request, settings){
						$(this).html(msg);
						$(this).fadeIn(200);
					});
				   }
				});
				  
				return false;
			
		} // END else {
		
	});
	
		
	
	
	/*---------------------------------------------- 
		R E S P O N S I V E   E M B E D D E D   V I D E O S
	------------------------------------------------*/
	var $allVideos = $("iframe[src^='http://player.vimeo.com'], iframe[src^='http://www.youtube.com'], object, embed"),
    $fluidEl = $(".video");
	    	
	$allVideos.each(function() {
	
	  $(this)
	    // jQuery .data does not work on object/embed elements
	    .attr('data-aspectRatio', this.height / this.width)
	    .removeAttr('height')
	    .removeAttr('width');
	
	});
	
	$(window).resize(function() {
	  var newWidth = $fluidEl.width();
	  $allVideos.each(function() {
	  
	    var $el = $(this);
	    $el
	        .width(newWidth)
	        .height(newWidth * $el.attr('data-aspectRatio'));
	  
	  });
	}).resize();

} // END function initialise()


$(document).ready(function() {	

	initialise('body'); // call function
	
});